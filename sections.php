<?php
require_once("db.php");
$sql = "SELECT * FROM sections LEFT JOIN departments ON sections.dep_id = departments.dep_id ORDER BY sec_id ASC";


//"SELECT  FROM sections AS a, departments AS b WHERE a.dep_id = b.dep_id";
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
<div align="right" style="padding-bottom:5px;"><a href="add_sections.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add Sections</a></div>
<table border="0" cellpadding="10" cellspacing="1" width="100%" class="tblListForm">
<tr class="listheader">
<td>No</td>
<td>Section</td>
<td>Department</td>
<td>Reaction Time</td>
<td>Notes</td>
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
<td><?php echo $row["sec_id"]; ?></td>
<td><?php echo $row["section_name"]; ?></td>
<td><?php echo $row["department_name"]; ?></td>
<td><?php echo $row["reaction_time"]; ?></td>
<td><?php echo $row["notes"]; ?></td>
<td><a href="edit_sections.php?sec_id=<?php echo $row["sec_id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="delete_sections.php?sec_id=<?php echo $row["sec_id"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
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