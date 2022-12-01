<!-- include connection file  -->
<?php
include 'connect.php';
include 'h1.php';
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <!-- include stylesheet page -->
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>


<body>
    <div align="center">
        <h1> USER DETAILS</h1>
    </div>
    <form method="POST"  action="#">
        <!-- table -->
        <table border="1" cellspacing="0" align="center">
            <tr>
                <td> <b> City_id </b> </td>
                <td> <input type="text"  name="c_id" required > </td>
            </tr>
            <tr>
                <td> <b> First Name </b> </td>
                <td> <input type="text"  name="fname" required> </td>
            </tr>
            <tr>
                <td> <b> Last Name</b> </td>
                <td> <input type="text"  name="lname" required></td>
            </tr>
            <tr>
                <td> <b> Email </b> </td>
                <td> <input type="email"  name="email" required> </td>
            </tr>
            <tr>
                <td> <b> Password </b> </td>
                <td> <input type="password"  name="password" required> </td>
            </tr>

            <tr>
                <td> <b> Enter your Address </b> </td>
                <td> <input type="text" name="address"  required></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <button type="submit" name="insert" value="insert">Insert</button>
                </td>
            </tr>
        </table>
    </form>
<!-- insertion of data -->
<?php
if(isset($_POST['insert']))
 {
    $c_id=$_POST['c_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
     $query="insert into user(c_id,fname,lname,email,password,address)values('$c_id','$fname','$lname','$email', '$password','$address')";
     if(mysqli_query($con,$query))
     {
        //echo "inserted successfully";
     }
     else{
        echo "not inserted";
     }
 }
 

?>
<!-- data fetch table -->
<table border="1">
<tr> 
    <th>id</th>
    <th>city_id</th>
    <th>First Name</th>
    <th>last Name</th>
    <th>email</th>
    <th>password</th>
    <th>address</th>
    <th colspan="2">Action</th>
</tr>

<?php
$fquery="select * from user";
$result=mysqli_query($con,$fquery);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
          echo "<td>";echo $row['id'];echo "</td>";
          echo "<td>";echo $row['c_id']; echo "</td>";
          echo "<td>";echo $row['fname']; echo "</td>";
          echo "<td>";echo $row['lname']; echo "</td>";
          echo "<td>";echo $row['email']; echo "</td>";
          echo "<td>";echo $row['password']; echo "</td>";
          echo "<td>";echo $row['address']; echo "</td>";
           //  make the update botton as link
          echo "<td>";echo "<a href='u_update.php?update=".$row['id']."'>update</a>"; echo "</td>";
           //  make the delete botton as link
          echo "<td>";echo "<a href='u_delete.php?id=".$row['id']."'>Delete</a>"; echo "</td>";
       echo "</tr>";
}
}
?>
</table>
</body>
</html>
