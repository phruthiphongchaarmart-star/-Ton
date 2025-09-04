<?php
require("connect_db.php");
$id = $_GET["id"];
$sql = "SELECT * FROM exam_result WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$students = mysqli_query($conn, "SELECT * FROM students");
$courses = mysqli_query($conn, "SELECT * FROM courses");
?>
<html>
<head><title>Edit Exam Result</title></head>
<body>
<h2>Edit Exam Result</h2>
<form action="save_edit_exam_result.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  Student: 
  <select name="student_code">
    <?php while($s = mysqli_fetch_assoc($students)) { ?>
      <option value="<?php echo $s['student_code']; ?>" <?php if($s['student_code']==$row['student_code']) echo "selected"; ?>><?php echo $s['students_names']; ?></option>
    <?php } ?>
  </select><br>
  Course: 
  <select name="course_code">
    <?php while($c = mysqli_fetch_assoc($courses)) { ?>
      <option value="<?php echo $c['course_code']; ?>" <?php if($c['course_code']==$row['course_code']) echo "selected"; ?>><?php echo $c['courses_names']; ?></option>
    <?php } ?>
  </select><br>
  Score: <input type="number" name="score" value="<?php echo $row['point']; ?>"><br>
  <input type="submit" value="Save">
</form>
</body>
</html>
