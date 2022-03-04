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
   <script type="text/javascript">
   function hideMessage() {
     document.getElementById("message").style.display = "none";
   };
   setTimeout(hideMessage, 3000);
</script>

   </head>

<body>

  <?php

  include 'dbcon.php';

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " select * from registration where email='$email' and status='active' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
      $email_pass = mysqli_fetch_assoc($query);

      $db_pass = $email_pass['password'];

      $_SESSION['username'] = $email_pass['id'];

      $pass_decode = password_verify($password, $db_pass);

      if($pass_decode){
        echo "Login Successful";
        header('location:index.php');
      }else{
        echo "Password Incorrect.";
      }

    }else{
      echo "Invalid Email.";
    }
  }

  ?>


<?php
$con = mysqli_connect('localhost', 'root');
if($con){

}else{
  echo "No connection";
}

$db = mysqli_select_db($con, 'tyitproject');

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = " select * from adminlogin where email = '$email' and password = '$password' ";
  $query = mysqli_query($con,$sql);

  if (mysqli_num_rows($query) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($query);
			if ($logged_in_user['user_type'] == 'admin') {
        $_SESSION['email'] = $email;
				header('location:admin_index.php');
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
                 <div>
                   <p id="message">

                     <?php
                     if(isset($_SESSION['msg'])){
                       echo $_SESSION['msg'];
                     }else{
                       echo $_SESSION['msg'] = "Please LogIn.";
                     }
                    ?>
                </p>
                 </div>

                    <div class="form-group">
                       <label>Enter Email</label>
                       <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                       <label>Enter Password</label>
                       <input type="password" name="password" class="form-control" placeholder="Password"  required >
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="LogIn"></br>
                  </br>Don't have an account? <a href = "create.php"> SignUp </a>
                 </form>
            </div>
         </div>
      </div>
   </body>
</html>
