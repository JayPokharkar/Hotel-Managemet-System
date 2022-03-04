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

<section class="h-100 gradient-form" style="background-color: #F4EEFF;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h1 class="mt-1 mb-5 pb-1">TEAM PARADISE</h1>
                </div>

                <form name="form1" action="" method="post">
                  <p><center><h2>FEEDBACK</h2></center></p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">USERNAME:</label>
                    <input class="form-control input-custom" type="text" name="username" placeholder="USERNAME" required>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">EMAIL:</label>
                    <input class="form-control input-custom" type="email" name="email" placeholder="EMAIL ID - abc@example.com" required>
                  </div>

                  <div>
                    <label class="form-label" for="form2Example22">COMMENTS:</label>
                    <br><center><textarea class="form-control input-custom" id="comments" cols="40" rows="5" name="comments" placeholder="COMMENTS" required></textarea></center><br><br>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <button type="submit" name="submit" class="btn btn-outline-dark">SUBMIT</button>
                  </div>

                </form>

                <?php
                include 'dbcon.php';

                if(isset($_POST["submit"]))
                {
                  $username = $_POST['username'];
                  $email = $_POST['email'];
                  $comments = $_POST['comments'];

                  $insertquery = "INSERT INTO feedback( username, email, comments) values('$username','$email','$comments')";
                  $iquery = mysqli_query($con, $insertquery);

                  if($iquery){
                    ?>
                    <script>
                    alert("FEEDBACK SUBMITTED SUCCESSFULY");
                    location.replace("feedback.php");
                  </script>
                  <?php
                }else {
                  echo mysqli_error($con)
                ?>
                <script>
                alert("SOMETHING WENT WRONG");
                location.replace("feedback.php");
                </script>
                <?php
              }
            }

              ?>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <h1 class="mb-4">We are more than happy to have you!</h1>
                <p><h5>We hope you enjoy our services as much as we enjoy offering them to you. If you have any questions or comments, please do not hesitate to share the feedback or you can contact us by using the <br><a href="contactus.php"><span>Contact Us</span></a>, our customer support team would be pleased to help you.</h5></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JS FUNCTIONS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
