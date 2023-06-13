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
        $sql="UPDATE playlist SET playlistName='$_POST[pname]',songID='$_POST[sid]'  WHERE playlistID='$_POST[pid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Updated');";
            echo "</script>";
            $url="PlaylistVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Update Error');";
            echo "</script>";      
            $url="PlaylistVT.php";
            echo "<script>location.href='$url'</script>";         }
    }
     else if ($_POST['action'] == 'Delete')
     {
        $sql="DELETE FROM playlist WHERE playlistID='$_POST[pid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Deleted');";
            echo "</script>";
            $url="PlaylistVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Delete Error');";
            echo "</script>";      
            $url="PlaylistVT.php";
            echo "<script>location.href='$url'</script>";   
                }
    } else {
        echo "Invalid";
        die();
    }
    
?>