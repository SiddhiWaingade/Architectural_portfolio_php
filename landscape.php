<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Aura Architects Projects</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f7fa;
      padding: 40px;
      margin: 0;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 40px;
      color: #2c3e50;
    }

    .project-card {
      display: flex;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      margin-bottom: 30px;
      transition: transform 0.3s ease;
    }

   

    .project-image {
      flex: 1;
      max-width: 300px;
      height: auto;
      object-fit: cover;
    }

    .project-info {
      flex: 2;
      padding: 20px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .project-title {
      font-size: 1.6rem;
      font-weight: 600;
      color: #1b1f24;
      margin-bottom: 10px;
    }

    .project-location {
      font-size: 0.95rem;
      color: #555;
      margin-bottom: 15px;
    }

    .project-description {
      font-size: 1rem;
      color: #444;
      line-height: 1.6;
    }

    @media (max-width: 768px) {
      .project-card {
        flex-direction: column;
      }

      .project-image {
        width: 100%;
        max-height: 200px;
      }

      .project-info {
        padding: 20px;
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
      background-color:floralwhite;
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

  <h1>🌿 Landscape Projects by Aura Architects</h1>

  
  <div class="project-card">
    <img src="hillre.jpg" class="project-image" alt="Hill Garden">
    <div class="project-info">
      <div class="project-title">Hilltop Garden Retreat</div>
      <div class="project-location">📍Location: Mahabaleshwar, India</div>
      <div class="project-description">
        A scenic landscape design integrating natural stone paths, native plants, and breathtaking hillside views, ideal for peaceful weekend getaways.
      </div>
    </div>
  </div>

  <div class="project-card">
    <img src="hillresort2.jpg" class="project-image" alt="Urban Green Patch">
    <div class="project-info">
      <div class="project-title">Urban Green Patch</div>
      <div class="project-location">📍Location: Pune, India</div>
      <div class="project-description">
        A compact city backyard redesigned into a modern green escape with vertical gardens, soft lighting, and cozy seating zones.
      </div>
    </div>
  </div>

  
  <div class="project-card">
    <img src="courtyard.jpg" class="project-image" alt="Resort Courtyard">
    <div class="project-info">
      <div class="project-title">Resort Courtyard Oasis</div>
      <div class="project-location">📍Location: Goa, India</div>
      <div class="project-description">
        A luxurious courtyard landscape combining water features, tropical flora, and ambient lighting for a premium resort experience.
      </div>
    </div>
  </div>
  
  <div class="project-card">
    <img src="ecofriendlylandscape3.jpg" class="project-image" alt="Resort Courtyard">
    <div class="project-info">
      <div class="project-title">Resort Landscape Design</div>
      <div class="project-location">📍Location: Malvan, India</div>
      <div class="project-description">
        A luxurious courtyard landscape combining water features, tropical flora, and ambient lighting for a premium resort experience.
      </div>
    </div>
  </div>

  <div class="project-card">
    <img src="ecofriendlylandscape2.jpg" class="project-image" alt="Resort Courtyard">
    <div class="project-info">
      <div class="project-title">House Front Landscape Design</div>
      <div class="project-location">📍Location: Kolhapur, India</div>
      <div class="project-description">
        Elegant Front Yard Landscape for Modern Residence
      </div>
    </div>
  </div>



</body>
</html>
