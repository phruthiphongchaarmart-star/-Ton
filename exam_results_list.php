<?php
require("connect_db.php");

// รับค่าค้นหา
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search) {
    $stmt = $conn->prepare("SELECT er.id, s.students_names, c.courses_names, er.point
                            FROM exam_result er
                            JOIN students s ON er.student_code = s.student_code
                            JOIN course c ON er.course_code = c.course_code
                            WHERE s.students_names LIKE ? OR c.courses_names LIKE ?");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT er.id, s.students_names, c.courses_names, er.point
            FROM exam_result er
            JOIN students s ON er.student_code = s.student_code
            JOIN course c ON er.course_code = c.course_code";
    $result = mysqli_query($conn, $sql);
}
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
    .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
      flex-wrap: wrap;
      gap: 10px;
    }
    .btn-add {
      padding: 0.6rem 1rem;
      background: #4f46e5;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-add:hover { background: #3730a3; transform: scale(1.05); }
    .search-box input {
      padding: 0.5rem 0.8rem;
      border: 1px solid #ddd;
      border-radius: 8px;
      outline: none;
    }
    .search-box button {
      padding: 0.5rem 1rem;
      background: #6366f1;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }
    .search-box button:hover { background: #4f46e5; }
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
    .btn-edit { background: #10b981; color: #fff; }
    .btn-edit:hover { background: #059669; }
    .btn-delete { background: #ef4444; color: #fff; }
    .btn-delete:hover { background: #b91c1c; }
    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .empty {
      text-align: center;
      padding: 1.5rem;
      color: #666;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📝 Exam Results</h2>

    <div class="actions">
      <a href="add_exam_result.php" class="btn-add">+ Add Exam Result</a>
      <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search by student or course..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
      </form>
    </div>

    <table>
      <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Course Name</th>
        <th>Point</th>
        <th>Action</th>
      </tr>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo htmlspecialchars($row["id"]); ?></td>
          <td><?php echo htmlspecialchars($row["students_names"]); ?></td>
          <td><?php echo htmlspecialchars($row["courses_names"]); ?></td>
          <td><?php echo htmlspecialchars($row["point"]); ?></td>
          <td>
            <a href="edit_exam_result.php?id=<?php echo urlencode($row['id']); ?>" class="action-btn btn-edit">Edit</a>
            <a href="delete_exam_result.php?id=<?php echo urlencode($row['id']); ?>" class="action-btn btn-delete" onclick="return confirm('Delete this result?');">Delete</a>
          </td>
        </tr>
        <?php } ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="empty">No results found.</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</body>
</html>
