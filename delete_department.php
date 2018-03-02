<?php
require_once("db.php");
$sql = "DELETE FROM departments WHERE dep_id='" . $_GET["dep_id"] . "'";
mysqli_query($conn,$sql);
header("Location:department.php");
?>