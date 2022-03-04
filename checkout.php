<?php
session_start();

if(!isset($_SESSION['username'])){
  header('location:login.php');
}

include 'dbcon.php';
include 'component.php';

if (!isset($_SESSION['favorite'])) {
  header('location:favorite.php');
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Play:wght@700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css\checkout.css">

   <script>
   $(document).ready(function(){

     var dtToday = new Date();

     var month = dtToday.getMonth() + 1;
     var day = dtToday.getDate();
     var year = dtToday.getFullYear();
     if(month < 10)
     month = '0' + month.toString();
     if(day < 10)
     day = '0' + day.toString();

     var maxDate = year + '-' + month + '-' + day;
     $('#check_in').attr('min', maxDate);
   })
   </script>
   <script>
   $(document).ready(function(){

     var dtToday = new Date();

     var month = dtToday.getMonth() + 1;
     var day = dtToday.getDate();
     var year = dtToday.getFullYear();
     if(month < 10)
     month = '0' + month.toString();
     if(day < 10)
     day = '0' + day.toString();

     var maxDate = year + '-' + month + '-' + day;
     $('#check_out').attr('min', maxDate);
   })
   </script>
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
               echo "<span id=\"favorite_count\" class=\"text-warning bg-light\">$count</span>";
             }else{
               echo "<span id=\"favorite_count\" class=\"text-warning bg-light\">0</span>";
             }

              ?>
           </h5>
         </a>
         </div>
       </div>
     </nav>
   </section>

    <section id="checkout">
      <div class="h-100 h-custom py-5">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registraton card-registraton-2 checkout" style="border-radius: 15px;">
                <div class="row g-0">
                  <div class="col-lg-8 gradient-custom">
                    <div class="row mt-3 mx-3" style="margin-top: 25px;">
                      <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="text-center" style="margin-top: 50px; margin-left: 10px;">
                          <h4 class="text-muted personal">PERSONAL INFORMATION</h4>
                        </div>
                        <div class="text-center cartbtn">
                          <a href="favorite.php">
                            <button type="submit" name="button" class="btn btn-outline-dark"><i class="far fa-arrow-alt-circle-left"></i> FAVORITE</button>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-9 col-sm-9 col-lg-9 justify-content-center detailscard">
                        <div class="card card-custom pb-4 details">
                          <div class="card-body mt-0 mx-5">
                            <div class="text-center mb-3 pb-2 mt-3">
                              <h4 class="text-white">DETAILS</h4>
                            </div>
                            <form class="mb-0" action="checkout.php" method="POST">
                              <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                    <input class="form-control input-custom" type="text" name="firstname" placeholder="FIRST NAME" required>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                    <input class="form-control input-custom" type="text" name="lastname" placeholder="LAST NAME" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                    <input class="form-control input-custom" type="text" name="state" placeholder="STATE" required>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                    <input class="form-control input-custom" type="text" name="city" placeholder="CITY" required>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                    <input class="form-control input-custom" type="number" name="pincode" placeholder="PINCODE"  required>
                                  </div>
                                </div>
                              </div>
                              <div class="col">
                                <input class="form-control input-custom" type="email" name="email" placeholder="EMAIL ID - abc@example.com" required>
                              </div><br>
                               <div class="col">
                                <label class="text-white">CHECK-IN DATE</label>
                              </div><br>
                              <div>
                                <input class="form-control input-custom" type="date" name="check_in" id="check_in" placeholder="CHECK-IN" required>
                              </div><br>
                              <div class="col">
                               <label class="text-white">CHECK-OUT DATE</label>
                             </div><br>
                             <div>
                               <input class="form-control input-custom" type="date" name="check_out" id="check_out" placeholder="CHECK-OUT" required>
                             </div><br>
                                <button type="submit" name="book" class="btn btn-outline-info">BOOK <i class="fas fa-check-circle"></i></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                      <h3 class="fw-bold mb-5 mt-2 pt-1">SUMMARY</h3>
                      <hr class="my-4">
                      <h5 class="iteminfo">ROOM(S): <?php if (isset($_SESSION['favorite'])) {
                        $count = count($_SESSION['favorite']);
                        echo $count;
                      }?></h5><br>
                      <?php
                      include 'dbcon.php';
                      include 'component.php';

                        if (isset($_POST['checkout'])) {
                          if (isset($_SESSION['favorite'])) {
                            $Total = 0;
                            $Rid = array_column($_SESSION['favorite'],'id');
                            $result = mysqli_query($con, "SELECT * FROM rooms");
                            while ($row = mysqli_fetch_assoc($result)) {
                              foreach ($Rid as $roomID) {
                                if ($row['id'] == $roomID) {
                                  $RoomID = $row['id'];
                                  if ($RoomID) {
                                    $SqlQuery = mysqli_query($con, "SELECT * FROM rooms WHERE id='$RoomID'");
                                    while ($row2 = mysqli_fetch_assoc($SqlQuery)) {
                                      $Roomname = $row2['room_name'];
                                      $Roomprice = $row2['room_price'];
                                      $Roomimg = $row2['room_image'];

                                      $Total = $Total + (int)$row2['room_price'];

                                      echo '
                                      <div class="row d-flex justify-content-between mb-4 align-items-center">
                                        <div class="col">
                                          <img src="images/'.$Roomimg.'" class="img-fluid rounded-3" alt="" width="60px">
                                        </div>
                                        <div class="col">
                                          <h6 class="text-muted mb-0">'.$Roomname.'</h6>
                                        </div>
                                        <div class="col">
                                          <h6 class="text-muted mb-0">₹'.number_format($Roomprice).'</h6>
                                        </div>
                                      </div>
                                      <hr class="my-4">
                                      ';
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                       ?>
                      <h5>AMOUNT PAYABLE:</h5>
                      <div>
                        <h6 class="text-muted">TOTAL PRICE: ₹<?php if (isset($_SESSION['favorite'])) {
                          echo number_format($Total);
                        }else {
                          echo "0.00";
                        } ?>.00 /DAY</h6>
                      </div>
                      <hr class="my-4">
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    include 'dbcon.php';

    if(isset($_POST['book'])){
      $FirstName = $_POST['firstname'];
      $LastName = $_POST['lastname'];
      $State = $_POST['state'];
      $City = $_POST['city'];
      $Pincode = $_POST['pincode'];
      $EmailID = $_POST['email'];
      $CheckIn = date('Y-m-d', strtotime($_POST['check_in']));
      $CheckOut = date('Y-m-d', strtotime($_POST['check_out']));

      $Uid = $_SESSION['username'];
      $Rid = array_column($_SESSION['favorite'],'id');
      $result = mysqli_query($con, "SELECT id from rooms");
      while ($row = mysqli_fetch_assoc($result)){
        foreach ($Rid as $RID){
          if ($row['id'] == $RID){
            $RoomID = $row['id'];
            if ($RoomID){
              $query = mysqli_query($con, "SELECT * FROM rooms WHERE id='$RoomID'");
              while ($data = mysqli_fetch_assoc($query)){
                $Roomname = $data['room_name'];
                $Roomprice = $data['room_price'];
                $Roomimage = $data['room_image'];


                $SqlQuery = mysqli_query($con, "INSERT INTO bookings (user_id, room_id, room_name, room_price, room_image, first_name, last_name, state, city, pincode, email, check_in, check_out) VALUES($Uid, $RoomID, '$Roomname', $Roomprice, '$Roomimage', '$FirstName', '$LastName', '$State', '$City', '$Pincode', '$EmailID', '$CheckIn', '$CheckOut')");
                if ($SqlQuery){
                  ?>
                    <script>
                      location.replace("booking_history.php");
                      alert("YOUR ROOM HAS BEEN BOOKED");
                    </script>
                    <?php
                  unset($_SESSION['favorite']);
                }else {
                  echo mysqli_error($con);
                }
              }
            }
          }
        }
      }

    }
     ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
  </html>
