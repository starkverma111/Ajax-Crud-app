<?php
	require 'config.php';
	
    $id=$_POST['id'];
	
    $sql = "DELETE FROM `student` WHERE id = $id";
	if (mysqli_query($link, $sql)) {
		echo "Deleted";
	} 
	else {
		echo "data not Deleted !";
	}
?>