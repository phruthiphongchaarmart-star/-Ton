<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Course</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .form-container {
      background: rgba(255,255,255,0.95);
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.25);
      width: 100%;
      max-width: 450px;
      animation: fadeIn 1s ease-out;
    }

    h2 {
      text-align: center;
      color: #4f46e5;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin: 0.8rem 0 0.3rem;
      font-weight: 600;
      color: #333;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border 0.2s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
      border-color: #6366f1;
      outline: none;
    }

    .btn-save {
      width: 100%;
      margin-top: 1.5rem;
      padding: 0.8rem;
      background: #4f46e5;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    .btn-save:hover {
      background: #3730a3;
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>➕ Add Course</h2>
    <form action="save_add_course.php" method="post">
      <label for="course_code">Course Code:</label>
      <input type="text" id="course_code" name="course_code" required>

      <label for="courses_names">Name:</label>
      <input type="text" id="courses_names" name="courses_names" required>

      <label for="credit">Credit:</label>
      <input type="number" id="credit" name="credit" required>

      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
</body>
</html>
