ll<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$con = $_POST['country'];
$dob = $_POST['DOB'];
$gender = $_POST['gender'];
$ut = "user";
$sp=$_POST['subscriptionPeriod'];

if (!empty($fname) || !empty($lname) || !empty($email) || !empty($pass) || !empty($con) || !empty($dob) || !empty($gender) || !empty($ut) || !empty($sp)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From login Where email = ? Limit 1";
     $INSERT = "INSERT Into login (Fname,Lname,email,password,DOB,country,gender,userType,subscriptionPeriod) values(?, ?, ?, ?, ?,?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssi", $fname,$lname,$email,$pass,$dob, $con , $gender,$ut,$sp);
      $stmt->execute();
      echo "Account Created";
      $subcostproc="CALL calsubc('$sp','$email');";                           
      $recod=mysqli_query($conn,$subcostproc);
      header("refresh:3; url=payment.php");

     } else {
      echo "Email already exist";
      header("refresh:3; url=SignUp.html");

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
