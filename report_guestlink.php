
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
	$sql = "UPDATE guestlink set fullname='" . $_POST["fullname"] . "',status='Awaiting action', reported_time=NOW() WHERE gl_id='" . $_GET["gl_id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM guestlink WHERE gl_id='" . $_GET["gl_id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<form name="frmUser" method="post" action="">
<div style="width:700px; padding-left: 200px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Back</a> <a href="action_guestlink.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Action</a></div>
<table border="0" cellpadding="3" cellspacing="0" width="500" align="center" class="tblSaveForm">

<tr>
<td><label>Source Name</label></td>
<td><input type="hidden" name="userId" class="txtField" value="<?php echo $row['gl_id']; ?>">
<input type="text" name="userName" class="txtField" value="<?php echo $row['source_name']; ?>"></td>
</tr>
<tr>
<td><label>Request</label></td>
<td><input type="text" name="password" class="txtField" value="<?php echo $row['request']; ?>"></td>
</tr>
<td><label>Section</label></td>
<td><input type="text" name="firstName" class="txtField" value="<?php echo $row['section_name']; ?>"></td>
</tr>
<td><label>Reported To</label></td>
<td><select name="fullname" class="form-control">
<option value="pick">Select Staff</option>
<?php
//require_once("db.php");
// Check connection

$sql = "SELECT * FROM staff";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	
    	echo "<option value='".$row['fullname']."'>".$row['fullname']."</option>";

       
    }
} else {
    echo "0 results";
}
?>

</select></td>
<tr>
<td><input type="hidden" name="reported_time"  /></td></tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</div>
</body></html>