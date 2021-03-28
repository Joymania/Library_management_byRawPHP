<?php
    require_once('header.php');
    require_once('../dbcon.php');
?>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
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
                                <table id="basic-table" class="data-table  table table-bordered table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                       $student_id=$_SESSION['student_id'];
                                       $result=mysqli_query($con,"SELECT `issue_books`.`issue_date`,`books`.`name`,`books`.`photo` FROM `issue_books` INNER JOIN `books` ON `issue_books`.`book_id`=`books`.`id` WHERE `issue_books`.`student_id`='$student_id'");
                                       while($row=mysqli_fetch_assoc($result)){
                                           ?>
                                           <tr>
                                           <td><?= $row['name'] ?></td>
                                           <td><img width="70px" height="70px" src="../images/books/<?= $row['photo'] ?>" alt=""></td>
                                           <td><?= $row['issue_date'] ?></td>
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
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    
   

<?php

require_once('footer.php');
?>
