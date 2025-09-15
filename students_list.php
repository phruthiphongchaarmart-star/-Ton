<?php
require("connect_db.php");

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
if ($search) {
  $sql = "SELECT * FROM students WHERE student_code LIKE ? OR students_names LIKE ?";
  $stmt = $conn->prepare($sql);
  $like = "%$search%";
  $stmt->bind_param("ss", $like, $like);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $sql = "SELECT * FROM students";
  $result = mysqli_query($conn, $sql);
}
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
      background: #f0f4f8;
      color: #2e3440;
    }

    header {
      background: linear-gradient(135deg, #4caf50, #26a69a);
      color: white;
      text-align: center;
      padding: 2rem 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    header h2 {
      margin: 0;
      font-size: 2.2rem;
      animation: fadeDown 1s ease;
    }

    @keyframes fadeDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
      flex-wrap: wrap;
      gap: 10px;
    }

    .btn {
      display: inline-block;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .btn-add {
      background: #4caf50;
      color: white;
    }

    .btn-add:hover {
      background: #388e3c;
      transform: scale(1.05);
    }

    .search-box input {
      padding: 0.6rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
    }

    .search-box button {
      padding: 0.6rem 1rem;
      background: #26a69a;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-box button:hover {
      background: #1e867d;
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      animation: fadeUp 1s ease;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    th,
    td {
      padding: 1rem;
      text-align: left;
    }

    th {
      background: #26a69a;
      color: white;
      font-size: 1rem;
    }

    tr:nth-child(even) {
      background: #f9fafb;
    }

    tr:hover {
      background: #e0f7fa;
      transition: 0.2s;
    }

    .btn-action {
      padding: 0.4rem 0.8rem;
      margin: 0 2px;
      border-radius: 6px;
      font-size: 0.85rem;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-edit {
      background: #42a5f5;
      color: white;
    }

    .btn-edit:hover {
      background: #1e88e5;
      transform: scale(1.05);
    }

    .btn-delete {
      background: #ef5350;
      color: white;
    }

    .btn-delete:hover {
      background: #d32f2f;
      transform: scale(1.05);
    }

    .empty {
      text-align: center;
      padding: 2rem;
      color: #666;
      font-style: italic;
    }
  </style>
</head>

<body>
  <header>
    <h2>👩‍🎓 Students Management</h2>
  </header>
  <div class="container">
    <div class="actions">
      <a href="add_student.php" class="btn btn-add">+ Add Student</a>
      <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search student..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
      </form>
    </div>
    <table>
      <tr>
        <th>Student Code</th>
        <th>Student Name</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row["student_code"]); ?></td>
            <td><?php echo htmlspecialchars($row["students_names"]); ?></td>
            <td><?php echo htmlspecialchars($row["gender"]); ?></td>
            <td>
              <a href="edit_student.php?student_code=<?php echo urlencode($row['student_code']); ?>" class="btn-action btn-edit">Edit</a>
              <a href="delete_student.php?student_code=<?php echo urlencode($row['student_code']); ?>" class="btn-action btn-delete" onclick="return confirm('Delete student?');">Delete</a>
            </td>
          </tr>
        <?php } ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="empty">No students found.</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</body>

</html>