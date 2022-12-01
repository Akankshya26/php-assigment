<!-- include connection page in city  -->
<?php
include 'connect.php';
include 'h1.php';
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>city module</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>
<!-- data table -->
<body>
    <div align="center">
        <h1> CITY DETAILS</h1>
    </div>
    <form method="POST" action="#">
        <table border="1" cellspacing="0" align="center">


            <tr>
                <td> <b> Enter id</b> </td>
                <td>
                    <input type="text"  name=id required/>
                </td>
            </tr>
            <tr>
                <td> <b> state_id </b> </td>
                <td> <input type="text"  name="s_id" required> </td>
            </tr>
            <tr>
                <td> <b> City Name </b> </td>
                <td> <input type="text"  name="cname" required> </td>
            </tr>
            <tr>
                <td> <b> Pincode </b> </td>
                <td> <input type="text"  name="pincode" required> </td>
            </tr>


            <tr>
                <td align="center" colspan="2">
                    <button type="submit" name="insert" value="insert">Insert</button>
                </td>
            </tr>
        </table>
    </form>
 <!-- insertion operation  -->
<?php
if(isset($_POST['insert']))
 {
    $s_id=$_POST['s_id'];
    $cname=$_POST['cname'];
    $pincode=$_POST['pincode'];
    // data insertion query
     $query="insert into city(s_id,cname,pincode)values('$s_id','$cname','$pincode')";
     if(mysqli_query($con,$query))
     {
        //echo "inserted successfully";
     }
     else{
        echo "not inserted";
     }
  
 }
?>

<table border="1">
<tr> 
    <th>id</th>
    <th>State_id</th>
    <th>City Name</th>
    <th>pincode</th>
    <th colspan="2">Action</th>
</tr>
<!-- fetch data table after insertion of data  -->

<?php
$fquery="select * from city";
$result=mysqli_query($con,$fquery);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
          echo "<td>";echo $row['id'];echo "</td>";
          echo "<td>";echo $row['s_id']; echo "</td>";
          echo "<td>";echo $row['cname']; echo "</td>";
          echo "<td>";echo $row['pincode']; echo "</td>";
           //  make the update botton as link
          echo "<td>";echo "<a href='c_update.php?update=".$row['id']."'>update</a>"; echo "</td>";
           //  make the delete botton as link
         echo "<td>";echo "<a href='c_delete.php?id=".$row['id']."'>Delete</a>"; echo "</td>";
          echo "</tr>";
}
}
?>
</table>
</body>

</html>