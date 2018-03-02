<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$dep=$_POST['department_name'];
		$notes=$_POST['notes'];
		
		mysqli_query($conn,"insert into `departments` (department_name, notes) values ('$dep', '$notes')");
	}
?>