<?php
session_start();
if(isset($_SESSION["user"])){
  header("Location: employeepage.php");
}
?>

<!Doctype html>
    <head>
        <title>Sign Up</title>
    </head>
    <body bgcolor=#A8F7AB>
        <h2><center>Sign Up</center></h2>
      <table bgcolor=#FF9A98 align=center border="1px">
        <tr>
            <td>
              <?php
              if(isset($_POST["signup"])){
                $employeename=$_POST["employeename"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $confirmpassword=$_POST["confirmpassword"];
                $passwordHash= password_hash($password,PASSWORD_DEFAULT);
                $errors=array();
                if(empty($employeename)OR empty($email) OR empty($password) OR empty($confirmpassword)){
                  array_push($errors,"all fields are required");

                }
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                  array_push($errors,"Email is not valid");
                }
                if(strlen($password)<8){
                  array_push($errors,"password must be at least 8 characters long");
                }
                if($password!==$confirmpassword){
                  array_push($errors,"Password does not match");
                }

                require_once"config.php";
                $sql="SELECT * FROM signupdata where email='$email'";
                $result=mysqli_query($conn,$sql);
                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){
                  array_push($errors,"Email already exists!");
                }
                if(count($errors)>0){
                  foreach($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                  }
                }else{
                  
                  $sql="INSERT INTO signupdata(employeename,email,password) VALUES(?,?,?)";
                  $stmt= mysqli_stmt_init($conn);
                  $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                  if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"sss",$employeename,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                  }else{
                    die("something went wrong");
                  }
                }
               }
              ?>
      
        <form name="signup.php" action="" method="post"><br><br>
            <label for="employeename">EmployeeName</label>
                <input type="text" name="employeename" value=""><br>
                <br><br>
                
                  <label for="email">Email</label>
                  <input type="text" name="email" value=""><br>
                  <br><br>
                
                <label for="password">Password</label>
                  <input type="password" name="password" value=""><br>
                  <br><br>
                
                  <label for="password">Confirm Password</label>
                  <input type="password" name="confirmpassword" value=""><br>
                  <br><br>
              </td>
            </tr>
        </table><br><br>
        <center><button type="submit" name="signup">SignUp</button></center><br><br>
        <p><center><h2>After Signup Please Login to enter the EmployeePage</h2></center></p><br><br>
        <center><a href="employeelogin.php"><h2>Login</h2></a><br><br></center>
</form>
<br>
    </body>
</html>