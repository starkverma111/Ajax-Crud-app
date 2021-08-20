<?php
	require 'config.php';
	$sql = "SELECT * FROM student";
	$result = mysqli_query($link, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['name'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['message'];?></td>
			<td> <button class="btn btn-warning btn-sm update" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-id=<?=$row["id"];?>
                                data-name=<?=$row["name"];?>
                                data-email=<?=$row["email"];?>
                                data-message=<?=$row["message"];?>          
                             >Update</button> </td>
			<td> <button class="btn btn-danger btn-sm delete" data-id=<?=$row["id"];?> >Delete</button> </td>

		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
?>