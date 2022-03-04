<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
}
 ?>
 <?php

 include 'dbcon.php';
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
      ROOMS INFORMATION
    </center>
  </h1>
</div>
<br>

<div class="container">
  <form name="form1" action="" method="post">
  <table border="3" cellpadding="5" class="table-striped table-bordered table-hover" style="margin:auto" >
    <thead class="thead-light">
      <tr>
        <th>FEEDBACK ID</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>FEEDBACK</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $view = mysqli_query($con, "select * from feedback");
      while ($row = mysqli_fetch_assoc($view)){
        ?>
        <tr>
          <td><?php echo $row["id"]; ?> </td>
          <td><?php echo $row["username"]; ?> </td>
          <td><?php echo $row["email"]; ?> </td>
          <td><?php echo $row["comments"]; ?> </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
