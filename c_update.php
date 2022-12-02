<!-- include connection  -->
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
<!-- data table -->
<body>
    <div align="center">
        <h1> CITY DETAILS</h1>
    </div>
    <?php
    $s_idErr  = "";  
    $s_id = "";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       
        //s_id validation
            if (empty($_POST["s_id"])) {  
                 $s_idErr = "input is required";  
            } else {  
                $s_id = input_data($_POST["s_id"]);  
                    // check if name only contains letters and whitespace  
                    if (!preg_match("/^[0-9 ]*$/",$s_id)) {  
                        $s_idErr = "Only numbers and white space are allowed";  
                    }  
            } 
        } 
        //city name validation
        $cnameErr  = "";  
        $cname= "";  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       

                if (empty($_POST["cname"])) {  
                     $cnameErr = "input is required";  
                } else {  
                    $cname = input_data($_POST["cname"]);  
                        // check if name only contains letters and whitespace  
                        if (!preg_match("/^[a-zA-Z ]*$/",$cname)) {  
                            $cnameErr = "Only alphabets and white space are allowed";  
                        }  
                } 
            } 
            //pincode validation
            $pincodeErr  = "";  
            $pincode= "";  
            if ($_SERVER["REQUEST_METHOD"] == "POST") {  
           
    
                    if (empty($_POST["pincode"])) {  
                         $pincodeErr = "input is required";  
                    } else {  
                        $pincode = input_data($_POST["pincode"]);  
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[0-9 ]*$/",$pincode)) {  
                                $pincodeErr = "Only Numbers and white space are allowed";  
                            }  
                    } 
                } 

        
    function input_data($data){
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
          return $data;  
        }          
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table border="1" cellspacing="0" align="center">

<!-- 
            <tr>
                <td> <b> Enter id</b> </td>
                <td>
                    <input type="text"  name="id" value="<?php echo $fetch['id']?>" />
                </td>
            </tr>
            <tr> -->
                <td> <b> state_id </b> </td>
                <td> <input type="text"  name="s_id" value="<?php echo $fetch['s_id']?>">
                <center> <span class="error" style="color:red";>* <?php echo $s_idErr; ?> </span></center>
            </td>
            </tr>
            <tr>
                <td> <b> City Name </b> </td>
                <td> <input type="text"  name="cname" value="<?php echo $fetch['cname']?>">
                <center> <span class="error" style="color:red";>* <?php echo $cnameErr; ?> </span></center>
             </td>
            </tr>
            <tr>
                <td> <b> Pincode </b> </td>
                <td> <input type="text"  name="pincode" value="<?php echo $fetch['pincode']?>">
                 <center> <span class="error" style="color:red";>* <?php echo $pincodeErr; ?> </span></center>
             </td>
            </tr>


            <tr>
                <td align="center" colspan="2">
                <input class="submit" type="submit" name="update" value="update" id="update">
                </td>
            </tr>
        </table>
    </form>
   <!-- updation operation -->
<?php
if(isset($_POST['update']))
 {
    if($s_idErr =="" &&  $cnameErr==""  &&  $pincodeErr=="" ){
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
}
?>


</body>

</html>