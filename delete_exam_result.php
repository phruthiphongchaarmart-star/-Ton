<?php
require("connect_db.php");

// ถ้ามีการกดปุ่มยืนยันลบ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $id = $_POST['exam_id'];

    $sql = "DELETE FROM exam_result_new WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // ใช้ "i" เพราะ id เป็นตัวเลข
    $stmt->execute();

    // แจ้งเตือนด้วย JS + Redirect
    echo "<script>
            alert('✅ Exam result deleted successfully!');
            window.location.href = 'exam_results_list.php';
          </script>";
    exit;
}

// ดึง id จาก URL
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Exam Result</title>
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
    <p>Are you sure you want to delete exam result ID <br><strong><?php echo htmlspecialchars($id); ?></strong>?</p>
    <form method="POST">
      <input type="hidden" name="exam_id" value="<?php echo htmlspecialchars($id); ?>">
      <button type="submit" name="confirm_delete" class="btn btn-delete">Yes, Delete</button>
      <a href="exam_results_list.php" class="btn btn-cancel">Cancel</a>
    </form>
  </div>
</body>
</html>
