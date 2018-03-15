<?php
require_once("db.php");
$sql = "SELECT * FROM guestlink WHERE status = 'unreported' ORDER BY gl_id ASC";
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
<div style="width: 45% align-content: center; margin-left: 5%; margin-right: 5%;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="add_guestlink.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-plus"></span> NEW</a></div>
<table border="0" cellpadding="10" cellspacing="2" width="920px" class="table">
<tr class="listheader">
<td>No</td>
<td>Source</td>
<td>Request</td>
<td>Section</td>
<td>Department</td>
<td>Receive Time</td>
<td>Status</td>
<td></td>
<td>Edit | Delete</td>
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
<td><?php echo $row["gl_id"]; ?></td>
<td><?php echo $row["source_name"]; ?></td>
<td><?php echo $row["request"]; ?></td>
<td><?php echo $row["section_name"]; ?></td>
<td><?php echo $row["department_name"]; ?></td>
<td><?php echo $row["receive_time"]; ?></td>
<td><?php echo $row["status"]; ?></td>

<td><a href=report_guestlink.php?gl_id=<?php echo $row["gl_id"]; ?>" class="btn btn-primary btn-xs" role="button">Report</a>&nbsp;</td>
<td>
<a href="edit_guestlink.php?gl_id=<?php echo $row["gl_id"]; ?>" class="link"><span class="glyphicon glyphicon-pencil"></a> &nbsp; &nbsp; 
<a href="delete_guestlink.php?gl_id=<?php echo $row["gl_id"]; ?>"  class="link"><span class="glyphicon glyphicon-trash"></span></a></td>
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