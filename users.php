<?php
require_once("db.php");
$sql = "SELECT * FROM tbl_users1 ORDER BY user_id ASC";
$result = mysqli_query($conn,$sql);
?>
<html>
<head>
<title>bizoft</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
	<div class="row">
		<div class="col-sm-2">
			<?php include_once 'sidebar.php';?>
		</div>
		<div class="col-sm-9" style="align-content: center;">
			<?php include_once 'header.php' ;?>
			<form name="frmUser" method="post" action="">
<div style="width: 35%px; align-content: center; margin-left: 15%; margin-right: 25%">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="#" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add User</a></div>
<table border="0" cellpadding="10" cellspacing="1" width="100%" class="table">
<tr class="listheader">
<td>No</td>
<td>User Name</td>
<td>Email</td>
<td>Joining Date</td>

<!--<td>Edit | Delete</td>-->
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["user_id"]; ?></td>
<td><?php echo $row["user_name"]; ?></td>
<td><?php echo $row["user_email"]; ?></td>
<td><?php echo $row["joining_date"]; ?></td>

<!--<td><a href="edit_staff.php?staff_id=<?php echo $row["staff_id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="delete_staff.php?staff_id=<?php echo $row["staff_id"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>-->
</tr>
<?php
$i++;
}
?>
</table>
</form>
</div>
		</div>
		
	</div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>