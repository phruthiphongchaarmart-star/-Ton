<?php
require("connect_db.php");

$student_code = $_POST["student_code"];
$course_code  = $_POST["course_code"];
$score        = $_POST["point"];

// ใช้ชื่อคอลัมน์จริงใน DB เช่น point
$sql = "INSERT INTO exam_result(student_code, course_code, point) 
        VALUES('$student_code','$course_code','$score')";

mysqli_query($conn, $sql) or die("SQL Error: " . mysqli_error($conn));

header("location: exam_results_list.php");
exit(0);
?>
