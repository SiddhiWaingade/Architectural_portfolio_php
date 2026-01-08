
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vases</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family:Arial, Helvetica, sans-serif;
  background-color: #fff9f2;
  color: #5a3e36;
  padding: 20px;
}

header {
  text-align: center;
  margin-bottom: 40px;
}

header {
  background-color:#5a3e36;
  color: white;
  text-align: center;
  padding: 10px 0;
  font-size: 15px;
}

.product-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 25px;
}

.product-box {
  background-color: #fff;
  border-radius: 12px;
  padding: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
  text-align: center;
  transition: transform 0.3s ease;
}



.product-box img {
  max-width: 100%;
  border-radius: 10px;
  height: 200px;
  object-fit: cover;
  margin-bottom: 15px;
}

.product-box h3 {
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.price {
  
  color: #c97336;
  margin-bottom: 10px;
}

button {
  background-color: #7a4f2c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: olive;
}
  </style>
</head>
<body>
  <header>
    <h1>Lights and Lamps</h1>
    <p>Where design meets divine light.</p>
  </header>

  <section class="product-container">
    <div class="product-box">
      <img src="lamps/modern lamps.jpg" alt="lights ">
      <h3>Metal coated Wall Lamp</h3>
      <p class="price">₹1,000</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="lamp/lamp1.jpg" alt="lights  ">
      <h3> Lights <br>set of 5  </h3>
      <p class="price">₹1,499</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="lamp/lamp2.jpg" alt="lights  ">
      <h3>Wall Lamp </h3>
      <p class="price">₹450</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="lamp/lamp4.jpg" alt="lights  ">
      <h3> Lights <br>set of 4 </h3>
      <p class="price">₹700</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="lamp/lamp3.jpg" alt="lights  ">
      <h3> Lights <br>set of 3 </h3>
      <p class="price">₹600</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>

    <div class="product-box">
        <img src="lamp/lamp5.jpg" alt="lights ">
        <h3> Lights <br>set of 3</h3>
        <p class="price">₹899</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="lamp/lamp6.jpg" alt="lights ">
        <h3> Lights <br>set of 5</h3>
        <p class="price">₹1,299</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="lamp/lamp7.jpg" alt="lights ">
        <h3> Lights <br>set of 2</h3>
        <p class="price">₹1,000</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="lamp/lamp8.jpg" alt="lights ">
        <h3>Lights <br>Set of 2 </h3>
        <p class="price">₹700</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      <div class="product-box">
        <img src="lamp/lamp9.jpg" alt="lights ">
        <h3>Lights</h3>
        <p class="price">₹1,000</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      <div class="product-box">
        <img src="lamp/lamp10.jpg" alt="lights ">
        <h3>Lights In ball Shape<br>set of 12</h3>
        <p class="price">₹1,119</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      <div class="product-box">
        <img src="lamps/wall lamp2.jpg" alt="lights ">
        <h3>Antique Wall Lamps.</h3>
        <p class="price">₹999</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="lamps/wall lamps.jpg" alt="lights ">
        <h3>Antique Wall Lamps.</h3>
        <p class="price">₹999</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      
  </section>
</body>
</html>
