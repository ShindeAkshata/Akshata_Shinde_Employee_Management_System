<?php

$hostname="localhost";
$dbUser="root";
$dbPassword="";
$dbName="empsignup";
$conn=mysqli_connect($hostname,$dbUser,$dbPassword,$dbName);
if(!$conn){
    die("something went wrong;");
}
?>