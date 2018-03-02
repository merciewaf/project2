<?php
require_once("db.php");
$sql = "DELETE FROM sources WHERE src_id='" . $_GET["src_id"] . "'";
mysqli_query($conn,$sql);
header("Location:sources.php");
?>