<?php
require("connect_db.php");
$code = $_GET["student_code"];
$sql = "SELECT * FROM students WHERE student_code='$code'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6366f1, #a855f7);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 420px;
      animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    h2 {
      margin-top: 0;
      color: #4f46e5;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.3rem;
      color: #555;
    }
    input[type="text"], input[type="hidden"] {
      width: 100%;
      padding: 0.7rem 1rem;
      margin-bottom: 1rem;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 1rem;
      transition: border 0.3s, box-shadow 0.3s;
    }
    input[type="text"]:focus {
      border-color: #6366f1;
      box-shadow: 0 0 6px rgba(99,102,241,0.5);
      outline: none;
    }
    .btn-save {
      width: 100%;
      padding: 0.8rem;
      background: #6366f1;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      color: white;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }
    .btn-save:hover {
      background: #4f46e5;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>✏️ Edit Student</h2>
    <form action="save_edit_student.php" method="post">
      <input type="hidden" name="student_code_edit" value="<?php echo $row['student_code']; ?>">

      <label>Code:</label>
      <input type="text" name="student_code" value="<?php echo $row['student_code']; ?>">

      <label>Name:</label>
      <input type="text" name="students_names" value="<?php echo $row['students_names']; ?>">

      <label>Gender:</label>
      <input type="text" name="gender" value="<?php echo $row['gender']; ?>">

      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
</body>
</html>
