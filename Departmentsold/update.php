<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['dep_id'];
		$dep=$_POST['department_name'];
		$notes=$_POST['notes'];
		
		mysqli_query($conn,"update `user` set department_name='$dep', notes='$notes' where dep_id='$id'");
	}
?>