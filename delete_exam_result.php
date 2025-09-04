<?php
require("connect_db.php");
$id = $_GET["id"];
$sql = "DELETE FROM exam_result WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: exam_result_list.php");
exit(0);
?>
