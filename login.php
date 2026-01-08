<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login </title>
  <link rel="stylesheet" href="styleee.css" />
</head>
<body>
  <div class="form-container">
    <h2>Welcome Back 👋</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    if (isset($_GET['message'])) {
        echo "<p style='color:green'>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>

    <form action="process_login.php" method="post">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>
</body>
</html>
