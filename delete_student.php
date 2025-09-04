<?php
require("connect_db.php");
$code = $_GET["student_code"];
$sql = "DELETE FROM students WHERE student_code='$code'";
mysqli_query($conn, $sql);
header("location: students_list.php");
exit(0);
?>
