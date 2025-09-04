<?php
require("connect_db.php");
$student_code = $_POST["student_code"];
$course_code = $_POST["course_code"];
$score = $_POST["score"];
$sql = "INSERT INTO exam_result(student_code, course_code, score) 
        VALUES('$student_code','$course_code','$score')";
mysqli_query($conn, $sql);
header("location: exam_result_list.php");
exit(0);
?>
