<?php
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE staff set surname='" . $_POST["surname"] . "', fullname='" . $_POST["fullname"] . "', department='" . $_POST["department"] . "', designation='" . $_POST["designation"] . "', extension='" . $_POST["extension"] . "', notes='" . $_POST["notes"] . "' WHERE staff_id='" . $_POST["staff_id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM staff WHERE staff_id='" . $_GET["staff_id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
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
<div align="right" style="padding-bottom:5px;"><a href="staff.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> View Staff</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit Staff</td>

</tr>
<tr>
<td><label>Surname</label></td>
<td><input type="text" name="surname" class="txtField"></td>
</tr>
<tr>
<td><label>Full Name</label></td>
<td><input type="text" name="fullname" class="txtField"></td>
</tr>

<td><label>Username</label></td>
<td><input type="text" name="user_name" class="txtField"></td>
</tr>
<tr>

<td><label>Department</label></td>
<td><input type="text" name="department" class="txtField"></td>
</tr>
<td><label>Designation</label></td>
<td><input type="text" name="designation" class="txtField"></td>
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