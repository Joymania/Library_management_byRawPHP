<?php
    require_once('../dbcon.php');

    if(isset($_POST['registration'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $roll=$_POST['roll'];
        $regno=$_POST['regno'];
        $phone=$_POST['phone'];
        $photo=$_FILES['photo']['name'];
        $photo=explode('.',$photo);
        $photo_lname=end($photo);
        $photo_lname=$username.'.'.$photo_lname;
        $input_error=array();
        $password_hash=password_hash($password,PASSWORD_DEFAULT);
        
    
        
        
        if(empty($fname)){
            $input_error['fname']="This field is required.";
        }
        if(empty($lname)){
            $input_error['lname']='This field is required.';
        }
        if(empty($email)){
            $input_error['email']='This field is required.';
        }
        if(empty($username)){
            $input_error['username']='This field is required.';
        }
        if(empty($password)){
            $input_error['password']='This field is required.';
        }
        if(empty($roll)){
            $input_error['roll']='This field is required.';
        }
        if(empty($regno)){
            $input_error['regno']='This field is required.';
        }
        if(empty($confirmpassword)){
            $input_error['confirmpassword']='This field is required.';
        }
        if(empty($phone)){
            $input_error['phone']='This field is required.';
        }

        $count=count($input_error);

        if($count==0){
            $emailchk =mysqli_query($con,"SELECT * FROM `students` WHERE `email`='$email'");
            $usernamechk =mysqli_query($con,"SELECT * FROM `students` WHERE `username`='$username'");
            
             $length=strlen($password);
    
            if(mysqli_num_rows($emailchk)==0 && mysqli_num_rows($usernamechk)==0){
                if($length<6){
                    $error='Password should be at least 6';
                }
                elseif($password==$confirmpassword){
                
                    $result=mysqli_query($con,"INSERT INTO `students`(`fname`, `lname`, `email`, `username`, `password`, `confirmpassword`, `roll`, `regno`, `phone`, `status`, `photo`) VALUES ('$fname','$lname','$email','$username','$password_hash','$confirmpassword','$roll','$regno','$phone','0','$photo_lname')");
                    
                    if($result){
                        move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                        header('location: register.php');
                    }
                    
    
                }
                elseif($password!=$confirmpassword){
                    $confirmpasswordchk='Confirm Password should to be matched.';
                }
    
            }
            else
            {
               if(mysqli_num_rows($emailchk)!=0) {
                   $emailchk2='Your Email Already registered.';
               }
               if(mysqli_num_rows($usernamechk)!=0){
                    $usernamechk2='Your Username Already registered.';
               }
            }
    
        }

    }



?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>register</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
           <h3 class="text-center">Registration</h3>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php

                            if(isset($input_error['fname'])){
                                echo '<div class="inputerror">'.$input_error['fname'].'</div>';
                            }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name"  value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php

                                if(isset($input_error['lname'])){
                                    echo '<div class="inputerror">'.$input_error['lname'].'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php

                                if(isset($input_error['email'])){
                                    echo '<div class="inputerror">'.$input_error['email'].'</div>';
                                }

                                if(isset($emailchk2)){
                                    echo '<div class="inputerror">'.$emailchk2.'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="User Name"  value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php

                                if(isset($input_error['username'])){
                                    echo '<div class="inputerror">'.$input_error['username'].'</div>';
                                }
                                if(isset($usernamechk2)){
                                    echo '<div class="inputerror">'.$usernamechk2.'</div>';
                                }


                            ?>
                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password"  value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php

                                if(isset($input_error['password'])){
                                    echo '<div class="inputerror">'.$input_error['password'].'</div>';
                                }
                                if(isset($error)){
                                    echo '<div class="inputerror">'.$error.'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password"  value="<?php if(isset($_POST['confirmpassword'])) echo $_POST['confirmpassword']; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php

                                if(isset($input_error['confirmpassword'])){
                                    echo '<div class="inputerror">'.$input_error['confirmpassword'].'</div>';
                                }
                                if(isset($confirmpasswordchk)){
                                    echo '<div class="inputerror">'.$confirmpasswordchk.'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll" pattern="[0-9]{6}"  value="<?php if(isset($_POST['roll'])) echo $_POST['roll']; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php

                                if(isset($input_error['roll'])){
                                    echo '<div class="inputerror">'.$input_error['roll'].'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="regno" placeholder="Reg No" pattern="[0-9]{6}"  value="<?php if(isset($_POST['regno'])) echo $_POST['regno']; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php

                                if(isset($input_error['regno'])){
                                    echo '<div class="inputerror">'.$input_error['regno'].'</div>';
                                }


                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="01*********" pattern="01[1|3|4|5|7|8|9][0-9]{8}"  value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php

                                if(isset($input_error['phone'])){
                                    echo '<div class="inputerror">'.$input_error['phone'].'</div>';
                                }


                            ?>
                        </div>
                        <div class="">
                            <span class="input-with-icon">
                                <input type="file" name="photo" id="">
                                <i class="fa fa-photo"></i>
                            </span>
                            <br>
                        </div>
                        
                        '<div class="form-group">' ;
                            <input class="btn btn-info btn-block" type="submit" value="Registration" name="registration" >;
                                </div>
                        
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
