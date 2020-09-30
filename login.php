<?php
    session_start();
    include ("config.php");
   
    if(isset($_POST['username']) and isset($_POST['password']))
    {
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM login WHERE id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
         $sql1 = "SELECT username FROM login WHERE id = '$myusername' ";
         $result1 = mysqli_query($db,$sql1);
          $c1 = mysqli_num_rows($result1);
          if ($c1==1)
          {
                echo "<script type='text/javascript'> alert('invalid ID or Password') </script>";
                header("location: login.php"); 
                exit();  
          }
          else
          {
                echo "<script> alert('UserID not Found ') ;</script>";
                header("location: signup.php"); 
                exit();
          }
        
        }

      
      
      $count = mysqli_num_rows($result);
        
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['id'] = $myusername;
        
         header("location: allDis.php");
      }else {
         echo "<script type='text/javascript'> alert('invalid ID or Password') </script>";
               // header("location: error.php"); 
         //$error = "Your Login Name or Password is invalid";
      }
   }
 ?>




<!DOCTYPE html>
<html>
<head>
  <title>JNU lancers</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  
  
</head>
<div class="main-header">
    <nav class="navbar navbar-expand-lg ">
      <div class="container text-uppercase p-2">
      <a class="navbar-brand" href="index.html"><img src="images/logo2.svg"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profileView/abt.html">About us</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign-up</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  </div>
  <!-- header end -->
  <div class="login-container">
  <div class="d-flex justify-content-center h-100" style="padding-top: 10%; margin-bottom: 0px; padding-bottom: 10%;">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
      </div>
      <div class="card-body">
        <form   method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user icon"></i></span>
            </div>
            <input type="text" class="form-control" name='username' placeholder="User ID" required>
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-key icon"></i></span>
            </div>
            <input type="password" name ='password'class="form-control" placeholder="password" required>
          </div>
          <div class="row align-items-center remember">
            <input type="checkbox">Remember Me
          </div>
          <div class="form-group">
            <input type="submit" value="Login" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Don't have an account?<a href="signup.php">Sign Up</a>
        </div>
        <div class="d-flex justify-content-center">
          <a href="#">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="page-footer font-small mdb-color lighten-3 pt-4 bottom">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4"><img src="images/logo2.svg"></h5>
        <p>Here you can use rows and columns to organize your footer content.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate
          esse
          quasi, veritatis totam voluptas nostrum.</p>

      </div>
      <!-- Grid column -->
      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <a href="#!">PROJECTS</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">ABOUT US</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">BLOG</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">AWARDS</a>
            </p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3" style="text-align: right;"></i> School of Computer and System Sciences JNU Delhi </p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i> info@example.com</p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i> + 91 8285 868 868</p>
          </li>
          <li>
            <p>
              <i class="fas fa-print mr-3"></i> + 91 234 567 89</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">
      </div>
      <!-- Grid column -->
      
      <div class="text-center">
        <h3 class="text-center">FOLLOW US</h3>
      <ul class="social">
      <li class="f"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li class="t"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
      <li class="g"><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
      <li class="l"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
      <li class="i"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    </ul>
      </div>
      <!-- Grid column -->

    
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> JNULancers </a>All rights reserved
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>