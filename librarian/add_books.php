<?php
    require_once('header.php');
    if(isset($_POST['save_book'])){
        $name=$_POST['name'];
        $author_name=$_POST['author_name'];
        $publication_name=$_POST['publication_name'];
        $purchase_date=$_POST['purchase_date'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $available_quantity=$_POST['available_quantity'];
        $photo=$_FILES['photo']['name'];
        $photo_name=explode('.',$photo);
        $photo_exit=end($photo_name);
        $photo_last=date('Ymdhis.').$photo_exit;
        $librarian_username=$_SESSION['emailchecker'];

        $result=mysqli_query($con,"INSERT INTO `books`( `name`, `photo`, `author_name`, `publication_name`, `purchase_date`, `price`, `quantity`, `availabe_quantity`, `librarian_username`) VALUES ('$name','$photo_last','$author_name','$publication_name','$purchase_date','$price','$quantity','$available_quantity','$librarian_username')");

        if($result){
            move_uploaded_file($_FILES['photo']['tmp_name'],'../images/books/'.$photo_last);
            $success='Data Inserted Successfully.';
            $error='Data Inserted Failed..';
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
                            <li><i class="fa fa-book" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="panel-content">

                            <div class="row">
                                <div class="card">
                                <?php
                                    if(isset($success)){
                                        echo '<div class="alert alert-success">'.$success.'</div>';
                                    }
                                    elseif(isset($error)){
                                        echo '<div class="alert alert-danger">'.'$error'.'</div>';
                                    }
                                ?>
                                    <div class="col-md-6 col-md-offset-3">
                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data" >
                                        <h5 class="mb-lg">Add Books</h5>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Book Name</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="name" name="name" placeholder="Book Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo" class="col-sm-2 control-label">Book Image</label>
                                            <div class="col-sm-10">
                                                <input required type="file" name="photo" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="author_name" class="col-sm-2 control-label">Author Name</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="author_name" name="author_name" placeholder="Author Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="publication_name" class="col-sm-2 control-label">Publication Name</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="publication_name" name="publication_name" placeholder="Publication Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="purchase_date" class="col-sm-2 control-label">Purchase Date</label>
                                            <div class="col-sm-10">
                                                <input required type="date" class="form-control" id="purchase_date" name="purchase_date" placeholder="mm/dd/yyyy">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-sm-2 control-label">Book Price</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="price" name="price" placeholder="Book Price" pattern="[0-9]{1-9}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity" class="col-sm-2 control-label">Book Quantity</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="quantity" name="quantity" placeholder="Book Quantity" pattern="[0-9]{1-9}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_quantity" class="col-sm-2 control-label">Available Quantity</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" id="available_quantity" name="available_quantity" placeholder="Book Price" pattern="[0-9]{1-9}">
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               <input type="submit" value="Save Book" name="save_book" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                                    
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>

<?php

require_once('footer.php');
?>
