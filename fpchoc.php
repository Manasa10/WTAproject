<?php
   session_start();
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = new mysqli($dbhost, $dbuser, $dbpass,"trialdb");
?>
<!DOCTYPE html>
<html lang="en">
<title>MD Reviews</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3fullcss.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
.w3-padding-321{padding-top:10px !important;padding-bottom:10px !important}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #f2e6ff;
  color: black;
  padding: 5px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.signupbtn{
  background-color: #f2e6ff;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #000080;
  color:white;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #000000;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;background-color: #f2e6ff" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>MD Reviews</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="homepage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="fpchoc.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Desserts</a> 
    <a href="fpclothes.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Clothes</a> 
    <a href="fpwatches.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Watches</a> 
    <button class="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content w3-animate-zoom" action="fp3.php" method="POST">
    <div class="container ">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="uname"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="rpsw"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="rpsw" required>
      
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn signupbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>MD reviews</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>The Chocolate Factory</b></h1>
    <h1 class="w3-xxxlarge " style="color:#330066"><b>Showcase.</b></h1>
    <hr style="width:50px;border:5px solid 	 #f2e6ff" class="w3-round">
  </div>

           <!-- Photo grid (modal) -->
  <div class="w3-row-padding">
  <?php
   $res = $conn->query("SELECT * FROM images where cid=1");
   $numr=$res->num_rows;
   if ($res->num_rows > 0) {
      // output data of each row
      $c=($numr/2);
     ?>
      <div class="w3-half">
        <?php
        for($j=0;$j<$c;$j++){
          $row = $res->fetch_assoc();
        ?>
        <form action="fp2.php" method="POST">
          <input type="image" src=<?php echo $row["src"]; ?> style="width:100%" onclick="onClick(this)" alt=<?php echo $row["altname"]; ?> name=<?php echo $row["name"]; ?>>
          <input type="hidden" value=<?php echo $row["src"]; ?> name="src" >
        </form>
        <?php
        }
        ?>
        </div>
        <div class="w3-half">
        <?php
        for($j=$c;$j<$numr;$j++){
          $row = $res->fetch_assoc()
        ?>
        <form action="fp2.php" method="POST">
          <input type="image" src=<?php echo $row["src"]; ?> style="width:100%" onclick="onClick(this)" alt=<?php echo $row["altname"]; ?> name=<?php echo $row["name"]; ?>>
         <input type="hidden" value=<?php echo $row["src"]; ?> name="src" >
        </form>
      <?php 
      }
      ?>
      </div>
      <?php 
     } else {
      echo "0 results";
   }
   //If connection cannot be made
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
      echo 'true';
    }
    $conn->close();
   ?>
   </div>
 

  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge" style="color:#330066"><b>About Us.</b></h1>
    <hr style="width:50px;border:5px solid #f2e6ff" class="w3-round">
    <p>We carefully select our ingredients for their freshness, flavor and natural value. We choose organic, locally grown products when available. 
      Everything we make embodies our commitment to consistency and excellence. </p>
    <p>Whether you are searching for a special birthday cake, or simply looking for a sweet ending to an everyday meal, 
        The Chocolate Factory is sure to have something freshly baked to suit your mood. We are proud to offer a wide variety of freshly baked goods
       daily, including gourmet cookies, fresh apple cake, cheesecake slices, chocolate eclairs, strawberry torte, pound cake, lemon bars,
       decadent brownies, shortbread, and over 20 flavors of cupcakes that no one can resist.
    </p>
  </div>
  
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-container w3-padding-32" style="margin-top:75px;padding-right:58px;background-color: #e6ccff"><p class="w3-right">Powered by MD</p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
