<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['dep_id'];
		mysqli_query($conn,"delete from `departments` where dep_id='$id'");
	}
?>