<?php
$sl = $_POST['slno'];
$sid = $_POST['songID'];

if (!empty($sl) || !empty($sid)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT slno,songID From trending Where slno= ?  And songID=? Limit 1";
     $INSERT = "INSERT Into trending (slno,songID) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("is", $sl,$sid);
     $stmt->execute();
     $stmt->bind_result($sl,$sid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ii", $sl,$sid);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("refresh:3; url=Trending.html");

     } else {
      echo "Song already exists";
      header("refresh:3; url=Trending.html");

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>