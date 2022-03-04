<?php
session_start();

if(!isset($_SESSION['username'])){
  header('location:login.php');
}

include 'component.php';
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
  <link rel="stylesheet" href="css\booking_history.css">
  <title>PARADISE HOTEL</title>
</head>

<body>

  <section id="title">
    <div class="container-fluid">
      <div class="title">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
            <a class="navbar-brand" href="index.php">PARADISE HOTEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="booknow.php">BOOK NOW</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="aboutus.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="contactus.php">CONTACT US</a>
                </li>
                <li class="nav-item dropdown drop1">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    MY ACCOUNT
                  </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="favorite.php">MY FAVORITES</a></li>
                  <li><a class="dropdown-item" href="booking_history.php">BOOKING HISTORY</a></li>
                  <li><a class="dropdown-item" href="feedback.php">FEEDBACK</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>
<br>

<section id="title">
  <nav class="navbar navbar-expand-lg navbar-dark bg-#1B262C">
    <a href="booknow.php" class="navbar-brand">
      <h3 class="px-5">
        <i class="far fa-heart"></i> FAVORITES
      </h3>
    </a>
    <button class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNavAltMarkup"
      aria-control="navbarNavAltMarkup"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a href="favorite.php" class="nav-item nav-link active">
        <h5 class="px-5 fav1">
          <i class="far fa-heart"></i> FAVORITES
          <?php

          if(isset($_SESSION['favorite'])){
            $count=count($_SESSION['favorite']);
            echo "<span id='favorite_count' class='text-warning bg-light'>$count</span>";
          }else{
            echo "<span id='favorite_count' class='text-warning bg-light'>0</span>";
          }

           ?>
        </h5>
      </a>
      </div>
    </div>
  </nav>
</section>

<br><br>
   <section id="history">
     <div class="h-100 h-custom py-5">
       <div class="container h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
           <div class="col-12">
             <div class="card orderhistory">
               <div class="card-body p-0">
                 <div class="row g-0">
                   <div class="p-5">
                     <div class="d-flex justify-content-between align-items-center">
                       <h1 class="fw-bold mb-0">BOOKING HISTORY</h1>
                       <i class="fas fa-concierge-bell fa-3x"></i>
                     </div>
                     <hr class="my-4">
                     <?php
                        if (isset($_SESSION['username'])) {
                          $UserID = $_SESSION['username'];

                          $result = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$UserID'");
                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              $RoomName = $row['room_name'];
                              $RoomPrice = $row['room_price'];
                              $RoomImage = $row['room_image'];
                              $CheckIn = $row['check_in'];
                              $CheckOut = $row['check_out'];
                              $BookingStatus = $row['booking_status'];
                              echo '
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <img src="images/'.$RoomImage.'" class="img-fluid rounded-3" style="width:150px;"/>
                                      </div>
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <h6 class="text-muted">'.$RoomName.'</h6>
                                      </div>
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <h6 class="text-muted">₹'.number_format($RoomPrice).' /DAY</h6>
                                      </div>
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <h6 class="text-muted">CHECK-IN: '.$CheckIn.'</h6>
                                      </div>
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <h6 class="text-muted">CHECK-OUT: '.$CheckOut.'</h6>
                                      </div>
                                      <div class="col-md-3 col-lg-2 col-xl-3">
                                        <h6 class="text-muted">'.$BookingStatus.'</h6>
                                      </div>
                                    </div>
                                    <hr class="my-4">
                              ';
                            }
                          }else {
                            echo "<h2 class='text-muted emptyorder'>NO BOOKINGS HAVE BEEN MADE YET <i class='fas fa-frown-open'></i></h2>";
                          }
                        }
                      ?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="pt-5">
             <h5 class="mb-0"><a href="booknow.php" class="text-body backbtn"><i class="fas fa-arrow-alt-circle-left"></i> BOOK NOW</a><br><br><br>
             </h5>
           </div>
         </div>
       </div>
     </div>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
