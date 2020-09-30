<?php
session_start();
echo "error in ur id ";
printf("error in id ");

echo "<script type='text/javascript'> alert('invalid ID or Password') </script>";
header( "refresh:3;url=login.php" );


exit;
?>