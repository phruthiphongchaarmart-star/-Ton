<?php
require("connect_db.php");

// ถ้ามีการกดปุ่มยืนยันลบ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $code = $_POST['course_code'];

    $sql = "DELETE FROM course WHERE course_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code);
    $stmt->execute();

    // แจ้งเตือนด้วย JS + Redirect
    echo "<script>
            alert('✅ Course deleted successfully!');
            window.location.href = 'courses_list.php';
          </script>";
    exit;
}

// ดึง course_code จาก URL
$code = isset($_GET["course_code"]) ? $_GET["course_code"] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Course</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f9fafb;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      background: white;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      text-align: center;
      max-width: 400px;
      animation: fadeIn 0.5s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    h2 {
      margin-bottom: 1rem;
      color: #ef4444;
    }
    p {
      margin-bottom: 2rem;
      color: #555;
    }
    .btn {
      display: inline-block;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 0 5px;
    }
    .btn-cancel {
      background: #e5e7eb;
      color: #333;
    }
    .btn-cancel:hover {
      background: #d1d5db;
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
  <div class="card">
    <h2>⚠️ Confirm Delete</h2>
    <p>Are you sure you want to delete course <br><strong><?php echo htmlspecialchars($code); ?></strong>?</p>
    <form method="POST">
      <input type="hidden" name="course_code" value="<?php echo htmlspecialchars($code); ?>">
      <button type="submit" name="confirm_delete" class="btn btn-delete">Yes, Delete</button>
      <a href="courses_list.php" class="btn btn-cancel">Cancel</a>
    </form>
  </div>
</body>
</html>
