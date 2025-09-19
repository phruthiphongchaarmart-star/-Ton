<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>University Academic Management System</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(120deg, #a7d7c5, #c8e7f5, #e0f2f1);
      background-size: 300% 300%;
      animation: gradientMove 15s ease infinite;
      color: #2e3440;
      display: flex;
      flex-direction: column;
    }

    @keyframes gradientMove {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    /* Navbar */
    nav {
      background: rgba(255, 255, 255, 0.7);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      backdrop-filter: blur(8px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    nav h1 {
      margin: 0;
      font-size: 1.5rem;
      font-weight: 600;
      color: #2e3440;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: #2e3440;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: #00897b;
    }

    header {
      text-align: center;
      padding: 3rem 1rem 1rem;
    }

    header h2 {
      margin: 0;
      font-size: 2.3rem;
      font-weight: 700;
      color: #1b4332;
      animation: fadeDown 1s ease-out;
    }

    @keyframes fadeDown {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Menu Section */
    .menu {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
      flex-grow: 1;
    }

    .card {
      background: rgba(255, 255, 255, 0.85);
      padding: 2rem 1.5rem;
      border-radius: 18px;
      text-align: center;
      color: #2e3440;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transform: translateY(10px);
      opacity: 0;
      animation: fadeUp 1s forwards;
      transition: all 0.4s ease;
    }

    .card:nth-child(1) {
      animation-delay: 0.3s;
    }

    .card:nth-child(2) {
      animation-delay: 0.6s;
    }

    .card:nth-child(3) {
      animation-delay: 0.9s;
    }

    @keyframes fadeUp {
      0% {
        opacity: 0;
        transform: translateY(30px) scale(0.9);
      }

      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .card:hover {
      transform: translateY(-8px) scale(1.03);
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #00897b;
    }

    .card h3 {
      margin: 0.5rem 0;
      font-size: 1.4rem;
      color: #1b4332;
    }

    .card p {
      color: #374151;
    }

    .card a {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
      background: #00897b;
      color: #fff;
      border-radius: 10px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .card a:hover {
      background: #00695c;
    }

    footer {
      text-align: center;
      font-size: 0.9rem;
      color: #374151;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(10px);
      margin-top: auto;
    }


    /* Menu Section */
    .menu {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
      flex-grow: 1;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      padding: 2rem 1.5rem;
      border-radius: 18px;
      text-align: center;
      color: #fff;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
      transform: translateY(10px);
      opacity: 0;
      animation: fadeUp 1s forwards;
      transition: all 0.4s ease;
    }

    .card:nth-child(1) {
      animation-delay: 0.3s;
    }

    .card:nth-child(2) {
      animation-delay: 0.6s;
    }

    .card:nth-child(3) {
      animation-delay: 0.9s;
    }

    @keyframes fadeUp {
      0% {
        opacity: 0;
        transform: translateY(30px) scale(0.9);
      }

      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .card:hover {
      transform: translateY(-8px) scale(1.05);
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.35);
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .card h3 {
      margin: 0.5rem 0;
      font-size: 1.5rem;
    }

    .card a {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
      background: #fff;
      color: #4f46e5;
      border-radius: 10px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .card a:hover {
      background: #e0e7ff;
    }

    footer {
      text-align: center;
      font-size: 0.9rem;
      color: #f3f4f6;
      padding: 1rem;
      background: rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(10px);
      margin-top: auto;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav>
    <h1>🎓 Ku</h1>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </nav>

  <!-- Header -->
  <header>
    <h2>University Academic Management System</h2>
  </header>

  <!-- Menu -->
  <section class="menu">
    <div class="card">
      <div class="card-icon">👩‍🎓</div>
      <h3>Students</h3>
      <p>Manage student information, personal data, and profiles.</p>
      <a href="students_list.php">Go to Students</a>
    </div>

    <div class="card">
      <div class="card-icon">📚</div>
      <h3>Courses</h3>
      <p>Manage courses, credits, and academic curriculum.</p>
      <a href="courses_list.php">Go to Courses</a>
    </div>

    <div class="card">
      <div class="card-icon">📝</div>
      <h3>Exam Results</h3>
      <p>View and manage exam results and student grades.</p>
      <a href="exam_results_list.php">Go to Results</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    &copy; 2025 University Academic Management | Kasetsart University, Chalermphrakiat Sakon Nakhon Province Campus
  </footer>
</body>

</html>