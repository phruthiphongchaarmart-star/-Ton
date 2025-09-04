<?php
require("connect_db.php");
$code = $_POST["course_code"];
$name = $_POST["courses_names"];
$credit = $_POST["credit"];
$sql = "INSERT INTO course(course_code, courses_names, credit) 
        VALUES('$code','$name','$credit')";
mysqli_query($conn, $sql);
header("location: courses_list.php");
exit(0);
?>
