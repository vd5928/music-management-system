<?php
$mid = $_POST['movieID'];
$mname = $_POST['movieName'];
$dir = $_POST['director'];
$actor = $_POST['actor'];
$actress = $_POST['actress'];
$lang = $_POST['language'];

if (!empty($mname) || !empty($mid) || !empty($dir) || !empty($actor) || !empty($actress) || !empty($lang)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT movieName From movies Where movieName = ? Limit 1";
     $INSERT = "INSERT Into movies (movieName, movieID, director, actor,actress,language) values(?, ?, ?, ?, ?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $mid);
     $stmt->execute();
     $stmt->bind_result($mid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sissss", $mname, $mid, $dir, $actor, $actress,$lang);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("refresh:3; url=Movie.html");
     } else {
      echo "Movie already exists";
      header("refresh:3; url=Movie.html");
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>