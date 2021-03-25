<?php
require_once('../dbcon.php');
$id=$_GET['id_delete'];

if(isset($id)){
    $result=mysqli_query($con,"DELETE FROM `books` WHERE `id`='$id'");
    header('location:manage_books.php');
}


?>