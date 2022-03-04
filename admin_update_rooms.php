<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
}
 ?>
 <?php

include 'dbcon.php';
if (isset($_GET['id'])){
$id=$_GET["id"];
$res=mysqli_query($con, "select * from rooms where id='$id'");
while ($row=mysqli_fetch_assoc($res))
{
  $room_name=$row["room_name"];
  $room_price=$row["room_price"];
  $room_quantity=$row["room_quantity"];
  $room_image=$row["room_image"];
  $room_category=$row["room_category"];
  $room_description=$row["room_description"];
}
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Play:wght@700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/about.css">
   <title>PARADISE HOTEL</title>
 </head>

 <body>
   <!-- TITLE -->
   <section id="title">
     <div class="container-fluid">
       <div class="title">
         <nav class="navbar navbar-expand-lg navbar-dark">
           <div class="container">
             <a class="navbar-brand" href="admin_index.php">PARADISE HOTEL</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
               <ul class="navbar-nav">
                 <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="admin_index.php">HOME</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" href="admin_booknow.php">BOOK NOW</a>
                 </li>
                 <li class="nav-item dropdown drop1">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     MANAGE
                   </a>
                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="admin_add_rooms.php">ADD ROOMS</a></li>
                     <li><a class="dropdown-item" href="admin_bookings.php">BOOKINGS</a></li>
                     <li><a class="dropdown-item" href="add_admin.php">ADD ADMIN</a></li>
                     <li><a class="dropdown-item" href="admin_feedback.php">FEEDBACKS</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="admin_logout.php">LOGOUT</a></li>
                 </li>
               </ul>
             </div>
           </div>
         </nav>
       </div>
     </div>
   </section>
<br>

<div>
  <h1>
    <center>
    UPDATE ROOMS
  </center>
  <h1>
  <br>
</div>

<div Class="container" Style="margin:auto">
  <form name="form1" action="" method="post" >
    <table cellpadding="5" class="table-striped table-borderless table-hover" style="margin:auto">
      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM NAME</td>
        <td><input type="text" id= "room_name" name="room_name" placeholder="Enter Room Name" value="<?php if (isset($_GET['id'])){
          echo $room_name;
        } ?>" required></td>
      </tr>

      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM PRICE</td>
        <td><input type="text" id="room_price" name="room_price" placeholder="Enter Room Price" value="<?php if (isset($_GET['id'])){
          echo $room_price;
        } ?>" required></td>
      </tr>

      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM QUANTITY</td>
        <td><input type="text" id="room_quantity" name="room_quantity" placeholder="Enter Room Quantity" value="<?php if (isset($_GET['id'])){
          echo $room_quantity;
        } ?>" required></td>
      </tr>

      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM IMAGE</td>
        <td><input type="file" enctype="multipart/form-data" class="form-control" id="room_image" name="room_image" placeholder="Select Room Image" required></td>
      </tr>

      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM CATEGORY</td>
        <td><input type="text" id="room_category" name="room_category" placeholder="Enter Room Category" value="<?php if (isset($_GET['id'])){
          echo $room_category;
        } ?>" required></td>
      </tr>

      <tr>
        <td style=" font-size:20px; padding-left:7%;">ROOM DESCRIPTION</td>
        <td><textarea cols="15" rows="10" id="room_description" name="room_description" placeholder="Enter Room Description"  required><?php if (isset($_GET['id'])){
          echo $room_description;
        } ?> </textarea></td>
      </tr>

      <tr>
        <td colspan="2" align="center"><input type="submit" class="btn btn-outline-dark btn-secondary" style="color:yellow;" name="submit" value="UPDATE"></td>
      </tr>

    </table>
  </form>
</div>

<?php
if (isset($_POST["submit"]))
{
  $room_name = $_POST['room_name'];
  $room_price = $_POST['room_price'];
  $room_quantity = $_POST['room_quantity'];
  $room_image = $_POST['room_image'];
  $room_category = $_POST['room_category'];
  $room_description = $_POST['room_description'];

  $res = mysqli_query($con, "update rooms set room_name='$_POST[room_name]', room_price=$_POST[room_price], room_quantity=$_POST[room_quantity], room_image='$_POST[room_image]',
  room_category='$_POST[room_category]', room_description='$_POST[room_description]' where id=$id ") or die(mysqli_error($con));

  if($res){
    ?>
    <script>
    alert("ROOM UPDATED SUCCESSFULY");
    location.replace("admin_booknow.php");
    </script>
    <?php
  }else {
    ?>
    <script>
    alert("SOMETHING WENT WRONG");
    location.replace("admin_booknow.php");
    </script>
    <?php
  }

}

    ?>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 </body>

 </html>
