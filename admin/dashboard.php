<?php
session_start();
if (!isset($_SESSION['username'])  == 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .admin-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        .admin-card h3 {
            margin-bottom: 1rem;
        }
        .admin-card a {
            color: #333;
            text-decoration: none;
        }
        .admin-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Admin Dashboard</h1>
        <div class="admin-grid">
            <div class="admin-card">
                <h3>Products</h3>
                <a href="products.php">Manage Products</a>
            </div>
            <div class="admin-card">
                <h3>Categories</h3>
                <a href="categories.php">Manage Categories</a>
            </div>
            <div class="admin-card">
                <h3>Orders</h3>
                <a href="orders.php">View Orders</a>
            </div>
            <div class="admin-card">
                <h3>Customers</h3>
                <a href="customers.php">Customer Information</a>
            </div>
            <div class="admin-card">
                <h3>Reports</h3>
                <a href="reports.php">View Reports</a>
            </div>
            <div class="admin-card">
                <h3>Settings</h3>
                <a href="settings.php">System Settings</a>
            </div>
            
        </div>
        <div style="text-align: right; margin-top: 2rem;">
            <a href="logout.php" style="color: red;">Logout</a>
        </div>
    </div>
</body>
</html>
