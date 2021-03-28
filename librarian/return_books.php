<?php
    require_once('header.php');
    require_once('../dbcon.php');
?>
            <!-- CONTENT
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Dashboard</a></li>
                            <li><i class="fa fa-user" aria-hidden="true"></i><a href="javascript:avoid(0)">Issue Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Issue Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-bordered table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        <th>Return Books</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                                $result=mysqli_query($con,"SELECT `issue_books`.`id`,`issue_books`.`issue_date`,
                                                `students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,
                                                `books`.`name`,`books`.`photo`
                                                FROM `issue_books`
                                                INNER JOIN `students` ON `students`.`id`=`issue_books`.`student_id`
                                                INNER JOIN `books` ON `books`.`id`=`issue_books`.`book_id`
                                                WHERE `issue_books`.`return_date`=''");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                      <tr>  

                                                    <td><?= $row['fname'].' '.$row['lname'] ?></td>
                                                    <td><?= $row['roll'] ?></td>
                                                    <td><?= $row['phone'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><img width="50px" height="60px" src="../images/books/<?= $row['photo'] ?>" " alt=""></td>
                                                    <td><?=$row['issue_date'] ?></td>
                                                    <td><a href="return_books.php?id=<?=$row['id']?>">Return Books</a></td>

                                                    </tr>
                                                    
                                                    <?php
                                                          
                                                }
                                        ?>
                                    
                                      
                                    
                            
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                </div>

        </div>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $date=date('d-m-Y');
                $result=mysqli_query($con,"UPDATE `issue_books` SET `return_date`='$date' WHERE `id`='$id'");
                if($result){
                    ?>
                    <script type="text/javascript">alert('Book Return Succesful.');
                    javascript:history.go(-1);
                    </script>
                    
                    <?php
                }
            }

        ?>

<?php

require_once('footer.php');
?>
