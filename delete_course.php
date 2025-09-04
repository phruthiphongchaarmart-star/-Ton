<?php
require("connect_db.php");
$code = $_GET["course_code"];
$sql = "DELETE FROM course WHERE course_code='$code'";
mysqli_query($conn, $sql);
header("location: courses_list.php");
exit(0);
?>
