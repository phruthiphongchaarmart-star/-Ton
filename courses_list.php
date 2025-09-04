<?php
require("connect_db.php");
$sql = "SELECT * FROM course";
$result = mysqli_query($conn, $sql);
?>
<html>
<head><title>Courses List</title></head>
<body>
<h2>Courses</h2>
<a href="add_course.php">+ Add Course</a>
<table border="1" cellpadding="5">
<tr><th>Code</th><th>Name</th><th>Credit</th><th>Action</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row["course_code"]; ?></td>
  <td><?php echo $row["courses_names"]; ?></td>
  <td><?php echo $row["credit"]; ?></td>
  <td>
    <a href="edit_course.php?course_code=<?php echo $row['course_code']; ?>">Edit</a> | 
    <a href="delete_course.php?course_code=<?php echo $row['course_code']; ?>" onclick="return confirm('Delete?');">Delete</a>
  </td>
</tr>
<?php } ?>
</table>
</body>
</html>
