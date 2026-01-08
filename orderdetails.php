<?php
session_start();
$host = "localhost";
$dbname = "portfolio_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$isLoggedIn = isset($_SESSION['email']);
$success = "";
$error = "";

$product = null;
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product_result = $stmt->get_result();
    if ($product_result->num_rows === 1) {
        $product = $product_result->fetch_assoc();
    } else {
        $error = "Product not found.";
    }
} else {
    $error = "No product selected.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product) {
    $fullname = htmlspecialchars(trim($_POST["fullname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $quantity = (int) $_POST["quantity"];
    $address = htmlspecialchars(trim($_POST["address"]));

    if ($quantity <= 0) {
        $error = "Quantity must be at least 1.";
    } else {
        $sql = "INSERT INTO orders_d
            (email, fullname, product_id, product_name, category, price, quantity, address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "ssissdis", 
            $email, 
            $fullname, 
            $product['id'], 
            $product['name'], 
            $product['category'], 
            $product['price'], 
            $quantity, 
            $address
        );

        if ($stmt->execute()) {
            $success = "Order placed for $quantity x {$product['name']}!";
        } else {
            $error = "Failed to place order.";
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Place Order</title>
  <style>
    body {
      font-family: Arial;
      background: #f1f1f1;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      background: white;
      margin: 50px auto;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .btn {
      background-color: #007b5e;
      color: white;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #005b4f;
    }

    .message {
      text-align: center;
      font-weight: bold;
      margin: 15px 0;
    }

    .success { color: green; }
    .error { color: red; }

    .product-preview {
      background: #f9f9f9;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Order Details</h2>

  <?php if ($success): ?>
    <div class="message success"><?php echo $success; ?></div>
  <?php elseif ($error): ?>
    <div class="message error"><?php echo $error; ?></div>
  <?php endif; ?>

  <?php if ($product): ?>
    <div class="product-preview">
      <p><strong>Product:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
      <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
      <p><strong>Price:</strong> ₹<?php echo number_format($product['price'], 2); ?></p>
    </div>

    <form method="POST">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required >
          
      </div>

      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>
      </div>

      <div class="form-group">
        <label for="address">Delivery Address</label>
        <textarea id="address" name="address" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn">Place Order</button>
    </form>
  <?php endif; ?>
</div>
</body>
</html>
