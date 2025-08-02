<?php include "head.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tarkeshwor Municipality – All Ward Contacts</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f4f8;
      padding: 20px;
      color: #333;
    }
    h2 {
      color: #e74c3c;
      text-align: center;
    }
    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }
    .card {
      background-color:#ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 20px;
      transition: transform 0.2s;
    }
    .card:hover {
      transform: translateY(-5px);
      background-color: grey;
    }
    .ward-number {
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 10px;
      color: #e74c3c;
    }
    .label {
      font-weight: bold;
      color: #555;
    }
    a {
      color: #e74c3c;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h2>Tarkeshwor Municipality – Ward Directory</h2>
  <div class="cards-container">

    <!-- Repeat this card for each ward -->
    <div class="card">
      <div class="ward-number">Ward 1</div>
      <div><span class="label">Chairperson:</span> Krishna Hari Maharjan</div>
      <div><span class="label">Phone:</span> <a href="tel:9851258234">9851258234</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Admin Office, Tarkeshwor</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 2</div>
      <div><span class="label">Chairperson:</span> Radha Krishna Khadgi</div>
      <div><span class="label">Phone:</span> <a href="tel:9841775708">9841775708</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 2</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 3</div>
      <div><span class="label">Chairperson:</span> Srijana Burlakoti Aryal</div>
      <div><span class="label">Phone:</span> <a href="tel:9841566749">9841566749</a></div>
      <div><span class="label">Email:</span> sirjanaburlakoti2022@gmail.com</div>
      <div><span class="label">Address:</span> Ward Office 3</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 4</div>
      <div><span class="label">Chairperson:</span> Nani Bahadur Magar</div>
      <div><span class="label">Phone:</span> <a href="tel:9841226702">9841226702</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 4</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 5</div>
      <div><span class="label">Chairperson:</span> Bhola Dahal</div>
      <div><span class="label">Phone:</span> <a href="tel:9849613023">9849613023</a></div>
      <div><span class="label">Email:</span> bhola.dahal2021@gmail.com</div>
      <div><span class="label">Address:</span> Ward Office 5</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 6</div>
      <div><span class="label">Chairperson:</span> Prem Kumar Lama</div>
      <div><span class="label">Phone:</span> <a href="tel:9841270715">9841270715</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 6</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 7</div>
      <div><span class="label">Chairperson:</span> Sharada Devi Tamang</div>
      <div><span class="label">Phone:</span> <a href="tel:9841693056">9841693056</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 7</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 8</div>
      <div><span class="label">Chairperson:</span> Mahesh Kumar Luitel</div>
      <div><span class="label">Phone:</span> <a href="tel:9851189026">9851189026</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 8</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 9</div>
      <div><span class="label">Chairperson:</span> Dev Bahadur BK</div>
      <div><span class="label">Phone:</span> <a href="tel:9860367632">9860367632</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 9</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 10</div>
      <div><span class="label">Chairperson:</span> Bhakta Bahadur Khadka</div>
      <div><span class="label">Phone:</span> <a href="tel:9851133556">9851133556</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 10</div>
    </div>

    <div class="card">
      <div class="ward-number">Ward 11</div>
      <div><span class="label">Chairperson:</span> Bipin Acharya</div>
      <div><span class="label">Phone:</span> <a href="tel:9841318420">9841318420</a></div>
      <div><span class="label">Email:</span> —</div>
      <div><span class="label">Address:</span> Ward Office 11</div>
    </div>

  </div>
</body>
</html>
