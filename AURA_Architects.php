<?php
// Start a session if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Architect Portfolio</title>
  <style>
    /* (Your CSS is unchanged) */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f5f5f5;
      color: #333;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 50px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .logo {
      font-size: 24px;
      font-weight: 600;
    }

    nav a {
      margin-left: 30px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }

    .hero {
      height: 80vh;
      background: url('homepg3.jpg') no-repeat center center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
    }

    .hero h1 {
      font-size: 48px;
      font-weight: 600;
      background: rgba(0, 0, 0, 0.6);
      padding: 20px 40px;
      border-radius: 8px;
    }

    .section {
      padding: 60px 50px;
    }

    .section h2 {
      font-size: 32px;
      margin-bottom: 30px;
      text-align: center;
    }

    .projects {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .project-card {
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .project-card:hover {
      transform: translateY(-10px);
    }

    .project-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .project-card .content {
      padding: 20px;
    }

    .project-card h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .project-card p {
      font-size: 14px;
      color: #666;
    }

    footer {
      text-align: center;
      padding: 30px;
      background: #222;
      color: #aaa;
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

    .caret-up {
      top: 20px;
      width: 80px;
      height: 80px;
      border-left: 25px solid orange;
      transform: rotate(45deg);
      position: relative;
    }

    .caret-up::before {
      content: "";
      position: absolute;
      top: 0px;
      left: -3px;
      width: 80%;
      height: 80%;
      border-right: 25px solid black;
      transform: rotate(-90deg);
    }
  </style>
</head>
<body>

  <header>
    <div class="logo" style="color:maroon;">
      🏠 AURA ARCHITECTS<br>
      <h6 style="color:#222;">ARCHITECT | LANDSCAPE | INTERIOR DESIGNER</h6>
    </div>
    
    <nav>
      <a href="AURA_Architects.php">Home</a>
      <a href="services.php">Services</a>
      <a href="login.php">Login</a>
      <a href="homedecor.php">Decor Items</a>
      <a href="aboutus.php">About</a>
      <a href="contactus.php">Contact</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <section class="hero">
    <h1>"Building Future Designing Dreams"</h1>
  </section>

  <section class="section">
    <h2>Featured Projects</h2>
    <div class="projects">
      <div class="project-card">
        <a href="interior_design.php"><img src="home2.jpg" alt="Project 1"></a>
        <div class="content">
          <h3>Interior designing</h3>
          <p>High-rise living redefined with sustainable materials.</p>
        </div>
      </div>
      <div class="project-card">
        <a href="landscape.php"><img src="landscape1.jpg" alt="Project 2"></a>
        <div class="content">
          <h3>Landscape</h3>
          <p>Open spaces blending nature and architecture.</p>
        </div>
      </div>
      <div class="project-card">
        <a href="traditionalhouse.php"><img src="traditional1.jpg" alt="Project 3"></a>
        <div class="content">
          <h3>Traditinal and modern House Design</h3>
          <p>Rooted in culture, designed for generations.</p>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <marquee>@ AURA ARCHITECTS</marquee>
  </footer>

</body>
</html>
