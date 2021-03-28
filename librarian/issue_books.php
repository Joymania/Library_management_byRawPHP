<?php
    require_once('header.php');
    if(isset($_POST['issue_book'])){
        $student_id=$_POST['student_id'];
        $book_id=$_POST['book_id'];
        $issue_date=$_POST['issue_date'];
        $result=mysqli_query($con,"INSERT INTO `issue_books`( `student_id`, `book_id`, `issue_date`) VALUES ('$student_id','$book_id','$issue_date')");
        if($result){
            mysqli_query($con,"UPDATE `books` SET`availabe_quantity`=`availabe_quantity`-1 WHERE `id`='$book_id'");
            ?>
            <script type="text/javascript">
            alert('Book issued successfully!');
            </script>
            <?php

        }
    }
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Issue Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-md-6 col-sm-offset-3">
                <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="POST" action="">
                                        <div class="form-group">
                                        
                                        <select name="student_id" id="" class="form-control">
                                       
                                        <option value="">Select</option>
                                        <?php
                                                $result=mysqli_query($con,"SELECT * FROM `students` ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?php echo $row['fname'].' '.$row['lname'].'('.$row['roll'].')' ?></option>
                                                    <?php
                                                }
                                             
                                                ?>
                                                
                                        </select>
                                        <input type="hidden" name="id" value="student_id">
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                                if(isset($_POST['search'])){
                                    $id=$_POST['student_id'];
                                    $result=mysqli_query($con,"SELECT * FROM `students` WHERE `id`='$id'");
                                    $row=mysqli_fetch_assoc($result);
                                    ?>
                                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="">
                                        
                                        <div class="form-group">
                                            <label for="email2" class="col-sm-2 control-label">Student Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" placeholder="" readonly value="<?=$row['fname'].' '.$row['lname'] ?>">
                                                <input type="hidden" name="student_id" value="<?php echo $row['id'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2" class="col-sm-2 control-label">Book Name</label>
                                            <div class="col-sm-10">
                                            <select name="book_id" id="" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                                $result=mysqli_query($con,"SELECT * FROM `books` WHERE `availabe_quantity`>0 ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?php echo $row['name'] ?></option>
                                                    <?php
                                                }
                                             
                                                ?>
                                                
                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2" class="col-sm-2 control-label">Book Issue Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="issue_date" id="date" placeholder="" readonly value="<?= date('d-m-Y')?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               
                                                <input type="submit" value="Save Issue Book" name="issue_book" class="btn btn-primary ">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                                    <?php
                                }
                            ?>
                           
                        </div>
                </div>
        </div>
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
             </div>
  

<?php

require_once('footer.php');
?>
