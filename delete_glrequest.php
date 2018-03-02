<?php
require_once("db.php");
$sql = "DELETE FROM glrequest WHERE glr_id='" . $_GET["glr_id"] . "'";
mysqli_query($conn,$sql);
header("Location:glrequest.php");
?>