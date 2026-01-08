<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Antique Showpieces</title>
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
    <h1>Wall Decor Items</h1>
    <p>A touch of art. A wall full of heart.</p>
  </header>

  <section class="product-container">
    <div class="product-box">
      <img src="wall hanging/1.jpg" alt="home decor items">
      <h3>Metal Rajasthani Musicians </h3>
      <p class="price">₹2,499</p>
     <a href="orderdetails.php"> <button>Add to Cart</button></a>
    </div>
    <div class="product-box">
      <img src="wall hanging/2.jpg" alt="home decor items">
      <h3> Metal Bike</h3>
      <p class="price">₹1,999</p>
      <a href="orderdetails.php"> <button>Add to Cart</button></a>
    </div>
    <div class="product-box">
      <img src="wall hanging/4.jpg" alt="home decor items">
      <h3>Metal Modern Home Decor item</h3>
      <p class="price">₹3,299</p>
      <a href="orderdetails.php"> <button>Add to Cart</button></a>
    </div>
    <div class="product-box">
      <img src="wall hanging/5.jpg" alt="home decor items">
      <h3>Handmade Lippen Art </h3>
      <p class="price">₹1,250</p>
      <a href="orderdetails.php"> <button>Add to Cart</button></a>
    </div>
    <div class="product-box">
      <img src="wall hanging/6.jpg" alt="home decor items">
      <h3>Handmade Mirror Lippen Art</h3>
      <p class="price">₹1,499</p>
      <a href="orderdetails.php"> <button>Add to Cart</button></a>
    </div>

    <div class="product-box">
        <img src="wall hanging/7.jpg" alt="home decor items">
        <h3> Lippen Art</h3>
        <p class="price">₹1,999</p>
        <a href="orderdetails.php"> <button>Add to Cart</button></a>
      </div>
      <div class="product-box">
        <img src="wall hanging/8.jpg" alt="home decor items">
        <h3>Lippen Art</h3>
        <p class="price">₹2,299</p>
        <a href="orderdetails.php"> <button>Add to Cart</button></a>
      </div>
      <div class="product-box">
        <img src="wallhanging1.jpg" alt="home decor items">
        <h3> Handmade beautiful Wallpiece</h3>
        <p class="price">₹5,250</p>
        <a href="orderdetails.php"> <button>Add to Cart</button></a>
      </div>
      <div class="product-box">
        <img src="wall hanging/9.jpg" alt="home decor items">
        <h3>Handmade Lippen Art</h3>
        <p class="price">₹1,499</p>
        <a href="orderdetails.php"> <button>Add to Cart</button></a>
      </div>

      
  </section>
</body>
</html>
