<?php
require("connect_db.php");

$id = $_POST["id"];
$student_code = $_POST["student_code"];
$course_code = $_POST["course_code"];
$point = $_POST["score"]; // รับค่ามาจากฟอร์ม (input name="score")

// ใน DB คอลัมน์เก็บคะแนนชื่อ point ไม่ใช่ score
$sql = "UPDATE exam_result 
        SET student_code='$student_code', 
            course_code='$course_code', 
            point='$point' 
        WHERE id='$id'";

mysqli_query($conn, $sql) or die("SQL Error: " . mysqli_error($conn));

header("location: exam_results_list.php");
exit(0);
?>
