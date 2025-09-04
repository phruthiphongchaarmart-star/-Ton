<?php
require("connect_db.php");
$students = mysqli_query($conn, "SELECT * FROM students");
$courses = mysqli_query($conn, "SELECT * FROM course");
?>
<html>
<head><title>Add Exam Result</title></head>
<body>
<h2>Add Exam Result</h2>
<form action="save_add_exam_result.php" method="post">
  Student: 
  <select name="student_code">
    <?php while($s = mysqli_fetch_assoc($students)) { ?>
      <option value="<?php echo $s['student_code']; ?>"><?php echo $s['students_names']; ?></option>
    <?php } ?>
  </select><br>
  Course: 
  <select name="course_code">
    <?php while($c = mysqli_fetch_assoc($courses)) { ?>
      <option value="<?php echo $c['course_code']; ?>"><?php echo $c['courses_names']; ?></option>
    <?php } ?>
  </select><br>
  Score: <input type="number" name="score"><br>
  <input type="submit" value="Save">
</form>
</body>
</html>
