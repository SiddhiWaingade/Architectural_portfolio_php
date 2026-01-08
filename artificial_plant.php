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
    <h1>Artificial plant</h1>
    <p>Forever green. Forever fresh.</p>
  </header>

  <section class="product-container">
    <div class="product-box">
      <img src="plant/plant1.jpg" alt="Artificial plant ">
      <h3>Artificial plant</h3>
      <p class="price">₹299</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="plant/plant10.jpg" alt="Artificial plant ">
      <h3>Artificial plant</h3>
      <p class="price">₹150</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="plant/plant11.jpg" alt="Artificial plant ">
      <h3>Artificial plant </h3>
      <p class="price">₹250</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="plant/plant2.jpg" alt="Artificial plant">
      <h3>Artificial plant </h3>
      <p class="price">₹149</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>
    </div>
    <div class="product-box">
      <img src="plant/plant3.jpg" alt="Artificial plant ">
      <h3>Artificial plant<br>Pack of 3 </h3>
      <p class="price">₹349</p>
      <a href="orderdetails.php"><button>Buy Now</button></a>

    <div class="product-box">
        <img src="plant/plant4.jpg" alt="Artificial plant">
        <h3>Artificial plant</h3>
        <p class="price">₹499</p>
        <a href="orderdetails.php"><button>Add to Cart</button></a>
      </div>
      <div class="product-box">
        <img src="plant/plant5.jpg" alt="Artificial plant">
        <h3>Artificial plant</h3>
        <p class="price">₹349</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="plant/plant6.jpg" alt="Artificial plant">
        <h3> Artificial plant</h3>
        <p class="price">₹249</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="plant/plant7.jpg" alt="Artificial plant">
        <h3>Artificial plant</h3>
        <p class="price">₹399</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>

      <div class="product-box">
        <img src="plant/plant8.jpg" alt="Artificial plant">
        <h3>Artificial plant</h3>
        <p class="price">₹299</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      <div class="product-box">
        <img src="plant/plant9.jpg" alt="Artificial plant">
        <h3>Artificial plant</h3>
        <p class="price">₹499<br>pack of 4</p>
        <a href="orderdetails.php"><button>Buy Now</button></a>
      </div>
      
  </section>
</body>
</html>
