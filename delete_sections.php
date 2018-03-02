<?php
require_once("db.php");
$sql = "DELETE FROM sections WHERE sec_id='" . $_GET["sec_id"] . "'";
mysqli_query($conn,$sql);
header("Location:sections.php");
?>