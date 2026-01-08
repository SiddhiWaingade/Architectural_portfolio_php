<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username']) == 'admin') {
    header("Location: ../login.php");
    exit();
}

// Fetch all customers with their order statistics
$customers = $conn->query("
    SELECT u.*, 
           COUNT(DISTINCT o.id) as total_orders,
           SUM(oi.quantity * oi.price) as total_spent,
           MAX(o.created_at) as last_order_date
    FROM signup u
    LEFT JOIN orders o ON u.username = o.user_id
    LEFT JOIN order_items oi ON o.id = oi.order_id
    GROUP BY u.username
    ORDER BY total_orders DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management -  Admin</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .customers-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        .customers-table th,
        .customers-table td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }
        .search-box {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary { background: #007bff; color: white; }
        .customer-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            margin: 0;
            color: #666;
        }
        .stat-card p {
            margin: 0.5rem 0 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Customer Management</h1>

        <!-- Customer Statistics -->
        <div class="customer-stats">
            <div class="stat-card">
                <h3>Total Customers</h3>
                <p><?php echo count($customers); ?></p>
            </div>
            <div class="stat-card">
                <h3>Active Customers</h3>
                <p><?php 
                    $active = array_filter($customers, function($c) { 
                        return $c['total_orders'] > 0; 
                    });
                    echo count($active);
                ?></p>
            </div>
            
        </div>

        <!-- Search Box -->
        <input type="text" id="customerSearch" class="search-box" placeholder="Search customers..." onkeyup="searchCustomers()">

        <!-- Customers Table -->
        <table class="customers-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?php echo $customer['username']; ?></td>
                    <td><?php echo htmlspecialchars($customer['username']); ?></td>
                    <td><?php echo htmlspecialchars($customer['email']); ?></td>
                    
                    
                    <td>
                        <button class="btn btn-primary" onclick="viewCustomerDetails(<?php echo $customer['username']; ?>)">View Details</button>
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
    function searchCustomers() {
        const input = document.getElementById('customerSearch');
        const filter = input.value.toLowerCase();
        const table = document.querySelector('.customers-table');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const username = rows[i].getElementsByTagName('td')[1];
            const email = rows[i].getElementsByTagName('td')[2];
            if (username || email) {
                const text = username.textContent + ' ' + email.textContent;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }

    function viewCustomerDetails(customerId) {
        // Implement customer details view
        alert('Customer details view to be implemented');
    }
    </script>
</body>
</html>