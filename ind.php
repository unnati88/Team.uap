<?php
include "head.php";
?>
<html>
<head>
    <style>
      
body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', 'Roboto', sans-serif;
  background-color: #f9f9f9;
  color: #1e1e1e;
}
.title {
  text-align: center;
  padding: 3rem 1rem 1.5rem;
  background: #e74c3c;
  color: #fff;
}

.title h1 {
  font-size: 2.5rem;
  margin: 0;
  font-weight: 700;
  letter-spacing: 1px;
}
.intro {
  background-color: #ffffff;
  padding: 2rem 1rem 3rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  border-radius: 12px;
  max-width: 800px;
  margin: 2rem auto;
}

.intro .container {
  max-width: 700px;
  margin: 0 auto;
  line-height: 1.8;
  text-align: center;
}

.intro strong {
  color: #e74c3c;
}

.intro p {
  font-size: 1.1rem;
  margin-bottom: 1.2rem;
}
.btn-report {
  background-color: #f4a261;
  color: black;
  font-size: 1rem;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-report:hover {
  background-color: #e07b39;
}
@media (max-width: 600px) {
  .title h1 {
    font-size: 2rem;
  }

  .intro p {
    font-size: 1rem;
  }
}

    </style>
</head>
<div class="title">
    <h1>Your Voice, Your Ward</h1>
</div>

<section class="intro">
  <div class="container">
    <p>
      <strong>HamroAawaz</strong> is your voice for local change. Whether it's a broken streetlight, drainage problem, water supply problem, overflowing waste, or garbage <br> collection delay, report it directly to your ward with just a few clicks.
    </p>
    <p>
      Stay informed, track the progress of your complaints, and hold your local leaders accountable, all through your phone or computer.
    </p>
    <form action="report_issue.php">
       <input type="submit" value="Report Issue Now" class="btn-report">
    </form>
  </div>
</section>
</body>
