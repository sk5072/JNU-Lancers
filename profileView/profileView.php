<?php
  session_start();
  include("config.php");
  
  if(!$_SESSION['id'])
  {
  	echo '<script> alert(" NOT Logged in ");</script>';
  	header("location: ../index.php");
    
  }
  
  // do some validation here to ensure id is safe
  
  $id= $_SESSION['id'];
  
 $query = "SELECT * FROM tbl_images where id='$id'";  
 $result = mysqli_query($db, $query);
 $c1 = mysqli_num_rows($result);
 if($c1==1)
 {
 	 $row = mysqli_fetch_array($result) ;
     $image_data =$row['name'];	
 } 
 else 
 {
 	$query = "SELECT * FROM tbl_images where id='$id'";  
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result) ;
    $image_data =$row['name'];	
 } 


 
  
  $query = "SELECT * FROM login where id='$id' ";  
 $result = mysqli_query($db, $query)or die("error" ) ;
 $row=  mysqli_fetch_array($result) ;              
  $id =$row['id'];
  $email=$row['email'];
  $name=$row['username'];
  $ph=$row['phone'];              
                
  
  
 ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>User Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
     <style type="text/css">
     	.apbtn{
     		border-bottom-left-radius: 2rem;
    border-bottom-right-radius: 2rem;
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
    margin-left: 250px;
    margin-top: 0px;
    font-size: 25px;
    width: 400px;
    background-color: cornflowerblue;
    font-family: monospace;
    color: seashell;
    border: darkgray;
     	}



     </style>
	</head>
	<body>
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<div class="text-center">
                <div class="author-img" >
				<img  class="author-img"  src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" /></div>
				
				
				<h1 id="colorlib-logo"><a href="#"><?php echo  $name;?></a></h1>
				<h1 id="colorlib-logo"><a href="#">ID:<?php echo  $id;?></a></h1>
				<h1 id="colorlib-logo"><a href="#">Email:<?php echo  $email;?></a></h1>
				<h1 id="colorlib-logo"><a href="#">Phone:<?php echo  $ph;?></a></h1>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<div  class="collapse">
					<ul>
						<li ><a href="../index.php" >Home</a></li>
						<li><a href="#" >About</a></li>
						<li><a href="#" data-nav-section="services">Services</a></li>
						<li><a href="#" data-nav-section="skills">Skills</a></li>
						<li><a href="#" data-nav-section="education">Education</a></li>
					
						<li><a href="#" data-nav-section="contact">Contact</a></li>
					</ul>
				</div>
			</nav>

			<div class="colorlib-footer">
				<p><small>&copy; 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserve by <a href="" target="_blank">JNU Lancer</a>
               
			</div>

		</aside>

		<div id="colorlib-main">
			<section id="colorlib-hero" class="js-fullheight" data-section="home">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   
				   	

			<section class="colorlib-about" data-section="about">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12">
							<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="col-md-12">
									<div class="about-desc">
									
										
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
									<div class="services color-1">
										<span class="icon2"><i class="icon-bulb"></i></span>
										<h3>Graphic Design</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
									<div class="services color-2">
										<span class="icon2"><i class="icon-globe-outline"></i></span>
										<h3>Web Design</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInTop">
									<div class="services color-3">
										<span class="icon2"><i class="icon-data"></i></span>
										<h3>Software</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInBottom">
									<div class="services color-4">
										<span class="icon2"><i class="icon-phone3"></i></span>
										<h3>Application</h3>
									</div>
								</div>

								<BUTTON  class="apbtn" name="apply" onclick="apply()"> Not A Lancer ???  Apply</BUTTON>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			
		</div></section></ul></div></section></div></div></div>

         <script type="text/javascript">
         	function apply()
         	{
         		self.location = "../apply.php";
         	}
         </script>
			

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

