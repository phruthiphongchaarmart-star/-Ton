<?php
require("connect_db.php");
$sql = "SELECT er.id, s.students_names, c.courses_names, er.point
        FROM exam_result er
        JOIN students s ON er.student_code = s.student_code
        JOIN course c ON er.course_code = c.course_code";
$result = mysqli_query($conn, $sql);
?>
<html>
<head><title>Exam Results</title></head>
<body>
<h2>Exam Results</h2>
<a href="add_exam_result.php">+ Add Exam Result</a>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Students_names</th><th>Courses_names</th><th>Point</th><th>Action</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row["id"]; ?></td>
  <td><?php echo $row["students_names"]; ?></td>
  <td><?php echo $row["courses_names"]; ?></td>
  <td><?php echo $row["point"]; ?></td>
  <td>
    <a href="edit_exam_result.php?id=<?php echo $row['id']; ?>">Edit</a> | 
    <a href="delete_exam_result.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this result?');">Delete</a>
  </td>
</tr>
<?php } ?>
</table>
</body>
</html>
