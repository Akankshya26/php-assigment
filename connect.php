<!-- established connection between server and database -->
<?php
$con= mysqli_connect("localhost" , "root" , "" ,"task");
if(!$con)
{
    $q=mysqli_error($con);
    echo"error in connection." .$q;
}
else

  //echo"connection succesfull.";
    ?>
