<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO sections (section_name, dep_id, reaction_time, notes) VALUES ('" . $_POST["section_name"] . "','" . $_POST["dep_id"] . "','" . $_POST["reaction_time"] . "','" . $_POST["notes"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "Added Successfully";
	}
}
?>
<html>
<head>
<title>Add New Staff</title>
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
<div align="right" style="padding-bottom:5px;"><a href="sections.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List Sections</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New Section</td>
</tr>
<tr>
<td><label>Section</label></td>
<td><input type="text" name="section_name" class="txtField"></td>
</tr>
<tr>
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
<td><label>Set Reaction Time</label></td>
<td><input type="text" name="reaction_time" class="txtField"></td>
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
