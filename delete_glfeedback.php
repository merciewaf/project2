<?php
require_once("db.php");
$sql = "DELETE FROM gl_feedback WHERE glf_id='" . $_GET["glf_id"] . "'";
mysqli_query($conn,$sql);
header("Location:glfeedback.php");
?>