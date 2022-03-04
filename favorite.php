<?php

session_start();

if(!isset($_SESSION['username'])){
  header('location:login.php');
}

require_once ("dbcon.php");

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
  <link rel="stylesheet" href="css/favorite.css">
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

<div class="container-fluid">
  <div class="row px-5">
    <div class="col-md-7">
      <div class="favorite2">
        <h6>MY FAVORITES: <?php if (isset($_SESSION['favorite'])){
          $count = count($_SESSION['favorite']);
          echo $count;
        }else {
          echo "0";
        } ?> </h6>
        <hr class="my-4">
        <?php
        include 'dbcon.php';
        include 'component.php';
        // RETRIEVING ROOM INFO
        if (isset($_SESSION['favorite'])){
          $Total = 0;
          $id = array_column($_SESSION['favorite'],'id');
          $result = mysqli_query($con, " SELECT * FROM rooms");
          while ($row = mysqli_fetch_assoc($result)){
            foreach ($id as $roomid){
              if ($row['id'] == $roomid){
                $Roomid = $row['id'];
                if($Roomid){
                  $Query = mysqli_query($con, " SELECT * FROM rooms WHERE id='$Roomid'");
                  while ($row2 = mysqli_fetch_assoc($Query)){
                    $Roomname = $row2['room_name'];
                    $Roomprice = $row2['room_price'];
                    $Roomimage = $row2['room_image'];
                    $Roomdescription = $row2['room_description'];

                    //$Total = 0;
                    $Total = $Total + (int)$row2['room_price'];

                    echo '
                    <form action ="favorite.php" method="POST">
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="images/'.$Roomimage.'" class="img-fluid rounded-3" alt="">
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <h6 class="text-black mb-0">'.$Roomname.'</h6>
                    <input type="hidden" name="Roomid" value='.$Roomid.'>
                    <h6 class="text-muted">'.$Roomdescription.'</h6>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <h6>NO. OF ROOMS: 1</h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h6 class="mb-0">₹'.number_format($Roomprice).' /DAY</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <button type="submit" class="btn-close btn-outling-warning" name="remove"></button>
                    </div>
                    </div>
                    </form>
                    <hr class="my-4">
                    <div class="pt-5">
                      <h5 class="mb-0"><a href="booknow.php" class="text-body backbtn"><i class="fas fa-arrow-alt-circle-left"></i> BOOK NOW</a>
                      </h5>
                    </div>
                    ';
                  }
                }
              }
            }
          }
        }else {
          echo "<h2 class='text-muted emptycart'>YOUR FAVORITE LIST IS EMPTY<i class='fas fa-from'></i></h2><br>
          <div class='pt-5'>
            <h5 class='mb-0'><a href='booknow.php' class='text-body backbtn'><i class='fas fa-arrow-alt-circle-left'></i> BOOK NOW</a>
            </h5>
          </div>";
        }
        if (isset($_SESSION['favorite'])){
          $count = count($_SESSION['favorite']);
          if ($count ==0){
            echo "<h2 class='text-muted emptycart'>YOUR FAVORITE LIST IS EMPTY<i class='fas fa-from'></i></h2><br>
            <div class='pt-5'>
              <h5 class='mb-0'><a href='booknow.php' class='text-body backbtn'><i class='fas fa-arrow-alt-circle-left'></i> BOOK NOW</a>
              </h5>
            </div>";
          }
        }
         ?>

      </div>
    </div>

    <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

      <div class="pt-4">
        <h6>PRICE DETAILS</h6>
        <hr>
        <div class="row price-details">
          <div class="col-md-6">
          <?php
          if(isset($_SESSION['favorite'])){
            $count = count($_SESSION['favorite']);
            echo "<h6>PRICE ($count ROOMS)</h6>";
          }else{
            echo "<h6>PRICE (0 ROOMS)</h6>";
          }
           ?>
           <h6>BOOKING CHARGES</h6>
           <hr>
           <h6>AMOUNT PAYABLE</h6>
           <hr>
        </div>
        <div class="col-md-6">
          <h6><?php if(isset($_SESSION['favorite'])){ echo "₹ $Total"; }else{ echo "₹ 0.00"; } ?></h6>
          <h6 class="text-success">FREE</h6>
          <hr>
          <h6><?php if(isset($_SESSION['favorite'])){ echo "₹ $Total"; }else{ echo "₹ 0.00"; } ?></h6>
          <hr>
        </div>
        <div class="col-md-6">
          <center>
          <form action="checkout.php" method="POST">
              <button type="submit" name="checkout" class="btn btn-outline-dark">CHECKOUT</button>
            </form>
          </center>
          <br>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>



<!-- Removing Room From Favorite -->
<?php
if (isset($_POST['remove'])) {
  foreach ($_SESSION['favorite'] as $key => $value) {
    if ($value['id'] == $_POST['Roomid']) {
      unset($_SESSION['favorite'][$key]);
      ?>
      <script>
      /// alert('ROOM REMOVED FROM FAVORITES.');
      location.replace("favorite.php");
      </script>
      <?php
    }
  }
}
 ?>







<!-- JS FUNCTIONS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
