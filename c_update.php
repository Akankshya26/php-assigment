<?php
    include 'connect.php';
    $id=$_REQUEST['update'];
    $s="select * from city where id='$id'";
    $q=mysqli_query($con,$s);
    $fetch=mysqli_fetch_array($q);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>city module</title>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>

<body>
    <div align="center">
        <h1> CITY DETAILS</h1>
    </div>
    <form method="POST" >
        <table border="1" cellspacing="0" align="center">


            <tr>
                <td> <b> Enter id</b> </td>
                <td>
                    <input type="text"  name="id" value="<?php echo $fetch['id']?>" />
                </td>
            </tr>
            <tr>
                <td> <b> state_id </b> </td>
                <td> <input type="text"  name="s_id" value="<?php echo $fetch['s_id']?>"> </td>
            </tr>
            <tr>
                <td> <b> City Name </b> </td>
                <td> <input type="text"  name="cname" value="<?php echo $fetch['cname']?>"> </td>
            </tr>
            <tr>
                <td> <b> Pincode </b> </td>
                <td> <input type="text"  name="pincode" value="<?php echo $fetch['pincode']?>"> </td>
            </tr>


            <tr>
                <td align="center" colspan="2">
                <input class="submit" type="submit" name="update" value="update" id="update">
                </td>
            </tr>
        </table>
    </form>
   
<?php
if(isset($_POST['update']))
 {
    $id=$_POST['id'];
    $s_id=$_POST['s_id'];
    $cname=$_POST['cname'];
    $pincode=$_POST['pincode'];
     $query="update city set s_id='$s_id',cname='$cname',pincode='$pincode' where id='$id'";
     $q1 = mysqli_query($con,$query);
 }
     if($q1){
        header("location:city.php");
    }
    else{
       // echo "not okay";
    }
?>


</body>

</html>