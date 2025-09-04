<?php
require("connect_db.php");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<html>
<head><title>Students List</title></head>
<body>
<h2>Students</h2>
<a href="add_student.php">+ Add Student</a>
<table border="1" cellpadding="5">
<tr><th>Student_code</th><th>Students_names</th><th>Gender</th><th>Action</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row["student_code"]; ?></td>
  <td><?php echo $row["students_names"]; ?></td>
  <td><?php echo $row["gender"]; ?></td>
  <td>
    <a href="edit_student.php?student_code=<?php echo $row['student_code']; ?>">Edit</a> | 
    <a href="delete_student.php?student_code=<?php echo $row['student_code']; ?>" onclick="return confirm('Delete?');">Delete</a>
  </td>
</tr>
<?php } ?>
</table>
</body>
</html>
