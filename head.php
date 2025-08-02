<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Team UAP</title>
  <style>
    :root {
      --bg-color: #f8f9fa;
      --text-color: #333;
      --primary-color: #2a3791;
      --secondary-color: #f4a261;
      --accent-color: #ffb347;
      --nav-bg: #fff;
      --nav-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      --radius: 8px;
      --transition: all 0.3s ease;
    }

    body {
      font-family: 'Segoe UI', 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--bg-color);
      color: var(--text-color);
      line-height: 1.6;
    }

    header {
      background-color: var(--nav-bg);
      padding: 1rem 2rem;
      box-shadow: var(--nav-shadow);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
    }

    .logo {
      display: flex;
      align-items: center;
      font-size: 1.6rem;
      font-weight: bold;
      color: #e74c3c;
      gap: 0.5rem;
      text-decoration: none;
    }

    .logo img {
      height: 40px;
      width: auto;
      border-radius: var(--radius);
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 1.5rem;
      margin: 0;
      padding: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--text-color);
      font-weight: 500;
      padding: 0.5rem 0;
      border-bottom: 2px solid transparent;
      position: relative;
      transition: var(--transition);
    }

    .nav-links a::after {
      content: "";
      display: block;
      height: 2px;
      width: 0;
      background: var(--secondary-color);
      transition: var(--transition);
      position: absolute;
      bottom: 0;
      left: 0;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
      width: 100%;
    }

    .nav-links li:last-child a {
      background-color: var(--accent-color);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: var(--radius);
      transition: var(--transition);
    }

    .nav-links li a:hover {
      background-color: #e07b39;
      border-radius: 10px;
      padding: 10px;
    }

    .nav-links li:last-child a:hover {
      background-color: #e07b39;
    }

    .menu-toggle {
      display: none;
      font-size: 28px;
      cursor: pointer;
      background: none;
      border: none;
      color: #e74c3c;
    }

    @media (max-width: 768px) {
      .navbar-container {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav-links {
        flex-direction: column;
        width: 100%;
        display: none;
      }

      .nav-links.show {
        display: flex;
      }

      .menu-toggle {
        display: block;
        align-self: flex-end;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="navbar-container">
    <div class="logo"><img src="logo.png" alt="logo"> HamroAawaz</div>

    <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    <nav>
      <ul class="nav-links" id="nav-links">
        <li><a href="ind.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ind.php' ? 'active' : '' ?>">Home</a></li>
        <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a></li>
        <li><a href="report_issue.php" class="<?= basename($_SERVER['PHP_SELF']) == 'report_issue.php' ? 'active' : '' ?>">Report Issue</a></li>
        <li><a href="ward.php">Ward Contacts</a></li>
        <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact Us</a></li>
        <?php if (isset($_SESSION['username']) || isset($_SESSION['admin_username'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>

<script>
  function toggleMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('show');
  }
</script>

</body>
</html>
