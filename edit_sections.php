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
			<?php
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE sections set section_name='" . $_POST["section_name"] . "', department='" . $_POST["department"] . "', reaction_time='" . $_POST["reaction_time"] . "', notes='" . $_POST["notes"] . "' WHERE sec_id='" . $_POST["sec_id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM sections WHERE sec_id='" . $_GET["sec_id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
			<form name="frmUser" method="post" action="">
<div class="form">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="sections.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List Sections</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit Section</td>

</tr>
<tr>
<td><label>Section</label></td>
<td><input type="hidden" name="section_name" class="txtField" value="<?php echo $row['sec_id']; ?>"><input type="text" name="section_name" class="txtField" value="<?php echo $row['section_name']; ?>"></td>
</tr>
<tr>
<td><label>Department/label></td>
<td><input type="text" name="department_name" class="txtField" value="<?php echo $row['dep_id']; ?>"></td>
</tr>
<td><label>Reaction Time</label></td>
<td><input type="text" name="reaction_time" class="txtField" value="<?php echo $row['reaction_time']; ?>"></td>
</tr>
<td><label>Notes</label></td>
<td><input type="text" name="lastName" class="txtField" value="<?php echo $row['notes']; ?>"></td>
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