<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username']) == 'admin') {
    header("Location: ../login.php");
    exit();
}

// Get date range from query parameters or default to last 30 days
$end_date = date('Y-m-d');
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-30 days'));
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : $end_date;

// Fetch sales data
$sales_query = $conn->query("
    SELECT DATE(o.created_at) as date,
           COUNT(DISTINCT o.id) as order_count,
           SUM(oi.quantity * oi.price) as revenue,
           COUNT(DISTINCT o.user_id) as customers
    FROM orders o
    LEFT JOIN order_items oi ON o.id = oi.order_id
    WHERE DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'
    GROUP BY DATE(o.created_at)
    ORDER BY date DESC
");
$sales_data = $sales_query->fetch_all(MYSQLI_ASSOC);

// Calculate totals
$total_revenue = array_sum(array_column($sales_data, 'revenue'));
$total_orders = array_sum(array_column($sales_data, 'order_count'));
$avg_order_value = $total_orders > 0 ? $total_revenue / $total_orders : 0;

// Top selling products
$top_products = $conn->query("
    SELECT p.name, 
           SUM(oi.quantity) as total_sold,
           SUM(oi.quantity * oi.price) as revenue
    FROM products p
    JOIN order_items oi ON p.id = oi.product_id
    JOIN orders o ON oi.order_id = o.id
    WHERE DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'
    GROUP BY p.id
    ORDER BY total_sold DESC
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Category performance
$category_performance = $conn->query("
    SELECT c.name,
           COUNT(DISTINCT o.id) as order_count,
           SUM(oi.quantity) as items_sold,
           SUM(oi.quantity * oi.price) as revenue
    FROM categories c
    JOIN products p ON c.id = p.category_id
    JOIN order_items oi ON p.id = oi.product_id
    JOIN orders o ON oi.order_id = o.id
    WHERE DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'
    GROUP BY c.id
    ORDER BY revenue DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - FashionFiesta Admin</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        .stat-card p {
            margin: 0.5rem 0 0;
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }
        .chart-container {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        .data-table th,
        .data-table td {
            padding: 0.8rem;
            border: 1px solid #ddd;
            text-align: left;
        }
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
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Business Reports</h1>

        <!-- Date Filter -->
        <form class="date-filter">
            <input type="date" name="start_date" value="<?php echo $start_date; ?>">
            <input type="date" name="end_date" value="<?php echo $end_date; ?>">
            <button type="submit" class="btn">Apply Filter</button>
        </form>

        <!-- Key Metrics -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <p>$<?php echo number_format($total_revenue, 2); ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Orders</h3>
                <p><?php echo $total_orders; ?></p>
            </div>
            <div class="stat-card">
                <h3>Average Order Value</h3>
                <p>$<?php echo number_format($avg_order_value, 2); ?></p>
            </div>
        </div>

        <!-- Sales Chart -->
        <div class="chart-container">
            <canvas id="salesChart"></canvas>
        </div>

        <!-- Top Products -->
        <h2>Top Selling Products</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Units Sold</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo $product['total_sold']; ?></td>
                    <td>$<?php echo number_format($product['revenue'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Category Performance -->
        <h2>Category Performance</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Orders</th>
                    <th>Items Sold</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category_performance as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td><?php echo $category['order_count']; ?></td>
                    <td><?php echo $category['items_sold']; ?></td>
                    <td>$<?php echo number_format($category['revenue'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top: 2rem;">
            <a href="dashboard.php" class="btn">Back to Dashboard</a>
        </div>
    </div>

    <script>
    // Sales Chart
    const salesData = <?php echo json_encode($sales_data); ?>;
    const dates = salesData.map(item => item.date);
    const revenues = salesData.map(item => item.revenue);
    const orders = salesData.map(item => item.order_count);

    new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Revenue',
                data: revenues,
                borderColor: '#007bff',
                fill: false
            }, {
                label: 'Orders',
                data: orders,
                borderColor: '#28a745',
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
</html>