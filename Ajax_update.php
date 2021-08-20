<?php
	require 'config.php';
        
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        
        
        $sql = "UPDATE `student` 
        SET `name`='$name', `email`='$email', `message`='$message' WHERE id=$id";
        
        if (mysqli_query($link, $sql)) {
            echo "Data Update";
        } 
        else {
            echo "Data Not update";
        }

?>