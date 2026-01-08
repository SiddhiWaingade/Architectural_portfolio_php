<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username']) == 'admin') {
    header("Location: ../login.php");
    exit();
}

// Get date range from query parameters or default to last 30 days
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-30 days'));
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

$sql = "
    SELECT o.*, 
           s.username AS customer_name,
           s.email AS customer_email,
           SUM(oi.quantity * oi.price) AS total_amount,
           COUNT(oi.id) AS total_items
    FROM orders_d o
    LEFT JOIN signup s ON o.fullname = s.username
    LEFT JOIN order_items oi ON o.id = oi.order_id
    
    
";

$orders_query = $conn->query($sql);

if (!$orders_query) {
    die("Query failed: " . $conn->error);
}

$orders_d = $orders_query->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        .orders-table th,
        .orders-table td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }
        .status-badge {
            padding: 0.5rem;
            border-radius: 5px;
            font-size: 0.9rem;
        }
        .status-pending { background: #ffeeba; color: #856404; }
        .status-processing { background: #b8daff; color: #004085; }
        .status-shipped { background: #c3e6cb; color: #155724; }
        .status-delivered { background: #d4edda; color: #155724; }
        .status-cancelled { background: #f5c6cb; color: #721c24; }
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary { background: #007bff; color: white; }
        .date-filter {
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .date-filter input {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Order Management</h1>

        <!-- Date Filter -->
        <form class="date-filter">
            <input type="date" name="start_date" value="<?php echo $start_date; ?>">
            <input type="date" name="end_date" value="<?php echo $end_date; ?>">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Orders Table -->
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>email_id</th>
                    <th>Items</th>
                    <th>Total Amount</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders_d as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo htmlspecialchars($order['fullname']); ?><br></td>
                    <td> <?php echo htmlspecialchars($order['email']); ?></td>
                    <td><?php echo htmlspecialchars($order['product_name']); ?><br></td>
                    <td>$<?php echo number_format($order['price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($order['category']); ?><br></td>
                       
                
                    <td><?php echo date('Y-m-d H:i', strtotime($order['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="viewOrderDetails(<?php echo $order['id']; ?>)">View Details</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top: 2rem;">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>

    <script>
    function viewOrderDetails(orderId) {
        // Implement order details view
        alert('Order details view to be implemented');
    }
    </script>
</body>
</html>