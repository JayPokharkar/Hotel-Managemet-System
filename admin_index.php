<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PARADISE HOTEL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Play:wght@700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
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
                  <a class="nav-link active" aria-current="page" href="admin_index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_booknow.php">BOOK NOW</a>
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
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section id="features">
    <div class="row">
      <div class="col-lg-4">
        <i class="fas fa-concierge-bell fa-5x"></i>
        <h3>24/7 SERVICE.</h3>
      </div>
      <div class="col-lg-4">
        <i class="fas fa-home fa-5x"></i></i>
        <h3>FEEL LIKE HOME.</h3>
      </div>
      <div class="col-lg-4">
        <i class="fas fa-people-arrows fa-5x"></i>
        <h3>NO CONTACT BOOKING.</h3>
      </div>
    </div>
  </section>

  <!-- CAROUSEL -->
  <section id="carousel">
    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="admin_booknow.php">
          <img src="images\carousel-1.jpg" alt="books">
          <h2>BEST HOTEL ROOMS AVAILABLE HERE</h2>
          </a>
        </div>
        <div class="carousel-item">
          <a href="admin_booknow.php">
          <img src="images\carousel-2.jpg" alt="books">
          <h2>DISCOUNT : UPTO 20% OFF</h2>
          </a>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">next</span>
      </button>
    </div>
  </section>

  <!-- PRICING -->
  <section id="pricing">
    <div class="container">
      <div class="card-group">
        <div class="card">
          <img src="images\pricing-1.jpg" class="card-img-top img" alt="...">
          <div class="card-body">
            <h5 class="card-title">SINGLE ROOMS</h5>
            <p class="card-text">A single room is a room intended for one person to stay in. A room assigned to one person. May have one or more beds. The room size or area of Single Rooms are generally between 37 m² to 45 m².</p>
          </div>
          <div class="card-footer">
            <a href="admin_booknow.php">
              <br><center><button type="button" class="btn btn-outline-info">BOOK NOW</button></center><br>
            </a>
          </div>
        </div>
        <div class="card">
          <img src="images\pricing-2.jpg" class="card-img-top img" alt="...">
          <div class="card-body">
            <h5 class="card-title">LANAI ROOMS</h5>
            <p class="card-text">A term frequently used in Hawaii to describe a specific type of porch. Most often it's used to describe an enclosed porch with a concrete or stone floor. Lanais are slightly different from sunrooms because most often they have concrete floors and are situated on the ground adjacent to the home.</p>
          </div>
          <div class="card-footer">
            <a href="admin_booknow.php">
              <br><center><button type="button" class="btn btn-outline-info">BOOK NOW</button></center><br>
            </a>
          </div>
        </div>
        <div class="card">
          <img src="images\pricing-3.jpg" class="card-img-top img" alt="...">
          <div class="card-body">
            <h5 class="card-title">KING ROOMS</h5>
            <p class="card-text">A room with a king-sized bed. May be occupied by one or more people. The room size or area of King Rooms are generally between 32 m² to 50 m².</p>
          </div>
          <div class="card-footer">
            <a href="admin_booknow.php">
              <br><center><button type="button" class="btn btn-outline-info">BOOK NOW</button></center><br>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <section id="footer">
    <footer>
      <div class="container">
        <a href="https://twitter.com/"><i class="fab fa-twitter fa-3x"></i></a>
        <a href="https://en-gb.facebook.com/"><i class=" fab fa-facebook-f fa-3x"></i></a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-3x"></i></a>
        <h5>© Copyright 2021</h5>
      </div>
    </footer>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
