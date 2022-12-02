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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- table -->

        <table border="1" cellspacing="0" align="center">
            <tr>
                <td> <b> City_id </b> </td>
                <td> <input type="text"  name="c_id"><center> <span class="error" style="color:red";>* <?php echo $c_idErr;?></span></center>  </td>
            </tr>
            <tr>
                <td> <b> First Name </b> </td>
                <td> <input type="text"  name="fname"> <center> <span class="error" style="color:red";>* <?php echo $fnameErr;?> </span></center></td>
            </tr>
            <tr>
                <td> <b> Last Name</b> </td>
                <td> <input type="text"  name="lname"> <center> <span class="error" style="color:red";>* <?php echo $lnameErr;?> </span></center></td>
            </tr>
            <tr>
                <td> <b> Email </b> </td>
                <td> <input type="email"  name="email"> <center> <span class="error" style="color:red";>* <?php echo $emailErr;?></span></center></td>
            </tr>
            <tr>
                <td> <b> Password </b> </td>
                <td> <input type="password" name="password">  <center> <span class="error" style="color:red";>* <?php echo $passwordErr?></span></center> </td>
            </tr>

            <tr>
                <td> <b> Enter your Address </b> </td>
                <td> <input type="text" name="address"><center> <span class="error" style="color:red";>* <?php echo $addressErr;?></span></center></td>
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
    if($c_idErr=="" && $fnameErr=="" && $lnameErr=="" && $emailErr=="" && $passwordErr==""  && $addressErr=="") {
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
          echo "<td>";echo "<a href='u_update.php?update=".$row['id']."'>Update</a>"; echo "</td>";
           //  make the delete botton as link
          echo "<td>";echo "<a href='u_delete.php?id=".$row['id']."'>Delete</a>"; echo "</td>";
        echo "</tr>";
}
}
?>
</table>
</body>
</html>
