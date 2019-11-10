<?php
 $dbhost = 'localhost:3306';
 $dbuser = 'root';
 $dbpass = 'root';
 $conn = new mysqli($dbhost, $dbuser, $dbpass,"trialdb");

 $flag=false;
$name=$_POST["uname"];
$psw=$_POST["psw"];
$rpsw=$_POST["rpsw"];
$check="select * from users where name='$name'";
$res=$conn->query($check);
if($res->num_rows>0){
    $row = $res->fetch_assoc();
    $flag=true;
    echo "
    <script>
     window.location.href='http://localhost/fp1.php';
     alert('This username is already present');
     </script>";
}
elseif( !$flag && ($psw!=" " || $psw!="") && $psw==$rpsw ){
$sql="insert into users(name,pswd) values('$name','$psw')";

 if( $conn->query($sql) === TRUE){
   echo"
    <script>
        window.location.href='http://localhost/homepage.php';
        alert('You have been registered successfully!');
    </script>";
}
}else{
    echo"
    <script>
        window.location.href='http://localhost/fp1.php';
        alert('Could not register. Please try again.');
    </script>";
}

?>