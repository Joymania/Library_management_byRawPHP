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
                            <li><i class="fa fa-user" aria-hidden="true"></i><a href="javascript:avoid(0)">Students</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Students</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg NO</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                                $result=mysqli_query($con,"SELECT * FROM `students` ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                      <tr>  

                                                    <td><?= $row['fname'].' '.$row['lname'] ?></td>
                                                    <td><?= $row['roll'] ?></td>
                                                    <td><?= $row['regno']?></td>
                                                     <td><?= $row['email'] ?></td>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['phone'] ?></td>
                                                    <td><img width="50px" height="60px" src="<?php echo "../student/images/". $row['photo']; ?>" " alt=""></td>
                                                    <td><?php echo ($row['status']==1 ? "Active" : "Inactive") ?></td>
                                                    <td>
                                                        <?php
                                                        if($row['status']==1){
                                                        ?>
                                                        <a href="status_inactive.php?id=<?= $row['id'];?>" class="btn btn-primary" ><i class="fa fa-arrow-up"></i></a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if($row['status']==0){
                                                        ?>
                                                        <a href="status_active.php?id=<?= $row['id'];?>" class="btn btn-info" ><i class="fa fa-arrow-down"></i></a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

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

require_once('footer.php');
?>
