<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #3b82f6, #9333ea);
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
      color: #3b82f6;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.3rem;
      color: #555;
    }
    input[type="text"] {
      width: 100%;
      padding: 0.7rem 1rem;
      margin-bottom: 1rem;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 1rem;
      transition: border 0.3s, box-shadow 0.3s;
    }
    input[type="text"]:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 6px rgba(59,130,246,0.5);
      outline: none;
    }
    .gender-group {
      margin-bottom: 1.5rem;
    }
    .gender-group label {
      font-weight: 500;
      margin-right: 1rem;
    }
    .btn-save {
      width: 100%;
      padding: 0.8rem;
      background: #3b82f6;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      color: white;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }
    .btn-save:hover {
      background: #2563eb;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>➕ Add Student</h2>
    <form action="save_add_student.php" method="post">
      <label>Student Code:</label>
      <input type="text" name="student_code" required>

      <label>Name:</label>
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
