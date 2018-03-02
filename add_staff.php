<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql1 = "INSERT INTO staff (surname, fullname, dep_id, desig_id, extension, notes) VALUES ('" . $_POST["surname"] . "','" . $_POST["fullname"] . "','" . $_POST["dep_id"] . "','" . $_POST["desig_id"] . "','" . $_POST["extension"] . "','" . $_POST["notes"] . "')";
	mysqli_query($conn,$sql1);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "Added Successfully";
	}
	

	$sql2 = "INSERT INTO tbl_users1 (user_name, user_email, user_password, joining_date) VALUES ('" . $_POST["user_name"] . "','" . $_POST["user_email"] . "','" . $_POST["user_password"] . "',NOW())";
	
	mysqli_query($conn,$sql2);
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
<div align="right" style="padding-bottom:5px;"><a href="staff.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List Staff</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New Staff</td>
</tr>
<tr>
<td><label>Surname</label></td>
<td><input type="text" name="surname" class="txtField"></td>
</tr>
<tr>
<td><label>Full Name</label></td>
<td><input type="text" name="fullname" class="txtField"></td>
</tr>
<td><label>Email</label></td>
<td><input type="text" name="user_email" class="txtField"></td>
</tr>
<td><label>Username</label></td>
<td><input type="text" name="user_name" class="txtField"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" name="user_password" class="txtField"></td>
</tr>
<td><label>Department</label></td>
<td><select name="dep_id" class="form-control">
<option value="pick">Select Department</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['dep_id']."'>".$row['department_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<td><label>Designation</label></td>
<td><select name="desig_id" class="form-control">
<option value="pick">Select Designation</option>
<?php
require_once("db.php");
// Check connection

$sql = "SELECT * FROM designation";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['desig_id']."'>".$row['desig_name']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
</tr>
<td><label>Extension</label></td>
<td><input type="text" name="extension" class="txtField"></td>
</tr>
<td><label>Notes</label></td>
<td><input type="text" name="notes" class="txtField"></td>
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
