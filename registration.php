<?php
session_start();
require 'db.php'; // Connect to your DB

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data and sanitize
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $citizenship_no = trim($_POST['citizenship_no']);
    $ward = (int)$_POST['ward'];
    $municipality = trim($_POST['municipality']);

    // Validate input (add more as needed)
    if (!$name || !$email || !$password || !$citizenship_no || !$ward || !$municipality) {
        $error = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email.";
    } else {
        // Check if email or citizenship_no already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=? OR citizenship_no=?");
        $stmt->bind_param("ss", $email, $citizenship_no);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "Email or citizenship number already registered.";
        } else {
         $stmt = $conn->prepare("INSERT INTO users (name, email, password, citizenship_no, municipality, ward) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $name, $email, $password, $citizenship_no, $municipality, $ward);
        
        
            if ($stmt->execute()) {
                $_SESSION['username'] = $name;
                $_SESSION['user_id'] = $stmt->insert_id;
                header("Location: ind.php");
                exit();
            } else {
                $error = "Error during registration.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>User Registration</title>
<style>
    
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #f4f6f8;
  padding: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
.form-container{
  background: white;
  padding: 30px 40px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}


h2 {
  text-align: center;
  margin-bottom: 20px;
  color:#e74c3c;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
  width: 100%;
  padding: 10px 12px;
  margin: 8px 0 16px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
}

button {
  width: 100%;
  padding: 12px;
  background-color:#e74c3c;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color:#e74c3c;
}

p {
  text-align: center;
}

</style>
</head>
<body>
  <div class="form-container">
<h2>Register</h2>
<?php if ($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST" action="">
    Name:<br><input type="text" name="name" required><br>
    Email:<br><input type="email" name="email" required><br>
    Password:<br><input type="password" name="password" required><br>
    Citizenship No:<br><input type="text" name="citizenship_no" required><br>
   
    Municipality:<br><input type="text" name="municipality" required><br>
     Ward:<br><input type="number" name="ward" required><br>
    <button type="submit">Register</button>
</form>
</div>
</body>
</html>
