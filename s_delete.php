<?php
//include connection 
include("connect.php");
error_reporting(0);
$id=$_GET['id'];
$query="delete from state where id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
    //add loction to redirect to user page after delete 
    header("location:state.php");
    echo "<font color='green'> record deleted from database";
} 
else{
    echo"<font color='red'>record not deleted from database";
}
?>