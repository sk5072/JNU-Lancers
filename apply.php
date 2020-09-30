
<?php
        session_start();
    include ("config.php");
    
   
    if(isset($_POST['id']) )
    {
      $id = mysqli_real_escape_string($db,$_POST['id']); 
      $user = mysqli_real_escape_string($db,$_POST['name']);
      $pro = mysqli_real_escape_string($db,$_POST['pros']); 
      $cat = mysqli_real_escape_string($db,$_POST['cat']); 
      $price = mysqli_real_escape_string($db,$_POST['price']);
      
      printf($id);

      $sql = "INSERT INTO providers (proid,proname,category,count,pros,price) VALUES ('$id','$user', '$cat','0', '$pro','$price')";
      //$result = mysqli_query($db,$sql);
       $result = mysqli_query($db,$sql);
      if (!$result) {
         
        printf("Error: %s\n", mysqli_error($db));
        header("location: error.php");
        header( "refresh:3;url=apply.php" );
        
        exit();
        }
        else
        {
            echo '<script>alert("ADDED SUCCESSFULLY")</script>' ; 
      header("refresh:3,url=allDis.php");      
        }
      
    
      
   }
 ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <title>Apply</title>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link rel="stylesheet" href="applyform.css" >
        <!-- <script src="form.js"></script> -->
    </head>
    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="container">
                <div class="form-container z-depth-5">
                    <h3>Apply Form</h3> 
                    <div class="row">
                        <form  method="post" class="col s12" id="reused_form"  >
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" name="name" required class="validate">
                                    <label for="name">UserName</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="id" type="text" name="id" required class="validate">
                                    <label for="id">ID</label>

                                </div>
                            </div>
                            <div class="row">
                            <div class="input-field col s12">
                                    <input id="cat" type="text" name="cat" required class="validate">
                                    <label for="category">category</label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="input-field col s12">
                                    <input id="pros" type="text" name="pros" required class="validate">
                                    <label for="pros">Link for sample project </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="input-field col s12">
                                    <input id="pric" type="text" name="price" required class="validate">
                                    <label for="pric">Enter your charges $ :  </label>
                                </div>
                            </div>
                         
                            <div>
                                <button class="waves-effect waves-light btn submitbtn" type="submit">Apply</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        </div>
    </body>
</html>