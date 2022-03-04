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
  <link rel="stylesheet" href="css/booknow.css">
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
                  <a class="nav-link" aria-current="page" href="#SINGLEROOMS">SINGLE ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#DOUBLEROOMS">DOUBLE ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#TRIPLEROOMS">TRIPLE ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#QUEENROOMS">QUEEN ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#KINGROOMS">KING ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#TWINROOMS">TWIN ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#DOUBLEDOUBLE">DOUBLE DOUBLE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#QUADROOMS">QUAD ROOMS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#LANAIROOMS">LANAI ROOMS</a>
                </li>
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

  <br>

<?php
include 'dbcon.php';

if(isset($_POST['addtofav'])){

if(isset($_SESSION['favorite'])){

  $item_array_id = array_column($_SESSION['favorite'], "id");

  if(in_array($_POST['id'], $item_array_id)){

    ?>
    <script>
    location.replace('booknow.php');
    alert ('ROOM ALREADY Added TO FAVORITES.');
    </script>
    <?php


  }else{

    $count = count($_SESSION['favorite']);
    $item_array = array(
      'id' => $_POST['id']
    );

    ?>
    <script>
    location.replace('booknow.php');
    alert ('ROOM Added TO FAVORITES.');
    </script>
    <?php
    $_SESSION['favorite'][$count] = $item_array;

  }

}else{

  $item_array = array(
    'id' => $_POST['id']
  );

  //create new session
  $_SESSION['favorite'][0] = $item_array;
}
}


 ?>


  <!-- SINGLEROOMS -->
  <section id="SINGLEROOMS">
    <center><h1>SINGLE ROOMS</h1></center>
    <div class="container">
      <div class="row">
        <?php
        include 'dbcon.php';
        $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'SINGLE ROOM'");
        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
            $id = $row["id"];
            $room_name = $row["room_name"];
            $room_price = $row["room_price"];
            $room_image = $row["room_image"];
            $room_description = $row["room_description"];

            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 altercard">
            <form name="form1" action="booknow.php" method="POST">
            <div class="card h-100" style="width: 18rem;">
            <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
            <div class="card-body d-flex flex-column">
            <h4>'.$room_name.'</h4>
            <h5>₹ '.$room_price.' /DAY</h5>
            <p class="card-text">'.$room_description.'</p>
            </div>
            <br>
            <div class="button">
            <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
            <input type="hidden" name="id" value='.$id.'>
            </div>
            </div>
            </form>
            </div>

            ';

          }
        }
         ?>
       </div>
     </div>
   </section>

   <!-- DOUBLEROOMS -->
   <section id="DOUBLEROOMS">
     <center><h1>DOUBLE ROOMS</h1></center>
     <div class="container">
       <div class="row">
         <?php
         include 'dbcon.php';
         $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'DOUBLE ROOM'");
         if (mysqli_num_rows($result) > 0){
           while ($row = mysqli_fetch_assoc($result)){
             $id = $row["id"];
             $room_name = $row["room_name"];
             $room_price = $row["room_price"];
             $room_image = $row["room_image"];
             $room_description = $row["room_description"];

             echo '
             <div class="col-lg-3 col-md-6 col-sm-6 altercard">
             <form name="form1" action="" method="post">
             <div class="card h-100" style="width: 18rem;">
             <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
             <div class="card-body d-flex flex-column">
             <h4>'.$room_name.'</h4>
             <h5>₹ '.$room_price.' /DAY</h5>
             <p class="card-text">'.$room_description.'</p>
             </div>
             <br>
             <div class="button">
             <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
             <input type="hidden" name="id" value='.$id.'>
             </div>
             </div>
             </form>
             </div>

             ';

           }
         }
          ?>
        </div>
      </div>
    </section>


      <!-- TRIPLEROOMS -->
      <section id="TRIPLEROOMS">
        <center><h1>TRIPLE ROOMS</h1></center>
        <div class="container">
          <div class="row">
            <?php
            include 'dbcon.php';
            $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'TRIPLE ROOM'");
            if (mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){
                $id = $row["id"];
                $room_name = $row["room_name"];
                $room_price = $row["room_price"];
                $room_image = $row["room_image"];
                $room_description = $row["room_description"];

                echo '
                <div class="col-lg-3 col-md-6 col-sm-6 altercard">
                <form name="form1" action="" method="post">
                <div class="card h-100" style="width: 18rem;">
                <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
                <div class="card-body d-flex flex-column">
                <h4>'.$room_name.'</h4>
                <h5>₹ '.$room_price.' /DAY</h5>
                <p class="card-text">'.$room_description.'</p>
                </div>
                <br>
                <div class="button">
                <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
                <input type="hidden" name="id" value='.$id.'>
                </div>
                </div>
                </form>
                </div>

                ';

              }
            }
             ?>
           </div>
         </div>
       </section>

       <!-- QUEENROOMS -->
       <section id="QUEENROOMS">
         <center><h1>QUEEN ROOMS</h1></center>
         <div class="container">
           <div class="row">
             <?php
             include 'dbcon.php';
             $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'QUEEN ROOM'");
             if (mysqli_num_rows($result) > 0){
               while ($row = mysqli_fetch_assoc($result)){
                 $id = $row["id"];
                 $room_name = $row["room_name"];
                 $room_price = $row["room_price"];
                 $room_image = $row["room_image"];
                 $room_description = $row["room_description"];

                 echo '
                 <div class="col-lg-3 col-md-6 col-sm-6 altercard">
                 <form name="form1" action="" method="post">
                 <div class="card h-100" style="width: 18rem;">
                 <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
                 <div class="card-body d-flex flex-column">
                 <h4>'.$room_name.'</h4>
                 <h5>₹ '.$room_price.' /DAY</h5>
                 <p class="card-text">'.$room_description.'</p>
                 </div>
                 <br>
                 <div class="button">
                 <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
                 <input type="hidden" name="id" value='.$id.'>
                 </div>
                 </div>
                 </form>
                 </div>

                 ';

               }
             }
              ?>
            </div>
          </div>
        </section>

    <!-- KINGROOMS -->
    <section id="KINGROOMS">
      <center><h1>KING ROOMS</h1></center>
      <div class="container">
        <div class="row">
          <?php
          include 'dbcon.php';
          $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'KING ROOM'");
          if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
              $id = $row["id"];
              $room_name = $row["room_name"];
              $room_price = $row["room_price"];
              $room_image = $row["room_image"];
              $room_description = $row["room_description"];

              echo '
              <div class="col-lg-3 col-md-6 col-sm-6 altercard">
              <form name="form1" action="" method="post">
              <div class="card h-100" style="width: 18rem;">
              <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
              <div class="card-body d-flex flex-column">
              <h4>'.$room_name.'</h4>
              <h5>₹ '.$room_price.' /DAY</h5>
              <p class="card-text">'.$room_description.'</p>
              </div>
              <br>
              <div class="button">
              <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
              <input type="hidden" name="id" value='.$id.'>
              </div>
              </div>
              </form>
              </div>

              ';

            }
          }
           ?>
         </div>
       </div>
     </section>

     <!-- TWINROOMS -->
     <section id="TWINROOMS">
       <center><h1>TWIN ROOMS</h1></center>
       <div class="container">
         <div class="row">
           <?php
           include 'dbcon.php';
           $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'TWIN ROOM'");
           if (mysqli_num_rows($result) > 0){
             while ($row = mysqli_fetch_assoc($result)){
               $id = $row["id"];
               $room_name = $row["room_name"];
               $room_price = $row["room_price"];
               $room_image = $row["room_image"];
               $room_description = $row["room_description"];

               echo '
               <div class="col-lg-3 col-md-6 col-sm-6 altercard">
               <form name="form1" action="" method="post">
               <div class="card h-100" style="width: 18rem;">
               <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
               <div class="card-body d-flex flex-column">
               <h4>'.$room_name.'</h4>
               <h5>₹ '.$room_price.' /DAY</h5>
               <p class="card-text">'.$room_description.'</p>
               </div>
               <br>
               <div class="button">
               <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
               <input type="hidden" name="id" value='.$id.'>
               </div>
               </div>
               </form>
               </div>

               ';

             }
           }
            ?>
          </div>
        </div>
      </section>

      <!-- DOUBLEDOUBLE -->
      <section id="DOUBLEDOUBLE">
        <center><h1>DOUBLE DOUBLE</h1></center>
        <div class="container">
          <div class="row">
            <?php
            include 'dbcon.php';
            $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'DOUBLE DOUBLE'");
            if (mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){
                $id = $row["id"];
                $room_name = $row["room_name"];
                $room_price = $row["room_price"];
                $room_image = $row["room_image"];
                $room_description = $row["room_description"];

                echo '
                <div class="col-lg-3 col-md-6 col-sm-6 altercard">
                <form name="form1" action="" method="post">
                <div class="card h-100" style="width: 18rem;">
                <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
                <div class="card-body d-flex flex-column">
                <h4>'.$room_name.'</h4>
                <h5>₹ '.$room_price.' /DAY</h5>
                <p class="card-text">'.$room_description.'</p>
                </div>
                <br>
                <div class="button">
                <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
                <input type="hidden" name="id" value='.$id.'>
                </div>
                </div>
                </form>
                </div>

                ';

              }
            }
             ?>
           </div>
         </div>
       </section>

       <!-- QUADROOMS -->
       <section id="QUADROOMS">
         <center><h1>QUAD ROOMS</h1></center>
         <div class="container">
           <div class="row">
             <?php
             include 'dbcon.php';
             $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'QUAD ROOM'");
             if (mysqli_num_rows($result) > 0){
               while ($row = mysqli_fetch_assoc($result)){
                 $id = $row["id"];
                 $room_name = $row["room_name"];
                 $room_price = $row["room_price"];
                 $room_image = $row["room_image"];
                 $room_description = $row["room_description"];

                 echo '
                 <div class="col-lg-3 col-md-6 col-sm-6 altercard">
                 <form name="form1" action="" method="post">
                 <div class="card h-100" style="width: 18rem;">
                 <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
                 <div class="card-body d-flex flex-column">
                 <h4>'.$room_name.'</h4>
                 <h5>₹ '.$room_price.' /DAY</h5>
                 <p class="card-text">'.$room_description.'</p>
                 </div>
                 <br>
                 <div class="button">
                 <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
                 <input type="hidden" name="id" value='.$id.'>
                 </div>
                 </div>
                 </form>
                 </div>

                 ';

               }
             }
              ?>
            </div>
          </div>
        </section>

        <!-- LANAIROOMS -->
        <section id="LANAIROOMS">
          <center><h1>LANAI ROOMS</h1></center>
          <div class="container">
            <div class="row">
              <?php
              include 'dbcon.php';
              $result = mysqli_query($con, "SELECT * FROM rooms WHERE room_category = 'LANAI ROOM'");
              if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                  $id = $row["id"];
                  $room_name = $row["room_name"];
                  $room_price = $row["room_price"];
                  $room_image = $row["room_image"];
                  $room_description = $row["room_description"];

                  echo '
                  <div class="col-lg-3 col-md-6 col-sm-6 altercard">
                  <form name="form1" action="" method="post">
                  <div class="card h-100" style="width: 18rem;">
                  <img src ="images/'.$room_image.'" class="card-img-top cpu" alt="..."/>
                  <div class="card-body d-flex flex-column">
                  <h4>'.$room_name.'</h4>
                  <h5>₹ '.$room_price.' /DAY</h5>
                  <p class="card-text">'.$room_description.'</p>
                  </div>
                  <br>
                  <div class="button">
                  <center><button type="submit" name="addtofav" class="btn btn-outline-dark">ADD TO FAVORITES</button></center><br><br>
                  <input type="hidden" name="id" value='.$id.'>
                  </div>
                  </div>
                  </form>
                  </div>

                  ';

                }
              }
               ?>
             </div>
           </div>
         </section>


  <!-- JS FUNCTIONS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
