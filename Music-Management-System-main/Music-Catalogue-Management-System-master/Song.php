<?php
$sid = $_POST['songID'];
$sname = $_POST['songName'];
$mid = $_POST['movieID'];
$singid = $_POST['singerID'];
$lyri = $_POST['lyricist'];
$mprod = $_POST['musicProducer'];
$mdist = $_POST['musicDistributer'];
$lang = $_POST['language'];
$genre = $_POST['genre'];

if (!empty($sname) || !empty($sid) || !empty($mid) || !empty($singid) || !empty($lyri) || !empty($mprod) || !empty($mdist) || !empty($lang) || !empty($genre)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT songName From songs Where songName = ? Limit 1";
     $INSERT = "INSERT Into songs (songID, songName, singerID, movieID, lyricist, musicProducer, musicDistributer, language, genre) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $sname);
     $stmt->execute();
     $stmt->bind_result($sname);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("isiisssss", $sid, $sname, $singid, $mid, $lyri, $mprod, $mdist, $lang, $genre);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("refresh:3; url=Song.html");

     } else {
      echo "Song already exists";
      header("refresh:3; url=Song.html");

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>