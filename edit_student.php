<?php
require("connect_db.php");
$code = $_GET["student_code"];
$sql = "SELECT * FROM students WHERE student_code='$code'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<html>
<head><title>Edit Student</title></head>
<body>
<h2>Edit Student</h2>
<form action="save_edit_student.php" method="post">
  <input type="hidden" name="student_code_edit" value="<?php echo $row['student_code']; ?>">
  Code: <input type="text" name="student_code" value="<?php echo $row['student_code']; ?>"><br>
  Name: <input type="text" name="students_names" value="<?php echo $row['students_names']; ?>"><br>
  Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
  <input type="submit" value="Save">
</form>
</body>
</html>
