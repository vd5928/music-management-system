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
        $sql="UPDATE singers SET singerName='$_POST[singname]',country='$_POST[coun]',DOB='$_POST[dob]',Gender='$_POST[gender]' WHERE singerID='$_POST[singid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Updated');";
            echo "</script>";
            $url="SingerVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Update Error');";
            echo "</script>";      
            $url="SingerVT.php";
            echo "<script>location.href='$url'</script>";         }
    }
     else if ($_POST['action'] == 'Delete')
     {
        $sql="DELETE FROM singers WHERE singerID='$_POST[singid]'";
        if(mysqli_query($con,$sql))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Record Deleted');";
            echo "</script>";
            $url="SingerVT.php";
            echo "<script>location.href='$url'</script>";
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Delete Error');";
            echo "</script>";      
            $url="SingerVT.php";
            echo "<script>location.href='$url'</script>";   
                }
    } else {
        echo "Invalid";
        die();
    }
    
?>