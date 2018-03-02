<?php
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE glrequest set request='" . $_POST["request"] . "', department='" . $_POST["department"] . "', section='" . $_POST["section"] . "', notes='" . $_POST["notes"] . "' WHERE glr_id='" . $_POST["glr_id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM glrequest WHERE glr_id='" . $_GET["glr_id"] . "'";
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
<div align="right" style="padding-bottom:5px;"><a href="glrequest.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> View Requests</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit Staff</td>

</tr>
<tr>
<td><label>Feedback</label></td>
<td><input type="hidden" name="userId" class="txtField" value="<?php echo $row['userId']; ?>"><input type="text" name="userName" class="txtField" value="<?php echo $row['userName']; ?>"></td>
</tr>
<tr>
<td><label>Department</label></td>
<td><input type="password" name="password" class="txtField" value="<?php echo $row['password']; ?>"></td>
</tr>
<td><label>Section</label></td>
<td><input type="text" name="firstName" class="txtField" value="<?php echo $row['firstName']; ?>"></td>
</tr>
<td><label>Notes</label></td>
<td><input type="text" name="lastName" class="txtField" value="<?php echo $row['lastName']; ?>"></td>
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