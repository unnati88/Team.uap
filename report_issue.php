<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = trim($_POST['description']);
    $municipality = $_POST['municipality'];
    $ward = (int)$_POST['ward'];
    $user_id = $_SESSION['user_id'];
    $image_names = [];
    if (!empty($_FILES['photos']['name'][0])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir);

        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $image_name = basename($_FILES['photos']['name'][$key]);
            $targetPath = $uploadDir . time() . "_" . $image_name;

            if (move_uploaded_file($tmp_name, $targetPath)) {
                $image_names[] = $targetPath;
            }
        }
    }

    $image_paths = implode(',', $image_names);
    $stmt = $conn->prepare("INSERT INTO complaints (user_id, title, description, image, ward, municipality) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssis", $user_id, $title, $description, $image_paths, $ward, $municipality);

    if ($stmt->execute()) {
    header("Location: issue_submitted.php");
    exit();
} else {
    echo "Something went wrong!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Issue</title>
    <style>
        body {
  margin: 0;
  padding: 2rem;
  font-family: 'Segoe UI', 'Roboto', sans-serif;
  background-color: #f2f7f6;
  color: #2c3e50;
}
form {
  max-width: 700px;
  margin: 0 auto;
  background-color: #ffffff;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}
h2 {
  text-align: center;
  color: #e74c3c;
}

p {
  text-align: center;
  font-weight: bold;
}

p[style*="red"] {
  color: #e74c3c;
}

p[style*="green"] {
  color: #27ae60;
}

/* Labels & Inputs */
label {
  font-weight: 600;
  display: block;
  margin-bottom: 6px;
  color: #34495e;
}

select,
textarea,
input[type="file"] {
  width: 100%;
  padding: 0.6rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  margin-bottom: 1.5rem;
  background-color: #fdfdfd;
}

/* File Input */
input[type="file"] {
  padding: 0.4rem;
}

/* Button Styling */
button[type="submit"] {
  display: block;
  width: 100%;
  background-color: #e74c3c;
  color: white;
  font-size: 1.1rem;
  margin-top:10px;
  padding: 0.75rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #216e99;
}

/* Responsive */
@media (max-width: 600px) {
  body {
    padding: 1rem;
  }

  form {
    padding: 1.5rem;
  }

  h2 {
    font-size: 1.5rem;
  }
}

    </style>
   

</head>
<body>
    <h2>Report an Issue</h2>
    <?php if ($error): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <?php if ($success): ?><p style="color:green"><?= htmlspecialchars($success) ?></p><?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label>Issue Title</label>
        <select name="title" required>
            <option value="">Select Issue Category</option>
            <option value="Road">Road</option>
            <option value="Water Supply">Water Supply</option>
            <option value="Potholes">Potholes</option>
            <option value="Broken Street">Broken Street</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4" placeholder="Please explain the issue" required></textarea><br><br>

        <label>Select Municipality</label>
        <select name="municipality" required>
            <option value="">Choose Municipality</option>
            <option>Kathmandu Metropolitan</option>
            <option>Tarkeshwor</option>
            <option>Tokha</option>
            <option>Gokarneshwor</option>
            <option>Kirtipur</option>
            <option>Nagarjun</option>
            <option>Chandragiri</option>
            <option>Dakshinkali</option>
            <option>Kageshwori Manohara</option>
        </select><br><br>
        <label>Ward Number</label>
        <select name="ward" required>
            <option value="">Choose Ward</option>
            <?php for ($i = 1; $i <= 32; $i++): ?>
                <option value="<?= $i ?>">Ward <?= $i ?></option>
            <?php endfor; ?>
        </select><br><br>

        <label>Attach Photos</label><br>
        <input type="file" name="photos[]" accept="image/*" multiple><br><br>
<label>Location</label>
    <input type="text" id="location" placeholder="Click to auto-fill location" readonly>
    <button type="button" onclick="getLocation()">📍 Get Location</button>
        <button type="submit">Submit Report</button>
    </form>
</body>
<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(pos => {
        document.getElementById("location").value = `${pos.coords.latitude}, ${pos.coords.longitude}`;
      }, () => {
        alert("Please allow location access.");
      });
    } else {
      alert("Geolocation not supported.");
    }
  }
</script>
</html>
