<?php
    $con=mysqli_connect('127.0.0.1','root','');
    if(!$con){
        echo'Not connected to server';
    }
    if(!mysqli_select_db($con,'musicdb'))
    {
        echo'Data base not selected';
    }
    if ($_POST['action'] == 'Update')
     {
        //action for update here
        $sql="UPDATE songs SET songName='$_POST[sname]',singerID='$_POST[singid]',movieID='$_POST[mid]',
        lyricist='$_POST[lyri]',musicProducer='$_POST[mprod]',musicDistributer='$_POST[mdist]',
        language='$_POST[lang]',genre='$_POST[genre]' WHERE songID='$_POST[sid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Updated');";
            echo "</script>";
            $url="SongVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Update Error');";
            echo "</script>";      
            $url="SongVT.php";
            echo "<script>location.href='$url'</script>";         }
    }
     else if ($_POST['action'] == 'Delete')
     {
        $sql="DELETE FROM songs WHERE songID='$_POST[sid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Deleted');";
            echo "</script>";
            $url="SongVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Delete Error');";
            echo "</script>";      
            $url="SongVT.php";
            echo "<script>location.href='$url'</script>";   
                }
    } else {
        echo "Invalid";
        die();
    }
    
?>