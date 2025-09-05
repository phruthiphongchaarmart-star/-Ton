<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>University Academic Management System</title>
  <style>
    /* ฟอนต์ */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(120deg, #6366f1, #a855f7, #ec4899);
      background-size: 300% 300%;
      animation: gradientMove 10s ease infinite;
      color: #fff;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    header {
      text-align: center;
      padding: 3rem 1rem 2rem;
    }

    header h2 {
      margin: 0;
      font-size: 2.2rem;
      font-weight: 600;
      animation: fadeDown 1s ease-out;
    }

    @keyframes fadeDown {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .menu {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 2rem;
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    .menu a {
      display: block;
      text-decoration: none;
      background: rgba(255, 255, 255, 0.1);
      padding: 2rem;
      border-radius: 16px;
      text-align: center;
      font-size: 1.3rem;
      font-weight: 600;
      color: #fff;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      transform: scale(0.95);
      opacity: 0;
      animation: fadeUp 1s forwards;
    }

    .menu a:nth-child(1) { animation-delay: 0.3s; }
    .menu a:nth-child(2) { animation-delay: 0.6s; }
    .menu a:nth-child(3) { animation-delay: 0.9s; }

    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(30px) scale(0.9); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .menu a:hover {
      transform: scale(1.05) rotate(1deg);
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 12px 30px rgba(0,0,0,0.35);
      transition: all 0.3s ease;
    }

    footer {
      text-align: center;
      font-size: 0.9rem;
      color: #f3f4f6;
      padding: 1rem;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <header>
    <h2>🎓 University Academic Management System</h2>
  </header>

  <section class="menu">
    <a href="students_list.php">👩‍🎓 Students</a>
    <a href="courses_list.php">📚 Courses</a>
    <a href="exam_results_list.php">📝 Exam Results</a>
  </section>

  <footer>
    &copy; 2025 University Academic Management
  </footer>
</body>
</html>
