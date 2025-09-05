<?php
require("connect_db.php");
$sql = "SELECT er.id, s.students_names, c.courses_names, er.point
        FROM exam_result er
        JOIN students s ON er.student_code = s.student_code
        JOIN course c ON er.course_code = c.course_code";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Exam Results</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg, #6366f1, #a855f7, #ec4899);
      background-size: 300% 300%;
      animation: gradientMove 10s ease infinite;
      color: #333;
      min-height: 100vh;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      max-width: 1000px;
      margin: 3rem auto;
      background: rgba(255,255,255,0.95);
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.25);
      animation: fadeIn 1s ease-out;
    }

    h2 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: #4f46e5;
    }

    .btn-add {
      display: inline-block;
      margin-bottom: 1rem;
      padding: 0.6rem 1rem;
      background: #4f46e5;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-add:hover {
      background: #3730a3;
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
    }

    th {
      background: #4f46e5;
      color: #fff;
      font-weight: 600;
    }

    tr:nth-child(even) { background: #f3f4f6; }
    tr:nth-child(odd) { background: #fff; }

    tr:hover { background: #e0e7ff; transition: 0.2s; }

    .action-btn {
      text-decoration: none;
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-size: 0.9rem;
      font-weight: 600;
      transition: 0.2s;
    }

    .btn-edit {
      background: #10b981;
      color: #fff;
    }
    .btn-edit:hover { background: #059669; }

    .btn-delete {
      background: #ef4444;
      color: #fff;
    }
    .btn-delete:hover { background: #b91c1c; }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📝 Exam Results</h2>
    <a href="add_exam_result.php" class="btn-add">+ Add Exam Result</a>
    <table>
      <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Course Name</th>
        <th>Point</th>
        <th>Action</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["students_names"]; ?></td>
        <td><?php echo $row["courses_names"]; ?></td>
        <td><?php echo $row["point"]; ?></td>
        <td>
          <a href="edit_exam_result.php?id=<?php echo $row['id']; ?>" class="action-btn btn-edit">Edit</a>
          <a href="delete_exam_result.php?id=<?php echo $row['id']; ?>" class="action-btn btn-delete" onclick="return confirm('Delete this result?');">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
