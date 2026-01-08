<?php
// Handle form submission
$responseMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Send email (or you can store in DB instead)
        $to = "siddhiwaingade2003@gmail.com"; // <-- Replace this
        $subject = "New Contact from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $responseMessage = "<p style='color: green;'>Thank you, $name! Your message has been sent.</p>";
        } else {
            $responseMessage = "<p style='color: red;'>Oops! Something went wrong. Please try again.</p>";
        }
    } else {
        $responseMessage = "<p style='color: red;'>Please fill out all fields correctly.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact us</title>
  <style>
    /* [same CSS code from your file goes here — no changes made] */
    form {
      display: flex;
      flex-direction: column;
    }

    input, textarea {
      padding: 1rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      font-family: 'Poppins', sans-serif;
    }

    button {
      padding: 1rem;
      background-color: #1e1e1e;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }

    .head1 {
      background-color:palegoldenrod;
      color:#333;
      text-align: center;
      padding: 10px 0;
      font-size: 20px;
    }

    .head h1 {
      font-size: 2rem;
      letter-spacing: 1px;
    }

    .container {
      max-width: 1100px;
      margin: 3rem auto;
      padding: 0 2rem;
    }

    .about-box, .products-section, .contact-section {
      background: #fff;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      transition: all 0.3s ease-in-out;
      margin-bottom: 2rem;
    }

    .about-box:hover, .products-section:hover, .contact-section:hover {
      box-shadow: 0 12px 25px rgba(0,0,0,0.08);
    }

    footer {
      text-align: center;
      padding: 2rem;
      background: #1e1e1e;
      color: #aaa;
      margin-top: 3rem;
    }

    nav {
      padding: 1rem 2rem;
      display: flex;
      justify-content: center;
      gap: 2rem;
    }

    nav a {
      color: black;
      text-decoration: none;
      font-weight: 500;
      position: relative;
      transition: color 0.3s ease;
    }

    nav a::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: black;
      transition: width 0.3s ease;
    }

    nav a:hover {
      color: brown;
    }

    nav a:hover::after {
      width: 100%;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 20px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .logo {
      font-size: 24px;
      font-weight: 600;
    }

    @media (max-width: 600px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }
      nav {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="logo" style="color:maroon;">
      🏠 AURA ARCHITECTS<br>
      <h5 style="color:#222;">ARCHITECT | LANDSCAPE | INTERIOR DESIGNER</h5>
    </div>
    <nav>
      <a href="AURA_Architects.php">Home</a>
      <a href="services.php">Services</a>
      <a href="login.php">Login</a>
      <a href="homedecor.php">Decor Items</a>
      <a href="aboutus.php">About</a>
      <a href="contactus.php">Contact</a>
    </nav>
  </header>

  <div class="wrapper">
    <div class="body">
      <div class="contact-section">
        <div class="form-container">
          <div class="form login-form">
            <div class="head1"><h2>Contact With Aura Architects</h2></div><br><br>
            <p>Have a project in mind or want to know more about our designs and products? Reach out to us using the form below:</p>

            <?= $responseMessage; ?>

            <form action="contact.php" method="POST">
              <input type="text" name="name" placeholder="Your Name" required>
              <input type="email" name="email" placeholder="Your Email" required>
              <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
              <button type="submit">Send Message</button>
            </form>

            <div class="contact-info">
              <h3>Address</h3>
              <p>123 Gulmohar Colony,Sangli<br>Maharashtra,Pin code-416416</p>
            </div><br>
            <div class="contact-card">
              <h3>Call Us</h3>
              <p>+91 98765 43210<br>+91 91234 56789</p>
            </div><br>
            <div class="contact-card">
              <h3>Email</h3>
              <p>@auraarchitects.com<br>support@auraarchitects.com</p>
            </div><br>
            <div class="contact-card">
              <h3>Follow Us</h3>
              <p>Instagram : <a href="https://www.instagram.com/auraarchitects_sangli?igsh=MTVrczN3cWwyaWg0aQ==">auraarchitects_sangli</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    @ Aura Architects.
  </footer>
</body>
</html>
