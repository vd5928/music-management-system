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
        $sql="UPDATE trending SET songID='$_POST[sid]' WHERE slno='$_POST[slno]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Updated');";
            echo "</script>";
            $url="TrendingVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Update Error');";
            echo "</script>";      
            $url="TrendingVT.php";
            echo "<script>location.href='$url'</script>";  
        }
    }  
    
?>