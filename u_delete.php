<?php
include 'connect.php';
error_reporting(0);
$id=$_GET['id'];
$query="delete from user where id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
    // redirect to user pade after updation
    header("location:user.php");
    echo "<font color='green'> record deleted from database";
} 
else{
    echo"<font color='red'>record not deleted from database";
}
?>