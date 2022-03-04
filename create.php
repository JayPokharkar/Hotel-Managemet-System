<?php
session_start();

?>

<html>
   <head>
   <title>PARADISE HOTEL</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <link rel="stylesheet" href="css\login.css">
   </head>

     <body>

       <?php

      include 'dbcon.php';

      if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));

        $emailquery = " select * from registration where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        $msg= "";

        if($emailcount>0){
          ?>
          <script>
          alert("Email Already Exists!");
          </script>
          <?php
          echo  "Email already exists!";

        }else{

          if($password === $cpassword){

            $insertquery = "insert into registration( username, email, password, cpassword, token, status) values('$username','$email','$pass','$cpass','$token','inactive' )";

            $iquery = mysqli_query($con, $insertquery);

            if($iquery){

              $subject = "Email Activation";
              $body = "Hi, $username. Click here to activate your account
              http://localhost/TYITPROJECT/activate.php?token=$token ";

              $sender_email = "From: hotelparadise789@gmail.com";

              if(mail($email, $subject, $body, $sender_email)){
                $_SESSION['msg'] = "Check your mail to activate your account $email";
                header('location:login.php');
              }else{
                echo "Email sending Failed...";
              }


            }else{

              ?>
              <script>
              alert("Connection Failed");
              </script>
              <?php
            }

          }else{
            ?>
            <script>
            alert("Passwords are not matching!");
            </script>
            <?php
            echo "Passwords are not matching!";

          }
        }


      }


      ?>


      <div class="sidenav">
         <div class="login-main-text">
            <h1>PARADISE HOTEL</h1>
            <h4>Booking Hotel Rooms Made Easy!</h4>
            <h4><a href="home.php"> HOME </a>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form id="Login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="formsect">


                 <div class="form-group">
                    <label>Enter Username</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required>
                 </div>

                 <div class="form-group">
                    <label>Enter Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                 </div>

                 <div class="form-group">
                   <label>Enter Password</label>
                   <input type="password" name="password" class="form-control" placeholder="Password" required>
                 </div>

                 <div class="form-group">
                   <label>Enter Confirm Password</label>
                   <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"  required >
                 </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="SignUp"> </br>
                  </br>Already have an account? <a href = "login.php">LogIn</a>
                 </form>
            </div>
         </div>
      </div>
   </body>
</html>
