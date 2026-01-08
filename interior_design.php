<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Interior Projects - Aura Architects</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      background-color: #f3f4f7;
      padding: 40px;
      color: #1d1d1d;
    }

    h1 {
      text-align: center;
      margin-bottom: 50px;
      font-size: 2.8rem;
      color: #2c3e50;
    }

    .project-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(3, 200px);
      gap: 10px;
      max-width: 1000px;
      margin: auto;
      position: relative;
    }

    .img-box {
      background-size: cover;
      background-position: center;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .img1 { grid-column: 2; grid-row: 1; background-image: url('interior1.jpg'); }
    .img2 { grid-column: 1; grid-row: 2; background-image: url('office3.jpg'); }
    .img3 { grid-column: 2; grid-row: 2; background-image: url('kictune.jpg'); }
    .img4 { grid-column: 3; grid-row: 2; background-image: url('interior design2.jpg'); }
    .img5 { grid-column: 2; grid-row: 3; background-image: url('interior design.jpg'); }

    .info-box {
      margin-top: 50px;
      text-align: center;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .info-box h2 {
      font-size: 1.8rem;
      margin-bottom: 10px;
      color: #333;
    }

    .info-box p {
      font-size: 1rem;
      line-height: 1.6;
      color: #555;
    }

    .info-box .location {
      font-weight: bold;
      color: #888;
      margin-bottom: 15px;
    }

    @media (max-width: 768px) {
      .project-grid {
        display: flex;
        flex-direction: column;
      }

      .img-box {
        height: 200px;
        margin-bottom: 10px;
      }
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
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1px 30px;
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
  </style>
</head>
<body>

  <header>
    
   <h4 style="color:#222;">🏠ARCHITECT | LANDSCAPE | INTERIOR DESIGNER</h4>
    
    <nav>
      <a href="AURA Architects.html">Home</a>
      <a href="services.html">Services</a>
      <a href="login.html">Login</a>
      <a href="homedecor.html">Decor Items</a>
      <a href="aboutus.html">About</a>
      <a href="contact us.html">Contact</a>
    </nav>
  </header>

  <h1>🏠 Interior Design Showcase – Aura Architects</h1>

  <div class="project-grid">
    <div class="img-box img1"></div>
    <div class="img-box img2"></div>
    <div class="img-box img3"></div>
    <div class="img-box img4"></div>
    <div class="img-box img5"></div>
  </div>

  <div class="info-box">
    <h2>Modern Boho Apartment</h2>
    <div class="location">📍 Location: Mumbai, India</div>
    <p>
      This contemporary apartment blends modern minimalism with cozy boho touches. Wooden textures, neutral palettes,
      and creative open space layout create a homey yet refined atmosphere. Designed for functionality and flair.
    </p>
  </div>

</body>
</html>
