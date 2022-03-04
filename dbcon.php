<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "tyitproject";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
  ?>
  <script>
  
  </script>
  <?php
}else{

  ?>
  <script>
  alert("Connection Failed");
  </script>
  <?php
}

 ?>
