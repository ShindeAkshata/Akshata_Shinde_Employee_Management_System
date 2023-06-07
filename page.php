<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    $conn = new mysqli('localhost','root','','service');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstname,lastname,email,country,subject)
             values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$firstname,$lastname,$email,$country,$subject);
        $stmt->execute();
        echo "registration successfully...";
        $stmt->close();
        $conn->close();
    }


?>