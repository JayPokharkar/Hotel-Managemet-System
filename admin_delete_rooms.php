<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
}

include 'dbcon.php';

$id=$_GET["id"];
mysqli_query($con, "delete from rooms where id=$id");
header('location:admin_booknow.php');
 ?>
