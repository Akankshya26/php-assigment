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
        <h1> USER DETAILS</h1></div>
        <!-- c_id validation -->
    <?php
    $c_idErr= "";  
    $c_id= "";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       
            if (empty($_POST["c_id"])) {  
                 $c_idErr = "input is required";  
            } else {  
                $c_id = input_data($_POST["c_id"]);  
                    // check that the c_id is well-formed 
                    if (!preg_match("/^[0-9]*$/",$c_id)) {  
                        $c_idErr = "Only numbers are allowed";  
                    }  
            } 
        } 
//  fname validation
    $fnameErr= "";  
    $fname = "";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       
            if (empty($_POST["fname"])) {  
                 $fnameErr = "input is required";  
            } else {  
                $fname = input_data($_POST["fname"]);  
                    //check that the first name is well-formed
                    if (!preg_match("/^[a-zA-Z]*$/",$fname)) {  
                        $fnameErr = "Only alphabates are allowed";  
                    }  
            } 
        } 
// lname validation
    $lnameErr= "";  
    $lname= "";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       
            if (empty($_POST["lname"])) {  
                 $lnameErr = "input is required";  
            } else {  
                $lname = input_data($_POST["lname"]);  
                    //check that the last name is well-formed   
                    if (!preg_match("/^[a-zA-Z]*$/",$lname)) {  
                        $fnameErr = "Only alphabates  are allowed";  
                    }  
            } 
        } 
    //email validation
     $emailErr= "";  
     $email= ""; 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
          } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            } 
        } 
     }  
    //password validation
     $passwordErr  = "";  
     $password = ""; 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        if (empty($_POST["password"])) {  
            $passwordErr = "input  is required";  
          } else {  
            $password= input_data($_POST["password"]);  
            // check that the password is well-formed  
             if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$password)) {
                $passwordErr = "Only alphabates and numbers  are allowed";  
            }
        }
     }  


    //validation fo address
    $addressErr  = "";  
    $address = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
       if (empty($_POST["address"])) {  
           $addressErr = "input  is required";  
         } else {  
           $password= input_data($_POST["address"]);  
           // check that the address is well-formed  
            if (!preg_match("/^[a-zA-Z0-9]*$/",$address)) {
               $addressErr = "Only alphabates and white space are allowed";  
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1" cellspacing="0" align="center">
            <!-- <tr>
                <td> <b> Enter id</b> </td>
                <td><input type="text"  name="id"  value="<?php echo $fetch['id']?>">

            </td>
            </tr> -->
            <tr>
                <td> <b> City_id </b> </td>
                <td> <input type="text"  name="c_id"  value="<?php echo $fetch['c_id']?>">
                <center> <span class="error" style="color:red";>* <?php echo $c_idErr;?></span></center>
            </td>
            </tr>
            <tr>
                <td> <b> First Name </b> </td>
                <td> <input type="text" name="fname" id="fname" value="<?php echo $fetch['fname']?>">
                <center> <span class="error" style="color:red";>* <?php echo $fnameErr;?> </span></center>
            </td>
            </tr>
            <tr>
                <td> <b> Last Name</b> </td>
                <td> <input type="text"  name="lname" id="lname"  value="<?php echo $fetch['lname']?>">
                <center> <span class="error" style="color:red";>* <?php echo $lnameErr;?> </span></center>
            </td>
            </tr>
            <tr>
                <td> <b> Email </b> </td>
                <td> <input type="email" name="email"  id="email" value="<?php echo $fetch['email']?>">
                <center> <span class="error" style="color:red";>* <?php echo $emailErr;?></span></center>
            </td>
            </tr>
            <tr>
                <td> <b> Password </b> </td>
                <td> <input type="password"  name="password" id="password"  value="<?php echo $fetch['password']?>">
                <center> <span class="error" style="color:red";>* <?php echo $passwordErr?></span></center>
            </td>
            </tr>

            <tr>
                <td> <b> Enter your Address </b> </td>
                <td> <input type="text"  name="address" id="address" value="<?php echo $fetch['address']?>">
                <center> <span class="error" style="color:red";>* <?php echo $addressErr;?></span></center>
            </td>
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
    if($c_idErr=="" && $fnameErr=="" && $lnameErr=="" && $emailErr=="" && $passwordErr==""  && $addressErr=="") {
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
}
 
?>


</body>
</html>