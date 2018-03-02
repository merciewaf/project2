<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO gl_actions (action_name, department, section, notes) VALUES ('" . $_POST["action_name"] . "','" . $_POST["department"] . "','" . $_POST["section"] . "','" . $_POST["notes"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "Added Successfully";
	}
}
?>
<html>
<head>
<title>Add New </title>
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
<div align="right" style="padding-bottom:5px;"><a href="actions.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> View Actions</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New Staff</td>
</tr>
<tr>
<td><label>Action</label></td>
<td><input type="text" name="action_name" class="txtField"></td>
</tr>
<tr>
<td><label>Department</label></td>
<td><input type="text" name="department" class="txtField"></td>
</tr>
<td><label>Section</label></td>
<td><input type="text" name="section" class="txtField"></td>
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
