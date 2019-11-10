<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
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
</style><?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = new mysqli($dbhost, $dbuser, $dbpass,"trialdb");
$check="false";
$src=$_POST["src"];

$sql="select * from images where src='$src'";
$res = $conn->query($sql);
if($res->num_rows > 0)
$check="TRUE";


$row = $res->fetch_assoc();

if($row["cid"]==1){
$back="fpchoc.php";
}
elseif($row["cid"]==2){
    $back="fpclothes.php";
}
else{
    $back="fpwatches.php";
}


$name = $row["name"];
$altname = $row["altname"];
$iid = $row["iid"];
$sql1 = "select * from reviews where iid='$iid'";
$res1 = $conn->query($sql1);
?>
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
</style>
<!-- Modal for full size images on click-->

<div id="modal01" class="w3-black" style="padding-top:0">
    <a href=<?php echo $back; ?>><span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span></a>
    <div class="w3-modal-content w3-center w3-transparent w3-padding-64">
    <div class="w3-animate-zoom">
      <img id="img01" class="w3-image" src=<?php echo $src; ?> >
    
      <p id="caption"><?php echo $name; ?></p>
      
      <?php
        if($res1->num_rows > 0){
        while($row1 = $res1->fetch_assoc()){
            $uid= $row1["uid"];
            $sql2 = "select name from users where uid='$uid'";
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_assoc();
            $username=$row2["name"];
        ?>
        <div class="w3-container w3-padding-321" style="margin-top:30px;padding-right:200px;background-color: #f0f0f5; text-align: left">
            <p id="name" style="font-size: 22px;color: #330066;"><?php echo $username; ?>'s rating: <span><?php echo $row1["rating"]; ?></span></p>
            <p id="desc1" style="font-size: 18px;color: #330066;"><?php echo $row1["text"]; ?></p>
        </div>
        <?php
        }
        }
    
        else{
        ?>
        
        <div class="w3-container w3-padding-321" style="margin-top:30px;padding-right:200px;background-color: #f0f0f5; text-align: left">
            <p id="desc1" style="font-size: 18px;color: #330066;">Be the first to write a review...</p>
        </div>
        <?php
        }
        ?>
        <br><br>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Review this product</button>
        </div>
    </div>
  </div>

  <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="fp4.php" method="POST">
    <div class="container">
      <h1>Review <?php echo "$name";?></h1>
      <p>Please fill in this form to submit your feedback.</p>
      <hr>
      <label for="email"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="rating"><b>Overall Rating between 1 and 5:&nbsp</b></label>
      <input type="number" name="rating" required min=1 max=5>
        <br><br>
      <label for="rev"><b>Description</b></label>
      <input type="text" placeholder="Enter your description of the product here..." name="rev">
      <input type="hidden" value=<?php echo "$name"; ?> name="name" >
       <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn signupbtn">Cancel</button>
        <button type="submit" class="signupbtn">Submit</button>
<br><br><br>
        <h6>If you haven't registered yet, please register by clicking on the sign up button on the home page.</h6>
      </div>
    </div>
  </form>
</div>

  <script>
// Get the modal
var modal = document.getElementById('id01');
var modal1 = document.getElementById('modal01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
window.onclick = function(event) {
  if (event.target == modal1) {
    modal.style.display = "none";
  }
}

</script>