<?php
    session_start();
    include ("config.php");
    if($_SESSION['id'])
    {
      echo "<script> alert('User already Logged In , sign-out and try !!!');</script> ";
      header("location: index.php");
      exit();
    }
    else
    {


    if(isset($_POST['fname']) and isset($_POST['pass']))
    {
      $id = mysqli_real_escape_string($db,$_POST['id']); 
      $fname = mysqli_real_escape_string($db,$_POST['fname']);
      $lname = mysqli_real_escape_string($db,$_POST['lname']); 
       $pass = mysqli_real_escape_string($db,$_POST['pass']); 
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $phone = mysqli_real_escape_string($db,$_POST['phone']);
      $category = mysqli_real_escape_string($db,$_POST['descrip']);
      $name =$fname." ".$lname; 
      $sql1= "select username from login where id='$id' ";
      $res1 = mysqli_query($db,$sql1);
       $c1 = mysqli_num_rows($res1);
      if($c1==1)
      {
        echo "<script> alert ('ID already exist try new id or log in');</script>";
        header("location: signup.php");
        exit();
      }
      $sql = "INSERT INTO login (id,username,password,email,phone,category) VALUES ('$id','$name', '$pass', '$email','$phone','$category')";
      //$result = mysqli_query($db,$sql);
       $result = mysqli_query($db,$sql);
      
      if ($result) {
         
        header("refresh:1,url=imageUpload.php");
        exit();
        }
        
        else
        {
          printf("Error: %s\n", mysqli_error($db));
        header( "refresh:5;url=signup.php" );
        }
      exit();
      
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
	
</head>
<body style="background: radial-gradient(circle, rgba(39,227,218,0.3648809865743172) 0%, rgba(23,245,216,0.24163168685442926) 47%, rgba(13,236,245,0.2164216028208158) 100%)">
	<div class="main-header">
		<nav class="navbar navbar-expand-lg">
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
		        <a class="nav-link" href="login.php">Login</a>
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
	<div class="register container">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money with your skills!</p>
                        <input type="button" onclick="log()" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Sign-Up</h3>
                                <form method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='fname'placeholder="First Name *" required value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name='lname'placeholder="Last Name *" required value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required class="form-control"name='pass' placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name='id'  placeholder="Id [a-z0-9] *" reqiured value=""/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="descrip" value="user" checked>
                                                    <span> User </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="descrip" value="lancer">
                                                    <span>Lancer </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name='email'required class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10"required  maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required  class="form-control" placeholder="Enter Your Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script type="text/javascript">
              function log()
              { 
                  
                 window.location = "login.php";
              }
              
            </script>
            <!-- Footer -->
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