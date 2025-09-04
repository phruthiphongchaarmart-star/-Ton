<?php
require("connect_db.php");
$id = $_POST["id"];
$student_code = $_POST["student_code"];
$course_code = $_POST["course_code"];
$score = $_POST["score"];
$sql = "UPDATE exam_result 
        SET student_code='$student_code', course_code='$course_code', score='$score' 
        WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: exam_result_list.php");
exit(0);
?>
