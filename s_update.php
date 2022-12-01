<!-- include connection -->
<?php
    include 'connect.php';
    $id=$_REQUEST['update'];
    $s="select * from state where id='$id'";
    $q=mysqli_query($con,$s);
    $fetch=mysqli_fetch_array($q);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>state module</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>
<!-- data table -->
<body>
    <div class="main" align="center">
        <h1> STATE DETAILS</h1>
    </div>
    <form method="POST">
        <table border="1" cellspacing="0" align="center">
            <tr>
                <td> <b> state_id </b> </td>
                <td> <input type="text"  name="id" value="<?php echo $fetch['id']?>"> </td>
            </tr>
            <tr>
                <td> <b> State Name </b> </td>
                <td> <input type="text" name="sname" id="sname" value="<?php echo $fetch['sname']?>"> </td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input class="submit" type="submit" name="update" value="update" id="update">
                </td>
            </tr>
        </table>
    </form>

<!-- updation opertaion -->
<?php
if(isset($_POST['update']))
 {
    $id=$_POST['id'];
    $sname=$_POST['sname'];
     $query="update state set sname='$sname' where id=$id";
     $q123 = mysqli_query($con,$query);
            if($q123){
            // add location to redirect after update
                header("location:state.php");
            }
            else{
                echo "not okay"; 
            }
 }
?>


</body>

</html>