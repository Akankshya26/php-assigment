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
    <?php
    $snameErr  = "";  
    $sname  = "";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       
        //String Validation  
            if (empty($_POST["sname"])) {  
                 $snameErr = "Name is required";  
            } else {  
                $sname = input_data($_POST["sname"]);  
                    // check if name only contains letters and whitespace  
                    if (!preg_match("/^[a-zA-Z ]*$/",$sname)) {  
                        $snameErr = "Only alphabets and white space are allowed";  
                    }  
            } 
        } 
        function input_data($data) {  
            $data = trim($data);  
            $data = stripslashes($data);  
            $data = htmlspecialchars($data);  
          return $data;  
        }    
        ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table border="1" cellspacing="0" align="center">
            <tr>
                <td> <b> state_id </b> </td>
                <td> <input type="text"  name="id" value="<?php echo $fetch['id']?>"> </td>
            </tr>
            <tr>
                <td> <b> State Name </b> </td>
                <td> <input type="text" name="sname" id="sname" value="<?php echo $fetch['sname']?>">  <center> <span class="error" style="color:red";>* <?php echo $snameErr; ?> </span></center></td>
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
    if($snameErr == "" ) {  
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
}
?>


</body>

</html>