<?php
require("connect_db.php");
$students = mysqli_query($conn, "SELECT * FROM students");
$courses = mysqli_query($conn, "SELECT * FROM course");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Exam Result</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* Reset & Base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Form Container */
    .form-container {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 480px;
      animation: fadeIn 0.8s ease-out;
      transition: transform 0.2s;
    }

    .form-container:hover {
      transform: translateY(-5px);
    }

    h2 {
      text-align: center;
      color: #00796b;
      font-weight: 600;
      margin-bottom: 2rem;
      font-size: 1.8rem;
    }

    label {
      display: block;
      margin: 0.8rem 0 0.3rem;
      font-weight: 600;
      color: #37474f;
      font-size: 0.95rem;
    }

    select,
    input[type="number"] {
      width: 100%;
      padding: 0.8rem 1rem;
      border: 1px solid #cfd8dc;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    select:focus,
    input[type="number"]:focus {
      border-color: #00796b;
      box-shadow: 0 0 8px rgba(0, 121, 107, 0.3);
      outline: none;
    }

    /* Button */
    .btn-save {
      width: 100%;
      margin-top: 1.8rem;
      padding: 0.85rem;
      background: #00796b;
      color: #ffffff;
      border: none;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-save:hover {
      background: #004d40;
      transform: scale(1.03);
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>➕ Add Exam Result</h2>
    <form action="save_add_exam_result.php" method="post">
      <label for="student_code">Student Name:</label>
      <select id="student_code" name="student_code" required>
        <?php while ($s = mysqli_fetch_assoc($students)) { ?>
          <option value="<?php echo $s['student_code']; ?>"><?php echo $s['students_names']; ?></option>
        <?php } ?>
      </select>

      <label for="course_code">Course:</label>
      <select id="course_code" name="course_code" required>
        <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
          <option value="<?php echo $c['course_code']; ?>"><?php echo $c['courses_names']; ?></option>
        <?php } ?>
      </select>

      <label for="score">Point:</label>
      <input type="number" id="score" name="score" required min="0" step="1">

      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
</body>

</html>
