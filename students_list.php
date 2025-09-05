<?php
require("connect_db.php");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students List</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f7fa;
      color: #333;
    }
    header {
      background: linear-gradient(135deg, #6366f1, #a855f7);
      color: white;
      text-align: center;
      padding: 2rem 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    header h2 {
      margin: 0;
      font-size: 2rem;
      animation: fadeDown 1s ease;
    }
    @keyframes fadeDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .container {
      max-width: 900px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    .btn {
      display: inline-block;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-add {
      background: #22c55e;
      color: white;
    }
    .btn-add:hover {
      background: #16a34a;
      transform: scale(1.05);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1.5rem;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: fadeUp 1s ease;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    th, td {
      padding: 1rem;
      text-align: left;
    }
    th {
      background: #6366f1;
      color: white;
      font-size: 1rem;
    }
    tr:nth-child(even) {
      background: #f9fafb;
    }
    tr:hover {
      background: #eef2ff;
      transition: 0.2s;
    }
    .btn-action {
      padding: 0.4rem 0.8rem;
      margin: 0 2px;
      border-radius: 6px;
      font-size: 0.9rem;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-edit {
      background: #3b82f6;
      color: white;
    }
    .btn-edit:hover {
      background: #2563eb;
      transform: scale(1.05);
    }
    .btn-delete {
      background: #ef4444;
      color: white;
    }
    .btn-delete:hover {
      background: #dc2626;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <header>
    <h2>👩‍🎓 Students</h2>
  </header>
  <div class="container">
    <a href="add_student.php" class="btn btn-add">+ Add Student</a>
    <table>
      <tr>
        <th>Student Code</th>
        <th>Student Name</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row["student_code"]; ?></td>
        <td><?php echo $row["students_names"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td>
          <a href="edit_student.php?student_code=<?php echo $row['student_code']; ?>" class="btn-action btn-edit">Edit</a>
          <a href="delete_student.php?student_code=<?php echo $row['student_code']; ?>" class="btn-action btn-delete" onclick="return confirm('Delete student?');">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
