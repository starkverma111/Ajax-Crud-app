<?php
	require 'config.php';
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        
        
        $sql = "INSERT INTO `student`( `name`, `email`, `message`) 
        VALUES ('$name','$email','$message')";
        
        if (mysqli_query($link, $sql)) {
            echo "Data Inserted";
        } 
        else {
            echo "Data Not Inserted";
        }

?>