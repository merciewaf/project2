<?php
require_once("db.php");
$sql = "DELETE FROM gl_actions WHERE act_id='" . $_GET["act_id"] . "'";
mysqli_query($conn,$sql);
header("Location:actions.php");
?>