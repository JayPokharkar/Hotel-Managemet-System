
<?php

include 'dbcon.php';

if (isset($_POST['addtofav'])){
  if (isset($_SESSION['favorite'])){
    $checkitem = array_column($_SESION['favorite'],"id");
    if ($check = in_array($_POST['id'],$checkitem)){
      ?>
      <script>
      alert("ROOM ALREADY ADDED TO THE FAVORITES.");
      location.replace("booknow.php");
      </script>
      <?php
    }else {
      $count = count($_SESSION['favorite']);
      $itemArray = array('id' => $_POST['id']);
      $_SESSION['favorite'][$count] = $itemArray;
    }
  }else {
    $itemArray = array('id' => $_POST['id']);

    $_SESSION['favorite'][0] = $itemArray;
  }
}

?>
