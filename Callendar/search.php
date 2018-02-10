<?php
$con=mysqli_connect("localhost","root","","calendar");

mysqli_select_db($con,"calendar") or die("Could not find database!");

//Collect
$output='';

if(isset($_POST['search'])){
  $searchq=$_POST['search'];
  $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
  $query=mysqli_query($con,"SELECT * FROM events WHERE title LIKE '%$searchq%'") or die("could not search!");
  $count=mysqli_num_rows($query);
  if($count >0){
    while($row=mysqli_fetch_assoc($query)){
      $title=$row['title'];
      $start=$row['start'];
      $end=$row['end'];
      $color=$row['color'];
      $output .='<div> '.'Event :  '.$title.' '.$start.'  '.$end.'</div>';
    }

  }
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="css/bootstrap.min.css" rel="stylesheet">

 <style>
 body {
     font-family: Arial;
 }

 * {
     box-sizing: border-box;
 }

 .openBtn {
     background: #f1f1f1;
     border: none;
     padding: 10px 15px;
     font-size: 20px;
     cursor: pointer;
 }

 .openBtn:hover {
     background: #bbb;
 }

 .overlay {
     height: 100%;
     width: 100%;
     display: none;
     position: fixed;
     z-index: 1;
     top: 0;
     left: 0;
     background-color: rgb(0,0,0);
     background-color: rgba(0,0,0, 0.9);
 }

 .overlay-content {
     position: relative;
     top: 46%;
     width: 80%;
     text-align: center;
     margin-top: 30px;
     margin: auto;
 }

 .overlay .closebtn {
     position: absolute;
     top: 20px;
     right: 45px;
     font-size: 60px;
     cursor: pointer;
     color: white;
 }

 .overlay .closebtn:hover {
     color: #ccc;
 }

 .overlay input[type=text] {
     padding: 15px;
     font-size: 17px;
     border: none;
     float: left;
     width: 80%;
     background: white;
 }

 .overlay input[type=text]:hover {
     background: #f1f1f1;
 }

 .overlay button {
     float: left;
     width: 20%;
     padding: 15px;
     background: #ddd;
     font-size: 17px;
     border: none;
     cursor: pointer;
 }

 .overlay button:hover {
     background: #bbb;
 }
 </style>

 </head>
 <body>
   <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="index.php">Events</a>
   </div>
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav navbar-right">
       <li><a href="register.php">LOG IN/SIGN UP</a></li>

       <li><a href="info.php">INFO</a></li>

       <p></p>
     </ul>
   </div>
 </div>
</nav>
<p></p>
<li></li>
<p></p>
<div class="w3-container">
 <div id="myOverlay" class="overlay">
   <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
   <div class="overlay-content">
     <form action="search.php" method="post">
       <input type="text" placeholder="Search.." name="search">
       <button type="submit"><i class="fa fa-search"></i></button>
     </form>
   </div>
 </div>
</div>
 <h2>Event Search</h2>
 <p>Click on the button to open the search box.</p>
 <button class="openBtn" onclick="openSearch()">Open Search Box</button>
</div>
 <script>
 function openSearch() {
     document.getElementById("myOverlay").style.display = "block";
 }

 function closeSearch() {
     document.getElementById("myOverlay").style.display = "none";
 }
 </script>
 <div class="mx-auto" style="width: 200px;">

  <?php print("$output"); ?>
</div>



   </body>
 </html>
