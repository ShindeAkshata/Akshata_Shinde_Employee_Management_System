<?php
session_start();
if(isset($_SESSION["user"])){
  header("Location: employeepage.php");
}
?>
<html>
    <head>
        <title>Employee Management System</title>
    </head>
    <body>
        
        <h1 style=background-color:#BF94E4;><center>Employee Management System</center></h1>
        <IMG src="emp3.png" width="450px"height="200px">
        <IMG src="emp5.jpg" width="500px"height="200px">
        <IMG src="emp4.png" width="450px"height="200px">
          <table bgcolor=#B8E2F2 align=right border="1px">
            <tr>
              <td>
          <h2 align=right>Total No Of Employees</h2>
                <table align=right  cellspacing="5px" cellpadding=5px>
            <tr>
              <td>EmployeeNumber</td>
                        <td><input type="text" name="uid" value="200"></td>
                      </tr>
                </table>
                    </td>
                  </tr>
                </table>
                <table bgcolor=#B8E2F2 align=left border="1px">
                  <tr>
                    <td>
                <h2 align=left>Total No Of Departments</h2>
                      <table align=left  cellspacing="5px" cellpadding=5px>
                  <tr>
                    <td>Department Number</td>
                              <td><input type="text" name="uid" value="5"></td>
                            </tr>
                      </table>
                            </table>
                          </td>
                        </tr>
                      </table>
        
  
            <h2 style=background-color:#77C3EC;><center>Employee Login</center></h2>
    </body>
    <hr color="red">
    <body bgcolor=#FFC5CD>

    <?php
    if(isset($_POST["login"])){
      $email=$_POST["email"];
      $password=$_POST["password"];
      require_once"config.php";
      $sql="SELECT * FROM signupdata where email='$email'";
      $result=mysqli_query($conn,$sql);
      $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($user){
        if(password_verify($password,$user["password"])){
          session_start();
          $_SESSION["user"]="yes";
          header("Location: employeepage.php");
          die();
        }else{
          echo"<div class='alert alert-danger'>Password does not match</div>";
        }

      }else{
        echo"<div class='alert alert-danger'>EMail does not exists</div>";
      }
    }
?>
    <form action="employeelogin.php" method="post">
    <h2><center>Login First to save,update,Delete and Reset your Information</center></h2>
    
    <table bgcolor=#A9A9A9+ align=center border="1px">
      <tr>
        <td>
          <br><br>
              Email
              <input type="text" name="email" value=""><br><br>
          <br><br>
              Password
              <input type="password" name="password" value=""><br><br>
              <br><br>
              <input type="submit" name="login" value="Login"><br>
              <a href="signup.php"><h2>Click to Signup</h2></a><br>
  </td>
</tr>
</table>
    </form>
   <center><h3><li><a href="About.html">About Page</a></li></h3></center>
    </body>
</html>