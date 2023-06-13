<?php
$email = $_POST['email'];
$password = $_POST['password'];
$email = stripcslashes($email);
$password = stripcslashes($password);
$con =mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'musicdb');
$sql = ("select * from login where email='$email' and password = '$password'") or die("failed to query database" . mysqli_connect_error());
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if($row['email']==$email&&$row['password']==$password)
{
    if($row['userType']=='admin')
    {
        echo"login successful!!! welcome".$row['email'];
        header("refresh:3; url=Song.html");
    }
    else
    {
        echo"login successful!!! welcome".$row['email'];
        header("refresh:3; url=SongVTU.php");
    }

}
else {
echo "failed to login!";
header("refresh:3; url=Login.html");

}
?>