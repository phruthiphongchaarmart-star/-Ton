<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f0f4f8;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: #ffffff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
      animation: fadeIn 0.8s ease-out;
    }

    h2 {
      text-align: center;
      color: #26a69a;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin: 0.8rem 0 0.3rem;
      font-weight: 600;
      color: #2e3440;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border 0.2s, box-shadow 0.2s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
      border-color: #26a69a;
      box-shadow: 0 0 5px rgba(38, 166, 154, 0.3);
      outline: none;
    }

    .btn-save {
      width: 100%;
      margin-top: 1.5rem;
      padding: 0.8rem;
      background: #26a69a;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    .btn-save:hover {
      background: #1e867d;
      transform: scale(1.05);
    }

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
  <div class="card">
    <h2>➕ Add Student</h2>
    <form action="save_add_student.php" method="post">
      <label>Student Code:</label>
      <input type="text" name="student_code" required>

      <label>Student Name:</label>
      <input type="text" name="students_names" required>

      <label>Gender:</label>
      <div class="gender-group">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
      </div>

      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
</body>

</html>