<?php
 $dbhost = 'localhost:3306';
 $dbuser = 'root';
 $dbpass = 'root';
 $conn = new mysqli($dbhost, $dbuser, $dbpass,"trialdb");

 $name=$_POST["name"];
 $uname=$_POST["uname"];
 $psw=$_POST["psw"];
 $rating=$_POST["rating"];
 $rev=$_POST["rev"];
 //echo "$name";

 $check1=false;
 $check2=false;
 $sql="select * from users where name='$uname' and pswd='$psw'";
 $res=$conn->query($sql);
 if($res->num_rows>0){
    $check1=true;
    $row=$res->fetch_assoc();
    $uid=$row["uid"];
 }
 
 $iid=null;
 echo "a";
 $sql1="select * from images where name='$name'";
 echo $name;
 $res1=$conn->query($sql1);
 echo "s";
 if($res1->num_rows>0){
    $row1=$res1->fetch_assoc();
    $iid=$row1["iid"];
    echo $iid;
    echo "s";
 }

 $sql3="select * from reviews where iid='$iid'";
 $res3=$conn->query($sql3);
 if($res3->num_rows>0){
    $check2=true;
 }
echo $check2;
 if($check1 && !$check2){
    $sql2="insert into reviews(uid,iid,text,rating) values('$uid','$iid','$rev','$rating')";
    if($conn->query($sql2) === TRUE){
        echo"
        <script>
            window.location.href='http://localhost/homepage.php';
            alert('Your review has been submitted successfully!');
        </script>";
    }
    else{
        echo"
        <script>
            
            alert('Could not submit this review. Please try again.');
        </script>";
    }

 }

 elseif($check2){
    echo"
    <script>
        window.location.href='http://localhost/homepage.php';
        alert('You have already reviewed this product.');
    </script>";
 }

 else{
    echo"
    <script>
        window.location.href='http://localhost/homepage.php';
        alert('The username or password is incorrect. Please try again.');
    </script>";
 }
 
 ?>