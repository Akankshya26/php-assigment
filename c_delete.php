<?php
include("connect.php");
error_reporting(0);
$id=$_GET['id'];
$query="delete from city where id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
    header("location:city.php");
    echo "<font color='green'> record deleted from database";
} 
else{
    echo"<font color='red'>record not deleted from database";
}
?>