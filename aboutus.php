<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Aura Architects</title>
 
  <style>
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

    header {
      background-color: #1e1e1e;
      color: #fff;
      padding: 2rem;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    header h1 {
      font-size: 2.5rem;
      letter-spacing: 1px;
    }

    .container {
      max-width: 1100px;
      margin: 3rem auto;
      padding: 0 2rem;
    }

    .about-box {
      background: #fff;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      transition: all 0.3s ease-in-out;
    }

    .about-box:hover {
      box-shadow: 0 12px 25px rgba(0,0,0,0.08);
    }

    .about-box h2 {
      font-size: 2rem;
      margin-bottom: 1.5rem;
      color: #1e1e1e;
    }

    .about-box p {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 1rem;
    }

    footer {
      text-align: center;
      padding: 2rem;
      background: #1e1e1e;
      color: #aaa;
      margin-top: 3rem;
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

    .about-box h2, .products-section h2, .contact-section h2 {
      font-size: 2rem;
      margin-bottom: 1.5rem;
      color: #1e1e1e;
    }

    .about-box p, .products-section p, .contact-section p {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 1rem;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .gallery img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.05);
    }

    



    
  </style>
</head>
<body>
  <header>
    <h1>About Aura Architects</h1>
  </header>

  <div class="container">
    <div class="about-box">
      <h2>Who We Are</h2><div class="about-box">
        
        <div class="gallery">
          <img src="architect.jpg" alt="Aggrement">
      <p><strong>Aura Architects</strong> is a design-driven architecture firm committed to creating spaces that inspire, elevate, and endure. With a deep understanding of form, function, and context, we craft architectural solutions that reflect the unique identity and aspirations of our clients.</p>
      <p>Founded on the belief that great design enhances everyday life, Aura Architects combines innovative thinking with meticulous execution. From concept to completion, we engage closely with clients, consultants, and communities to deliver spaces that are not only aesthetically compelling but also sustainable and functional.</p>
      <img src="plan.jpg" alt="Aggrement"><p>Our portfolio spans residential, commercial, institutional, and interior design projects — each marked by a thoughtful approach to light,
    </div>

    <div class="about-box">
      <h2>Gallery</h2>
      <div class="gallery">
        
        <img src="flowerpot/floowerpot.jpg" alt="Attractive home Items">
        <img src="wallhanging1.jpg" alt="Attractive home Items">
      </div>
    </div>

    <div class="products-section">
      <h2>Modern Home Items</h2>
      <p>In addition to architectural excellence, Aura Architects offers a curated collection of modern and attractive home items. Our products are designed to complement your lifestyle, blending elegance with functionality. Discover statement lighting, sleek furniture, minimalistic decor, and smart storage solutions — all carefully selected to elevate your living space.</p>
    </div>
  </div>

  <footer>
    @Aura Architects
  </footer>
</body>
</html>