<?php
session_start();

require 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginType = $_POST['loginType'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($loginType === 'user') {
        // Check users table
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['username'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: ind.php");
            exit();
        } else {
            $error = "Invalid user credentials.";
        }

    } elseif ($loginType === 'admin') {
        // Check admins table
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin) {
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_ward'] = $admin['ward'];
            $_SESSION['admin_municipality'] = $admin['municipality'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid admin credentials.";
        }

    } else {
        $error = "Please select user type.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
     /* Body Layout */
body {
  font-family: 'Segoe UI', 'Roboto', sans-serif;
  background-color: #f2f6f8;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  padding: 20px;
}

/* Wrapper for the login card */
.login-wrapper {
  background-color: #ffffff;
  padding: 2.5rem;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  max-width: 400px;
  width: 100%;
  box-sizing: border-box;
  text-align: center;
}

/* Title */
.login-wrapper h2 {
  color:#e74c3c;
  margin-bottom: 1.5rem;
  font-size: 28px;
}

/* Form Styles */
form {
  text-align: left;
}

/* Labels */
label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #e74c3c;
}

/* Inputs and select */
input[type="text"],
input[type="password"],
select {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  margin-bottom: 1rem;
  background-color: #f0f6ff;
  font-size: 1rem;
}

/* Button */
button {
  width: 100%;
  background-color: #e74c3c;
  color: white;
  padding: 0.75rem;
  border: none;
  font-size: 1rem;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #216e99;
}

/* Error text */
p[style*="red"] {
  color: #e74c3c;
  font-weight: 600;
  text-align: center;
}

/* Register link at bottom */
.register-link {
  margin-top: 1.5rem;
  font-size: 14px;
  text-align: center;
}

.register-link a {
  color: #2e86ab;
  text-decoration: none;
  font-weight: 600;
}

.register-link a:hover {
  text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="login-wrapper">
<h2>Login</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" action="">
  <label for="loginType">Login as:</label>
  <select id="loginType" name="loginType" required>
    <option value="">Select user type</option>
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>

  <label for="username">Username:</label>
  <input type="text" name="username" id="username" required>

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" required>

  <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="registration.php">Register here</a>.</p>
</div>
</body>
</html>
