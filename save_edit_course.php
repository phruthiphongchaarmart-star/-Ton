<?php
require("connect_db.php");
$edit = $_POST["course_code_edit"];
$code = $_POST["course_code"];
$name = $_POST["courses_names"];
$credit = $_POST["credit"];
$sql = "UPDATE course 
        SET course_code='$code', courses_names='$name', credit='$credit' 
        WHERE course_code='$edit'";
mysqli_query($conn, $sql);
header("location: courses_list.php");
exit(0);
?>
