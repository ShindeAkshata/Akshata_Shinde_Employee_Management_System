<?php
@include 'config.php';
$con=mysqli_connect("localhost","root","","emplogin");
?>
<html>
    <head>
        <title>Employee Information</title>
    </head>
    <body bgcolor=#A8F7AB>
    <h3><li><a href="leaveform.html">Leave Application</a></li></h3>
           <h3><li><a href="feedbackform.html">Feedback Form</a></li></h3>
           <div style='text-align:right'> <h2><li><a href="logout.php">Logout</a></li></h2></div>
      <IMG src="emplogo.png" align=right width="300px"height="170px">
      <table bgcolor=#FF9A98 align=right border="1px">
        <tr>
            <td>
          <h1><center>Search Employee Information</center></h1>
          <table align='right' cellspacing="20px" cellpadding=20px>
      <tr>
        <td>
      <div class="search">
        <form action="" method="post">
            <td><input type="text" placeholder=" Search employee by ID" name="search"></td>
                <table align=right cellspacing="20px" cellpadding=20px>
                  <tr>
                      <td><input type="submit" name="submit3" value="Search"></td>
                  </tr>
                </table>
    </div>
  </td>
</tr>
</table>
            </td>
        </tr>
      </table>
    <table align='right' cellspacing="30px" cellpadding=30px>
    <div class="content">
      <h1 align='right' style="color:green; padding-top:40px;">
      </h1>
       
    </div>
    </table>
        </td>
      </tr>
    </table>
        <h1><center>Employee Information</center></h1>
        <br><br>
        <table bgcolor=orange align=left border="1px">
            <tr>
                <td>
              <table align='left' cellspacing="10px" cellpadding=10px>
                    Gender : 
                    Male<input type="radio" name="gender" value="Male"> 
                    Female<input type="radio" name="gender" value="Female">
                    Other<input type="radio" name="gender" value="Other">
                     <br>
                <tr>
                  <td>EmployeeName</td>
                  <td><input type="text" name="employeename" ></td>
                </tr>
                <tr>
                  <td>Department</td>
                  <td><input type="text" name="department" value=""></td>
                </tr>
                <tr>
                    <td>Designition</td>
                  <td><input type="text" name="designition" value=""></td>
                </tr>
                <tr>
                    <td>MobileNumber</td>
                    <td><input type="text" name="mobilenumber" value=""></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value=""></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value=""></td>
                  </tr>
                  <tr>
                    <td>DOB</td>
                    <td><input type="text" name="dob" placeholder="DD/MM/YYYY"></td>
                  </tr>
                  <tr>
                    <td>DOJ</td>
                    <td><input type="text" name="doj" placeholder="DD/MM/YYYY"></td>
                  </tr>
                  <tr>
                    <td>salary</td>
                    <td><input type="text" name="salary" value=""></td>
                  </tr>
                  <br>
                </table>
              </td>
            </tr>
        </table>
        <table align=left cellspacing="10px" cellpadding=10px>
            <tr>
                <td><input type="submit" name="submit1" value="Save"></td>
            </tr>
            <tr>
                 <td><input type="submit" name="submit2" value="Delete"></td>
            </tr>
        </table>
        <br><br>
        <IMG src="empback.jpg" align=right width="850px"height="400px">
</form>

<?php
if(isset($_POST['submit1']))
{
    $gen=$_POST['gender'];
    $en=$_POST['employeename'];
    $de=$_POST['department'];
    $dn=$_POST['designition'];
    $mb=$_POST['mobilenumber'];
    $em=$_POST['email'];
    $ad=$_POST['address'];
    $do=$_POST['dob'];
    $dj=$_POST['doj'];
    $sal=$_POST['salary'];
    $sql="insert into operation(gender,employeename,department,designition,mobilenumber,email,address,dob,doj,salary)values('$gen','$en','$de','$dn','$mb','$em','$ad','$do','$dj','$sal')";
    $r=mysqli_query($con,$sql);
    if($r)
    echo"Record saved successfully!";
    else
    echo"Error occured";

}
elseif(isset($_POST['submit3']))
{
    $key=$_POST['search'];
    $sql="select id,gender,employeename,department,designition,mobilenumber,email,address,dob,doj,salary from operation where id='".$key."'";
    $r=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($r);
    $a=$row['gender'];
    $b=$row['employeename'];
    $c=$row['department'];
    $d=$row['designition'];
    $e=$row['mobilenumber'];
    $f=$row['email'];
    $g=$row['address'];
    $h=$row['dob'];
    $i=$row['doj'];
    $j=$row['salary'];
    $k=$row['id'];

    echo'<form action="" method="post"><br><br>
    <br><br>
    <input type="submit" name="up" value="Update"><br><br>
    id:<input type="text" name="id" value="'.$k.'"><br>
    Gender:<input type="text" name="gender" value="'.$a.'"><br>
    Employeename:<input type="text" name="employeename" value="'.$b.'"><br>
    Department:<input type="text" name="department" value="'.$c.'"><br>
    Designition:<input type="text" name="designition" value="'.$d.'"><br>
    MobileNumber:<input type="text" name="mobilenumber" value="'.$e.'"><br>
    Email:<input type="text" name="email" value="'.$f.'"><br>
    Address:<input type="text" name="address" value="'.$g.'"><br>
    DOB:<input type="text" name="dob" value="'.$h.'"><br>
    DOJ:<input type="text" name="doj" value="'.$i.'"><br>
    salary:<input type="text" name="salary" value="'.$j.'"><br>
    </form>';
}

if(isset($_POST['up']))
 {
    $gen=$_POST['gender'];
    $en=$_POST['employeename'];
    $de=$_POST['department'];
    $dn=$_POST['designition'];
    $mb=$_POST['mobilenumber'];
    $em=$_POST['email'];
    $ad=$_POST['address'];
    $do=$_POST['dob'];
    $dj=$_POST['doj'];
    $sal=$_POST['salary'];
    $k=$_POST['id'];

    $sql="update operation set gender='".$gen."',employeename='".$en."',department='".$de."',designition='".$dn."',mobilenumber='".$mb."',email='".$em."',address='".$ad."',dob='".$do."',doj='".$dj."',salary='".$sal."' where id=".$k;
    $r=mysqli_query($con,$sql);
    if($sql)
    echo'Record updated successfully';
    else
    echo'Error occured';
 }
 elseif(isset($_POST['submit2'])){
    $s=$_POST['search'];
    $sql="delete from operation where id='".$s."'";
    $r=mysqli_query($con,$sql);
    if($r)
    echo'Deleted successfully';
    else
    echo'Not succeed';
}
echo'<table border="2px">
<tr> <th>id</th><th>Gender</th><th>EmployeeName</th><th>Department</th><th>Designition</th><th>MobileNumber</th><th>email</th><th>Address</th><th>DOB</th><th>DOJ</th><th>salary</th></tr>';
$sql="select id,gender,employeename,department,designition,mobilenumber,email,address,dob,doj,salary from operation";
$r=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($r)){
    echo '<tr><td>'.$row['id'].'</td>
    <td> '.$row['gender'].'</td>
    <td> '.$row['employeename'].'</td>
    <td> '.$row['department'].'</td>
    <td> '.$row['designition'].'</td>
    <td> '.$row['mobilenumber'].'</td>
    <td> '.$row['email'].'</td>
    <td> '.$row['address'].'</td>
    <td> '.$row['dob'].'</td>
    <td> '.$row['doj'].'</td>
    <td> '.$row['salary'].'</td>';
}

?>

    </body>
</html>
