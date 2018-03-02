<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO guestlink (source_name, request, section_name, department_name, receive_time) VALUES ('" . $_POST["source_name"] . "','" . $_POST["request"] . "','" . $_POST["source_name"] . "','" . $_POST["department_name"] ."', NOW())";
	//$sql = "INSERT INTO guestlink (source_name, request, section_name, department_name, receive_time, fullname, reported_time, action_taken, staff_id, action_time, feedback, feedback_time, user_name, notes) VALUES ('" . $_POST["source_name"] . "','" . $_POST["request"] . "','" . $_POST["section_name"] . "','" . $_POST["department_name"] . "',NOW(),'" . $_POST["fullname"] . "','" . $_POST["reported_time"] . "','" . $_POST["action_time"] . "','" . $_POST["feedback"] . "','" . $_POST["feedback_time"] . "','" . $_POST["user_name"] . "','" . $_POST["notes"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "Added Successfully";
	}
	
}
?>
<html>
<head>
<title>Bizoft</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<div class="row">
		<div class="col-sm-2">
			<?php include_once 'sidebar.php';?>
		</div>
		<div class="col-sm-9">
			<?php include_once 'header.php' ;?>
			<form name="frmUser" method="post" action="">
<div class="form">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="guestlink_dashboard.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Guestlink</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">New</td>
</tr>
<tr>
<td><label>Source</label></td>
<td><select name="source_name" class="form-control">
<option value="pick">Select Source</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM sources";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['source_name']."'>".$row['source_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<tr>
<td><label>Request</label></td>
<td><select name="request" class="form-control">
<option value="pick">Select Request</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM glrequest";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['request']."'>".$row['request']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<td><label>Section</label></td>
<td><select name="section_name" class="form-control">
<option value="pick">Select Section</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM sections";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['section_name']."'>".$row['section_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<td><label>Department</label></td>
<td><select name="department_name" class="form-control">
<option value="pick">Select Department</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['department_name']."'>".$row['department_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<tr>
<td><input type="hidden" name="receive_time" class="txtField"></td>
</tr>
<!--<td><label>Reported Time</label></td>-->
<!--<td><label>Action Taken</label></td>-->
<!--<td><label>Action By</label></td>-->
<tr>
<!--<td><label>Action Time</label></td>-->
<!--<td><label>Feedback</label></td>-->

</tr>
<!--<td><label>Feedback Time</label></td>-->
<td><input type="hidden" name="date" class="txtField"></td>
</tr>
<!--<td><label>Personnel</label></td>-->
<!--<td><select name="user_name" class="form-control">-->
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM tbl_users1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	//echo "<option value='".$row['user_name']."'>".$row['user_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>


</tr>
<!--<td><label>Notes</label></td>-->
<td><input type="hidden" name="notes" class="txtField"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
		</div>
		
	</div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>
