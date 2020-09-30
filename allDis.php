<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hire </title>
<link href="provider.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="search.css">


<style>



 .h2
{
  text-align: center;
  top: 340px;
  left:120px;
  color: #7b68ee;
  font-family: Trebuchet MS, sans-serif;
  font-size: 3.5em;

} 
 .mdiv{
  position: relative;
  margin-left: 120px;
  margin-top: 20px;
  
 } 
.card {
  
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: 30px;
  height: auto;
  text-align: center;
  font-family: arial;
  left:135px;
  float: left;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 15px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  bottom: 0px;
}
.card img{
  width:100%;
  height: 260px;
}
.card button:hover {
  opacity: 0.7;
}
</style>

</head>
<body >

 
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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profileView\profileView.php">View  Profile</a>
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
    <form action="searchDis.php" method="post">
    <div class="wrap">
   <div class="search">
      <input type="text" name="searchText" class="searchTerm" placeholder="What are you looking for? Specify category ">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>
<br><br><br><br>
  <p align ="center" class='h2' >Providers</p>
 <?php
   include("config.php");
   $i=1;
   $sqlget="select * from providers ";
   $data= mysqli_query($db,$sqlget) or die('error ->'); 
   $_SESSION['payy']=0;
        // echo  '<div class= "mdiv">';
      while($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
         echo'<div class="card" id="$i">';
        $id=$row['proid'];
        $query1 = "SELECT * FROM tbl_images where id='$id'";  
        $res1 = mysqli_query($db, $query1);  
        $row1 = mysqli_fetch_array($res1) ;
        $c1 = mysqli_num_rows($res1);
        if($c1==1)
        {
          $image_data =$row1['name']; 
          
          echo '<img    src="data:image/jpeg;base64,'.base64_encode( $image_data ).'/>'; 
          
         }
         else
         {
          $filepath= 'images/blog.png';
          echo '<img src="'.$filepath.'"">';
         }
          echo "<p>";
          echo " Category: ";
          echo  $row['category']; echo "</br>";
          echo  "$ ".$row['price'];echo "</br>";
          echo "  ID : ";
          echo $row['proid'];echo "<br>";echo " Name : ";
          echo $row['proname'];echo "<br>";echo " Submissions Done: ";
          echo "<span class='badge badge-primary'>".''.$row['count']."</span>";echo "&nbsp;&nbsp;";
          echo "<br>";
          echo  "Sample Link : ".$row['pros'];echo "<br>";echo "</p>";
          $cc=$row['price'];
          
          
          echo '<button type ="button" class="open-button" onclick="Setc('.$row["price"].')">Check-Out</button>';
        
          echo '</div>';
          $i++;
          
         }

         // echo '<script type="text/javascript"> function Setc(cc){ var payy = cc;"<%Session["payy"] = "" + payy + ""; %>';
         // echo "alert('<%=Session['payy'] %>');}";
         // echo '</script>'; // on clic  value="'.$cc.'" onclick="Setc('.$row["price"].')"

         echo '</div>';
   ?>
      
      <p id= "neww"></p>
      
    <script type="text/javascript">
    function Setc(cc)
     {  
        var newValue= cc;
        sessionStorage.setItem("payamt",cc);

        console.log(sessionStorage.getItem("payamt"));
          self.location = "pay.php";
                
        
          
       
       }
</script>

</body>
</html>
