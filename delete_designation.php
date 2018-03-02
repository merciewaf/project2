<?php
require_once("db.php");
$sql = "DELETE FROM designation WHERE desig_id='" . $_GET["desig_id"] . "'";
mysqli_query($conn,$sql);
header("Location:designation.php");
?>