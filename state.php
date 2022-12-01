<!-- include connection in state module -->
<?php
include 'connect.php';
include 'h1.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>state module</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>


<body>
    <div class="main" align="center">
        <h1> STATE DETAILS</h1>
    </div>
    <form method="POST">
        <table border="1" cellspacing="0" align="center">
            <tr>
                <td> <b> State Name </b> </td>
                <td> <input type="text" name="sname" required> </td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <button type="submit" value="insert" name="insert">Insert</button>
                </td>
            </tr>
        </table>
     
      
    </form>

<!-- insertion query -->
<?php
if(isset($_POST['insert']))
 {
     $sname=$_POST['sname'];
     $query="insert into state(sname)values('$sname')";
     if(mysqli_query($con,$query))
     {
        //echo "inserted succesfully";
     }
    
 }
?>
<!-- data fetch table -->
<table border="1">
<tr> 
    <th>State_id</th>
    <th>State Name</th>
    <th colspan="2">Action</th>
</tr>

<?php
$fquery="select * from state";
$result=mysqli_query($con,$fquery);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
          echo "<tr>";
          echo "<td>";echo $row['id'];echo "</td>";
          echo "<td>";echo $row['sname']; echo "</td>";
        //  make the update botton as link
          echo "<td>";echo "<a href='s_update.php?update=".$row['id']."'>Update</a>"; echo "</td>";
           //  make the delete botton as link
          echo "<td>";echo "<a href='s_delete.php?id=".$row['id']."'>Delete</a>"; echo "</td>";
          echo "</tr>";
    }
    
}
?>
</table>
</body>

</html>