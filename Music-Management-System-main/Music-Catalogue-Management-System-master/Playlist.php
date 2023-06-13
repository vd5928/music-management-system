<?php
$pname = $_POST['playlistName'];
$pid = $_POST['playlistID'];
$sid = $_POST['songID'];


if (!empty($pname) || !empty($pid) || !empty($sid)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "musicdb";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT songID From playlist Where songID = ? Limit 1";
     $INSERT = "INSERT Into playlist (playlistName, playlistID, songID) values(?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $sid);
     $stmt->execute();
     $stmt->bind_result($sid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sii", $pname, $pid, $sid);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("refresh:3; url=Playlist.html");

     } else {
      echo "Song already exists in playlist";
      header("refresh:3; url=Playlist.html");

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>