<?php include "head.php"; ?>  <!-- Only if head.php contains stuff for <head> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Us | HamroAwaz</title>
  <style>
    
body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f4f9fb;
  margin: 0;
  padding: 0;
  
}
.contact-container {
  max-width: 550px;
  margin: 0 auto; /* centers horizontally */
  background-color: #fff;
  padding: 2.5rem;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}
.contact-container {
  background-color: #ffffff;
  padding: 2.5rem;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  max-width: 550px;
  width: 100%;
}

.contact-container h2 {
  text-align: center;
  color: #e74c3c;
  margin-bottom: 0.5rem;
}

.contact-container .subtitle {
  text-align: center;
  color: #555;
  font-size: 0.95rem;
  margin-bottom: 1.5rem;
}

.contact-form label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #34495e;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 1.2rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  background-color: #f0f6ff;
  font-size: 1rem;
  resize: vertical;
}

.contact-form button {
  width: 100%;
  background-color: #e74c3c;
  color: white;
  padding: 0.8rem;
  font-size: 1rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.contact-form button:hover {
  background-color: #216e99;
}

  </style>
</head>
<body>
<div class="page-wrapper">
  <div class="contact-container">
    <h2>Contact Us</h2>
    <p class="subtitle">Have a question, complaint, or suggestion? We’d love to hear from you!</p>

    <form action="send_message.php" method="POST" class="contact-form">
      <label for="name">Your Name:</label>
      <input type="text" name="name" id="name" required />

      <label for="email">Your Email:</label>
      <input type="email" name="email" id="email" required />

      <label for="subject">Subject:</label>
      <input type="text" name="subject" id="subject" required />

      <label for="message">Message:</label>
      <textarea name="message" id="message" rows="5" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>
</div>

</body>
</html>
