<?php
$singname = $_POST['singerName'];
$singid = $_POST['singerID'];
$coun = $_POST['country'];
$dob = $_POST['DOB'];
$gender = $_POST['gender'];

if (!empty($singname) || !empty($singid) || !empty($coun) || !empty($dob) || !empty($gender)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT singerName From singers Where singerName = ? Limit 1";
     $INSERT = "INSERT Into singers (singerName, singerID, country, DOB,gender) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $singid);
     $stmt->execute();
     $stmt->bind_result($singid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sisss", $singname, $singid, $coun, $dob, $gender);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("refresh:3; url=Singer.html");

     } else {
      echo "Singer already exists";
      header("refresh:3; url=Singer.html");

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>