<?php
require("connect_db.php");
$student_code_edit = $_POST["student_code_edit"];
$student_code = $_POST["student_code"];
$name = $_POST["students_names"];
$gender = $_POST["gender"];
$sql = "UPDATE students 
        SET student_code='$student_code', students_names='$name', gender='$gender' 
        WHERE student_code='$student_code_edit'";
mysqli_query($conn, $sql);
header("location: students_list.php");
exit(0);
?>
