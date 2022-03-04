<?php

session_start();

if(!isset($_SESSION['username'])){
  header('location:login.php');
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
                  <a class="nav-link" href="booknow.php">BOOK NOW</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="aboutus.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactus.php">CONTACT US</a>
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
  <!-- CONTACT US -->
  <section id="about">
    <div class="container">

      <h1>ABOUT US!</h1>
      <h5><span>PARADISE HOTEL</span> is an E-commerce platform for online booking of hotel rooms.</h5>
      <h5>We're dedicated to providing you the very best of hotel services, with an emphasis on reliability, and quality assurance of our services.</h5>
      <h5>Founded in 2021 by <span>JAY POKHARKAR, PARADISE HOTEL</span> has come a long way from its beginnings. When our founder first started out, his passion for providing the best room services drove them to create an E-commerce website so that <span>PARADISE HOTEL</span> can offer
        you the latest and joyful facilities for a great price. We are thrilled that we're able to turn our passion into our own website.</h5>
      <h5>We hope you enjoy our services as much as we enjoy offering them to you. If you have any questions or comments, please do not hesitate to give a feedback on <a href="feedback.php"><span>FEEDBACK</span></a>, or you can even contact us by using the <a href="contactus.php"><span>CONTACT US</span></a>, our customer support team would be pleased to help you.</h5><br />
      <h5>Thank You for visiting our website. </h5><br />
      <h5>Sincerely,</h5>
      <h5> <span>PARADISE TEAM</span></h5>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
