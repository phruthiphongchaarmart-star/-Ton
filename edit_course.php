<?php
require("connect_db.php");
$code = $_GET["course_code"];
$sql = "SELECT * FROM course WHERE course_code='$code'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<html>
<head><title>Edit Course</title></head>
<body>
<h2>Edit Course</h2>
<form action="save_edit_course.php" method="post">
  <input type="hidden" name="course_code_edit" value="<?php echo $row['course_code']; ?>">
  Code: <input type="text" name="course_code" value="<?php echo $row['course_code']; ?>"><br>
  Name: <input type="text" name="courses_names" value="<?php echo $row['courses_names']; ?>"><br>
  Credit: <input type="number" name="credit" value="<?php echo $row['credit']; ?>"><br>
  <input type="submit" value="Save">
</form>
</body>
</html>
