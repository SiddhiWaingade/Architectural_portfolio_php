<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Traditional House Project - Aura Architects</title>
  <link rel="stylesheet" href="style2.css" />
  <style>
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
  <div class="head">
    <h1>🏠Traditional And Modern House Project</h1>
    
  </div>

  <section class="project-details">
    <h2>Project Overview</h2>
    <p><strong>📍Location:</strong> Kerala, India</p>
    <p>
      <strong>Description:</strong> This beautiful traditional house blends Kerala's architectural heritage with modern comforts. 
      Crafted with natural materials, wooden interiors, and a sloped tiled roof, this home reflects timeless beauty and sustainable design principles.
    </p>
  </section>

  <section class="gallery">
    <h2>Project Gallery</h2>
    <div class="images">
      <img src="house/front view .jpg" alt="Front view of traditional house" />
      <img src="house/interiorwork1.jpg" alt="Interior woodwork"height="180px" width="10px" />
      <img src="house/courtyard1.jpg" alt="Courtyard area"  height="180px" width="10px"/> 
     
      
    </div>
</section><br><br>


    <section class="project-details">
    <h2>Project Overview</h2>
    <p><strong>📍Location:</strong> Ashta, Sangli,India</p>
    <p>
      <strong>Description:</strong> A perfect fusion of contemporary elegance and traditional charm, this serene two-story home embraces nature with open spaces, earthy textures, and lush green surroundings. Designed with a sloped terracotta roof, wooden highlights, and inviting balconies, it reflects the warmth of a sweet home where comfort meets timeless aesthetics.
    </p>
  </section>

  <section class="gallery">
    <h2>Project Gallery</h2>
    <div class="images">
      <img src="house/frontview.jpg" alt="Front view of traditional house" />
      <img src="house/interior design3.jpg" alt="Interior woodwork" height="260px" />
      <img src="house/courtyard2.jpg" alt="Courtyard area"  height="260px" /> 
      <img src="house/plan.jpg" alt="Front view of traditional house" />
    
    </div>
  </section>

</body>
</html>
