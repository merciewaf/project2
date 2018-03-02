<?php
require_once("db.php");
$sql = "DELETE FROM staff WHERE staff_id='" . $_GET["staff_id"] . "'";
mysqli_query($conn,$sql);
header("Location:staff.php");
?>