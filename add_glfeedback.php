<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO gl_feedback (feedback, notes) VALUES ('" . $_POST["feedback"] . "','" . $_POST["notes"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "Added Successfully";
	}
}
?>
<html>
<head>
<title>Add GL Feedback Option</title>
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
<div align="right" style="padding-bottom:5px;"><a href="glfeedback.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> View Feedback Options</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New GL Feedback Option</td>
</tr>
<tr>
<td><label>Feedback</label></td>
<td><input type="text" name="feedback" class="txtField" required></td>
</tr>
<tr>
<td><label>Notes</label></td>
<td><input type="text" name="notes" class="txtField" required></td>
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
