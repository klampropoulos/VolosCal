<?php
  ob_start();

  $timezone=date_default_timezone_set("Europe/Athens");

  $con=mysqli_connect("localhost","root","","calendar");


  if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();

  }



 ?>
