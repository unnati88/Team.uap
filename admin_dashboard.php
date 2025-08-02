<?php
session_start();
require 'db.php';
include 'head.php';
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET['delete_id'])) {
    $deleteId = (int)$_GET['delete_id'];
    $stmtDel = $conn->prepare("DELETE FROM complaints WHERE id = ?");
    $stmtDel->bind_param("i", $deleteId);
    $stmtDel->execute();
}

$adminWard = $_SESSION['admin_ward'];
$adminMunicipality = $_SESSION['admin_municipality'];
$stmt = $conn->prepare("SELECT * FROM complaints WHERE ward = ? AND municipality = ?");
$stmt->bind_param("is", $adminWard, $adminMunicipality);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  padding: 20px;
  margin: 0;
  background-color: #f8f9fa;
}

h1, h2 {
  margin: 10px 0;
}

.logout {
  float: right;
  margin-bottom: 20px;
  text-decoration: none;
  background-color: #e07b39;
  border-radius: 10px;
  padding: 10px;
  color: black;
}
.logout:hover {
  background-color: #f4a261;
}

table {
  width: 100%;
  border-collapse: collapse;
  overflow-x: auto;
  display: block;
}

th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: left;
  white-space: nowrap;
}

th {
  background-color: #2a3791;
  color: white;
}

tr:nth-child(even) {
  background-color: #f0f0f0;
}

img {
  max-width: 100px;
  height: auto;
}

.status {
  padding: 4px 10px;
  border-radius: 6px;
  font-weight: bold;
  font-size: 0.9em;
  display: inline-block;
}
.status.pending {
  background-color: #ffeeba;
  color: #856404;
}
.status.done {
  background-color: #c3e6cb;
  color: #155724;
}

.btn-mark {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  display: inline-block;
  font-size: 0.9em;
}
.btn-mark:hover {
  background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  body {
    padding: 10px;
  }

  .logout {
    float: none;
    display: block;
    text-align: center;
    margin: 10px auto;
  }

  table {
    font-size: 0.9em;
  }

  th, td {
    padding: 6px;
  }

  img {
    max-width: 80px;
  }

  .btn-mark {
    padding: 5px 10px;
    font-size: 0.8em;
  }
}
.report-image {
  max-width: 150px;
  height: auto;
  cursor: pointer;
  border-radius: 6px;
  transition: transform 0.3s ease;
}

.report-image:hover {
  transform: scale(1.05);
}

/* Modal Overlay */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  padding-top: 5vh;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.8);
}

/* Modal Image */
.modal-content {
  margin: auto;
  display: block;
  max-width: 90%;
  max-height: 90vh;
  border-radius: 8px;
}

/* Close Button */
.close {
  position: absolute;
  top: 30px;
  right: 40px;
  color: #fff;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.close:hover {
  color: #f00;
}

  </style>
</head>
<body>

  <h1>Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?></h1>
  

  <h2>Complaints for Ward <?= $adminWard ?>, <?= htmlspecialchars($adminMunicipality) ?></h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr id="row-<?= $row['id'] ?>">
            <td><?= $row['id'] ?></td>
            <td><?= $row['user_id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
              <?php if (!empty($row['image'])): ?>
                <img src="<?= htmlspecialchars($row['image']) ?>" alt="Complaint Image" class="report-image" onclick="openModal(this.src)"/>
              <?php else: ?>
                No Image
              <?php endif; ?>
            </td>
            <td><?= $row['date'] ?></td>
            <td><span class="status pending">Pending</span></td>
            <td>
              <a class="btn-mark" href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('Mark this complaint as done?')">Mark as Done</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No complaints found for your ward and municipality.</p>
  <?php endif; ?>
  <div id="imageModal" class="modal" onclick="closeModal()">
  <span class="close">&times;</span>
  <img class="modal-content" id="modalImg">
</div>

<script>
function openModal(src) {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImg');
  modal.style.display = 'block';
  modalImg.src = src;
}

function closeModal() {
  document.getElementById('imageModal').style.display = 'none';
}
</script>

</body>
</html>
