<?php
require("connect_db.php");
$student_code = $_POST["student_code"];
$name = $_POST["students_names"];
$gender = $_POST["gender"];
$sql = "INSERT INTO students(student_code, students_names, gender) 
        VALUES('$student_code','$name','$gender')";
mysqli_query($conn, $sql);
header("location: students_list.php");
exit(0);
?>
