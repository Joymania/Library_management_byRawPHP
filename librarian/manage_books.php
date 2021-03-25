<?php
    require_once('header.php');
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
                            <li><i class="fa fa-book" aria-hidden="true"></i><a href="javascript:avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Books Info</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publication Name</th>
                                        <th>Purchase Date</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Available Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                                $result=mysqli_query($con,"SELECT * FROM `books` ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><img width="70px" height="70px" src="../images/books/<?= $row['photo'] ?>" alt=""></td>
                                                    <td><?= $row['author_name'] ?></td>
                                                    <td><?= $row['publication_name'] ?></td>
                                                    <td><?= date('d-M-Y',strtotime($row['purchase_date'])) ?></td>
                                                    <td><?= $row['price'] ?></td>
                                                    <td><?= $row['quantity'] ?></td>
                                                    <td><?= $row['availabe_quantity'] ?></td>
                                                    <td>
                                                    <a href="javascript:avoid(0)"  data-toggle="modal" data-target="#book-<?= $row['id']; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="update.php?id_update=<?=$row['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="delete.php?id_delete=<?=$row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
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
                                    
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>

        <?php
                                                $result=mysqli_query($con,"SELECT * FROM `books` ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>

        <div class="modal fade" id="book-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-info"></i>Books Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                            <?php
                                                $result=mysqli_query($con,"SELECT * FROM `books` ");
                                                while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                <tr>
                                                <th>Book Name</th>
                                                <td><?= $row['name'] ?></td>
                                       
                                                </tr>
                                                <tr>
                                                <th>Book Image</th>
                                                <td><img width="70px" height="70px" src="../images/books/<?= $row['photo'] ?>" alt=""></td>
                                                   
                                        
                                                </tr>
                                                <tr>
                                                <th>Author Name</th>
                                                <td><?= $row['author_name'] ?></td>
                                                    
                                        
                                                </tr>
                                                <tr>
                                               <th>Publication Name</th>
                                               <td><?= $row['publication_name'] ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                <th>Purchase Date</th>
                                                <td><?= date('d-M-Y',strtotime($row['purchase_date'])) ?></td>
                                                   
                                       
                                      
                                                </tr>
                                                <tr>
                                                <th>Book Price</th>
                                                <td><?= $row['price'] ?></td>
                                                  
                                       
                                                </tr>
                                                <tr>
                                                <th>Book Quantity</th>
                                                <td><?= $row['quantity'] ?></td>
                                                  
                                       
                                                </tr>
                                                <tr>
                                               <th>Available Quantity</th>
                                               <td><?= $row['availabe_quantity'] ?></td>
                                        
                                                </tr>
                                                <?php
                                                          
                                                        }
                                                ?>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                           
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                                          
                                                        }
                                                        ?>
   

<?php

require_once('footer.php');
?>
