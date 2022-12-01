<!-- include connection -->
<?php
    include 'connect.php';
    
    $id=$_REQUEST['update'];
    $s="select * from user where id='$id'";
    $q=mysqli_query($con,$s);
    $fetch=mysqli_fetch_array($q);

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>

<!-- Data table -->
<body>
    <div align="center">
        <h1> USER DETAILS</h1>
    </div>
    <form method="post" action="#">
        <table border="1" cellspacing="0" align="center">


            <tr>
                <td> <b> Enter id</b> </td>
                <td>
                    <input type="text"  name="id"  value="<?php echo $fetch['id']?>">
                </td>
            </tr>
            <tr>
                <td> <b> City_id </b> </td>
                <td> <input type="text"  name="c_id"  value="<?php echo $fetch['c_id']?>"> </td>
            </tr>
            <tr>
                <td> <b> First Name </b> </td>
                <td> <input type="text" name="fname" id="fname" value="<?php echo $fetch['fname']?>"> </td>
            </tr>
            <tr>
                <td> <b> Last Name</b> </td>
                <td> <input type="text"  name="lname" id="lname"  value="<?php echo $fetch['lname']?>"></td>
            </tr>
            <tr>
                <td> <b> Email </b> </td>
                <td> <input type="email" name="email"  id="email" value="<?php echo $fetch['email']?>"> </td>
            </tr>
            <tr>
                <td> <b> Password </b> </td>
                <td> <input type="password"  name="password" id="password"  value="<?php echo $fetch['password']?>"> </td>
            </tr>

            <tr>
                <td> <b> Enter your Address </b> </td>
                <td> <input type="text"  name="address" id="address" value="<?php echo $fetch['address']?>"></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                <input class="submit" type="submit" name="update" value="update" id="update">
                </td>
            </tr>
        </table>
    </form>
  <!-- updation  -->
<?php
if(isset($_POST['update']))
 {
    $c_id=$_POST['c_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $query="update user set c_id='$c_id',fname='$fname',lname='$lname',email='$email',password='$password',address='$address' where id='$id'";
    $q1 = mysqli_query($con,$query);
}
    if($q1){
        // redirect to user page after updation
       header("location:user.php");
   }
   else{
      // echo "not okay";
   }
 
?>


</body>
</html>