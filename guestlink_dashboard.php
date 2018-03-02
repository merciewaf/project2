<?php
require_once("db.php");
$sql = "SELECT * FROM guestlink ORDER BY gl_id ASC";
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
<div align="right" style="padding-bottom:5px;"><a href="add_guestlink.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> NEW</a></div>
			<div class="row">
				<fieldset>
				<div class="col-sm-3">
					<h5> Unreported Requests</h5>
					<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("bizoft",$con);

$sql = "SELECT * FROM guestlink WHERE status='unreported' ORDER BY gl_id ASC";
$result = mysql_query($sql,$con);
echo mysql_num_rows($result);

mysql_close($con);
?>
<br>
<button type="button" class="btn btn-primary btn-sm"><a href="guestlink.php">VIEW ALL </a></button>

				</div>
				<div class="col-sm-3">
					<h5>Requests awaiting Action</h5>
					<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("bizoft",$con);

$sql = "SELECT * FROM guestlink WHERE status='awaiting action' ORDER BY gl_id ASC";
$result = mysql_query($sql,$con);
echo mysql_num_rows($result);

mysql_close($con);
?>
<br>
<button type="button" class="btn btn-primary btn-sm"><a href="viewaction_guestlink.php">VIEW ALL </a></button>
				</div>
				<div class="col-sm-3">
					<h5>Requests awaiting Feedback</h5>
					<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("bizoft",$con);

$sql = "SELECT * FROM guestlink WHERE status='awaiting feedback' ORDER BY gl_id ASC";
$result = mysql_query($sql,$con);
echo mysql_num_rows($result);

mysql_close($con);
?>
<br>
<button type="button" class="btn btn-primary btn-sm"><a href="viewfeedback_guestlink.php">VIEW ALL </a></button>
				</div>
				<div class="col-sm-3">
					<h5>Completed Requests</h5>
					<?php
$con = mysql_connect("localhost", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("bizoft",$con);

$sql = "SELECT * FROM guestlink WHERE status='completed' ORDER BY gl_id ASC";
$result = mysql_query($sql,$con);
echo mysql_num_rows($result);

mysql_close($con);
?>
<br>
<button type="button" class="btn btn-primary btn-sm"><a href="complete_guestlink.php">VIEW ALL </a></button>
				</div>

			</div>
			
		</div>
		
	</div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>