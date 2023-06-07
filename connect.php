<?php
    $employeename = $_POST['employeename'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $WorkCulture = $_POST['WorkCulture'];
    $CareerGrowth = $_POST['CareerGrowth'];
    $WorkEnvironment = $_POST['WorkEnvironment'];
    $WorkQuality = $_POST['WorkQuality'];
    $OverallRating = $_POST['OverallRating'];
    $suggestion = $_POST['suggestion'];
    

    $conn = new mysqli('localhost','root','','feedback');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into response(employeename,email,mobilenumber,WorkCulture,CareerGrowth,WorkEnvironment,WorkQuality,OverallRating,suggestion)
             values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssissssss",$employeename,$email,$mobilenumber,$WorkCulture,$CareerGrowth,$WorkEnvironment,$WorkQuality,$OverallRating,$suggestion);
        $stmt->execute();
        echo "<p><center>Thank You for Your Feedback! Your feedback is valuable to us..</p></center>";
        $stmt->close();
        $conn->close();
    }


?>