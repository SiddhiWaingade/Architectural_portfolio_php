<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body {
    background: url('log.jpg') no-repeat center center/cover;
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
      height: -1px;
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
    
      width: 80px; /* control width */
      height:80px; /* control height */
      border-left: 25px solid orange;
  
      transform: rotate(45deg);
      position: relative;
      
    }

    
    .caret-up::before {
      content: "";
      position:absolute;
      top: 0px;
      left: -3px;
      width: 70%;
      height: 80%;
      
      border-right: 25px solid black;
      transform: rotate(-90deg);
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0px 30px;
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
    
        <div class="logo" style="color:maroon;" >🏠 AURA ARCHITECTS<br><h6 style="color:black;">ARCHITECT | LANDSCAPE | INTERIOR DESIGNER</h6></div>
        
        <nav>
          <a href="AURA_Architects.php">Home</a>
          <a href="services.php">Services</a>
          <a href="login.php">Login</a>
          <a href="homedecor.php">Decor Items</a>
          <a href="aboutus.php">About</a>
          <a href="contactus.php">Contact</a>
        </nav>
      </header>
      <center>
    
    <img src="services.jpg" width="600" height="700">
</center>
</body>
</html>