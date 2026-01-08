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
    <h1>Vases</h1>
    <p>Not just a vase. A statement of style and grace.</p>
  </header>

  <section class="product-container">
    <div class="product-box">
      <img src="flowerpot/floowerpot.jpg" alt="flowerpot ">
      <h3>Flowerpot </h3>
      <p class="price">₹499</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="flowerpot/flowepot1.jpg" alt="flowerpot ">
      <h3> Wooden flowerpot </h3>
      <p class="price">₹599</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="flowerpot/flowepot2.jpg" alt="flowerpot  ">
      <h3>Wooden flowerpot </h3>
      <p class="price">₹450</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="flowerpot/wooden flowepot.jpg" alt="flowerpot ">
      <h3>Wooden flowerpot </h3>
      <p class="price">₹700</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="flowerpot/floerpot4.jpg" alt="flowerpot ">
      <h3>Ring Shaper Planter<br>Set of 2 </h3>
      <p class="price">₹600</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>

    <div class="product-box">
        <img src="flowerpot/flowerpot3.jpg" alt="lippen art">
        <h3>Golden glossy indoor Metal Planter</h3>
        <p class="price">₹699</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="flowerpot/flowerpot6.jpg" alt="showpiece">
        <h3>Decorative vase</h3>
        <p class="price">₹1,299</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="flowerpot/large decorative flower vase.jpg" alt="flowerpot">
        <h3> large decorative flower vase</h3>
        <p class="price">₹1,500</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="flowerpot/flowerpot1.jpg" alt="showpiece">
        <h3>Ceramic Indoor Outdoor planter </h3>
        <p class="price">₹700</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      <div class="product-box">
        <img src="flowerpot/flowerpot2.jpg" alt="showpiece">
        <h3>Black Vase<br>Set of 3</h3>
        <p class="price">₹1,119</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      
  </section>
</body>
</html>
