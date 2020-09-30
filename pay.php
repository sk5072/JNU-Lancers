<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="npass.css">
</head>
<body onunload="pop2();">
<form action="allDis.php">
<div id="wrapper">
  <div class="row">
    <div class="col-xs-5">
      <div id="cards">
        <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Visa-icon.png">
        <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Master-Card-icon.png">
      </div><!--#cards end-->
      <div class="form-check">
  <!-- <label class="form-check-label" for='card'>
    <input id="card" class="form-check-input" type="checkbox" value=""> -->
     <p id="amt"></p>
     <script>document.getElementById("amt").innerHTML = "Proceed to pay $ "+ sessionStorage.getItem("payamt");</script>
    <!-- <?php echo "<font size='4.5em'>"." Proceed to Pay $ ".$_POST['payy']."</font>"; ?> -->
  </label>
</div>
    </div><!--col-xs-5 end-->
    <div class="col-xs-5">
      <div id="cards">
        <!-- <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Paypal-icon.png"> -->
      </div><!--#cards end-->
      <div class="form-check">
  <!-- <label class="form-check-label" for='paypal'>
    <input id="paypal" class="form-check-input" type="checkbox" value=""> -->
    
  </label>
</div>
    </div><!--col-xs-5 end-->
  </div><!--row end-->
  
  <div class="row">
    <div class="col-xs-5">
      <i class="fa fa fa-user"></i>
      <label for="cardholder">Cardholder's Name</label>
      <input type="text" id="cardholder" required>
    </div><!--col-xs-5-->
    <div class="col-xs-5">
      <i class="fa fa-credit-card-alt"></i>
      <label for="cardnumber">Card Number</label>
      <input type="number"  minlength="12" maxlength="12" id="cardnumber" min='0' required>
    </div><!--col-xs-5-->
  </div><!--row end-->
  <div class="row row-three">
    <div class="col-xs-2">
      <i class="fa fa-calendar"></i>
      <label for="date">Valid thru</label>
      <input type="text" placeholder="MM/YY" id="date" required>
    </div><!--col-xs-3-->
    <div class="col-xs-2">
      <i class="fa fa-lock"></i>
      <label for="date">CVV / CVC *</label>
      <input type="number"  minlength="3" maxlength="3" min='0' required>
    </div><!--col-xs-3-->
    <div class="col-xs-5">
      <span class="small">* CVV or CVC is the card security code, unique three digits number on the back of your card seperate from its number.</span>
    </div><!--col-xs-6 end-->
    


  </div><!--row end-->
  <footer>
    <button class="btn" onclick="pop()">Back</button>
    <button class="btn" typr="submit" >Confirm</buton>
  </footer>

</div>
</form>           <!--wrapper end-->
  <script type="text/javascript">
     function pop()
     {  alert(" THANKS  !!!! ");

         self.location = "allDis.php";
               
         
        // window.close('','_parent','');
        // window.open("http://localhost/example/listDis.php");
        // window.close('','npat.php','');
     }
      function pop2()
     {  alert(" Confirmation mail wil be send soon   !!!! ");
        self.location = "allDis.php";
        
     }
           

    </script>
</body>
</html>