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


// Fetch filter values
$filter_email = $_GET['email'] ?? '';
$filter_product = $_GET['product_name'] ?? '';
$filter_category = $_GET['category'] ?? '';

// Build query dynamically
$sql = "SELECT * FROM orders_d WHERE 1";
$params = [];
$types = "";

if (!empty($filter_email)) {
    $sql .= " AND email LIKE ?";
    $params[] = "%" . $filter_email . "%";
    $types .= "s";
}
if (!empty($filter_product)) {
    $sql .= " AND product_name LIKE ?";
    $params[] = "%" . $filter_product . "%";
    $types .= "s";
}
if (!empty($filter_category)) {
    $sql .= " AND category LIKE ?";
    $params[] = "%" . $filter_category . "%";
    $types .= "s";
}

$stmt = $conn->prepare($sql);
if ($types) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Report</title>
  <style>
    body { font-family: Arial; background: #f7f7f7; padding: 20px; }
    .filter-form, table { margin-bottom: 20px; background: #fff; padding: 20px; border-radius: 10px; }
    .form-group { margin-bottom: 10px; }
    label { display: block; font-weight: bold; }
    input[type="text"] { width: 100%; padding: 8px; }
    .btn { padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 6px; cursor: pointer; }
    .btn:hover { background: #007bff; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
    th { background: #007bff; color: white; }
  </style>
</head>
<body>

<h2>Order Report</h2>

<form method="GET" class="filter-form">
  <div class="form-group">
    <label for="email">Filter by Email</label>
    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($filter_email); ?>">
  </div>

  <div class="form-group">
    <label for="product_name">Filter by Product Name</label>
    <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($filter_product); ?>">
  </div>

  <div class="form-group">
    <label for="category">Filter by Category</label>
    <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($filter_category); ?>">
  </div>

  <button type="submit" class="btn">Apply Filter</button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Full Name</th>
      <th>Product_Id</th>
      <th>Product</th>
      <th>Category</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
      <th>Address</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['fullname']); ?></td>
          <td><?php echo htmlspecialchars($row['product_id']); ?></td>
          <td><?php echo htmlspecialchars($row['product_name']); ?></td>
          <td><?php echo htmlspecialchars($row['category']); ?></td>
          <td>₹<?php echo number_format($row['price'], 2); ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>₹<?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
          <td><?php echo htmlspecialchars($row['address']); ?></td>
          <td><?php echo $row['created_at'] ?? 'N/A'; ?></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="10" style="text-align:center;">No orders found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

</body>
</html>
