<?php
    $Gender = $_POST['Gender'];
    $reason = $_POST['reason'];
    $duration = $_POST['duration'];
    $employeename = $_POST['employeename'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $mobilenumber = $_POST['mobilenumber'];
    $date = $_POST['date'];
    $filename = $_POST['filename'];
    $ApprovalStatus = $_POST['ApprovalStatus'];
    

    $conn = new mysqli('localhost','root','','leaveform');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into holiday(Gender,reason,duration,employeename,department,designation,mobilenumber,date,filename,ApprovalStatus)
             values(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssisss",$Gender,$reason,$duration,$employeename,$department,$designation,$mobilenumber,$date,$filename,$ApprovalStatus);
        $stmt->execute();
        echo "<p><center>Thank You ! Leave Application Form is submitted successfully..</p></center>";
        $stmt->close();
        $conn->close();
    }
?>