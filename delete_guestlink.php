<?php
require_once("db.php");
$sql = "DELETE FROM guestlink WHERE gl_id='" . $_GET["gl_id"] . "'";
mysqli_query($conn,$sql);
header("Location:guestlink.php");
?>