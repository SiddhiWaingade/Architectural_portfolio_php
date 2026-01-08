<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username']) == 'admin') {
    header("Location: ../login.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        if ($key !== 'submit') {
            $stmt = $conn->prepare("UPDATE system_settings SET setting_value = ? WHERE setting_key = ?");
            $stmt->bind_param("ss", $value, $key);
            $stmt->execute();
        }
    }
    $success = "Settings updated successfully!";
}

// Fetch all settings grouped by category
$settings_query = $conn->query("SELECT * FROM system_settings ORDER BY setting_group, setting_key");
$settings = [];
while ($row = $settings_query->fetch_assoc()) {
    $settings[$row['setting_group']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Settings </title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .settings-group {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .btn-primary {
            background: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>System Settings</h1>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <?php foreach ($settings as $group => $group_settings): ?>
            <div class="settings-group">
                <h2><?php echo ucfirst($group); ?> Settings</h2>
                
                <?php foreach ($group_settings as $setting): ?>
                <div class="form-group">
                    <label for="<?php echo $setting['setting_key']; ?>">
                        <?php echo ucwords(str_replace('_', ' ', $setting['setting_key'])); ?>
                    </label>
                    
                    <?php if ($setting['setting_key'] === 'site_description'): ?>
                        <textarea name="<?php echo $setting['setting_key']; ?>" id="<?php echo $setting['setting_key']; ?>" rows="3"><?php echo htmlspecialchars($setting['setting_value']); ?></textarea>
                    <?php elseif (strpos($setting['setting_key'], 'password') !== false): ?>
                        <input type="password" name="<?php echo $setting['setting_key']; ?>" id="<?php echo $setting['setting_key']; ?>" value="<?php echo htmlspecialchars($setting['setting_value']); ?>">
                    <?php elseif ($setting['setting_key'] === 'payment_gateway'): ?>
                        <select name="<?php echo $setting['setting_key']; ?>" id="<?php echo $setting['setting_key']; ?>">
                            <option value="stripe" <?php echo $setting['setting_value'] === 'stripe' ? 'selected' : ''; ?>>Stripe</option>
                            <option value="paypal" <?php echo $setting['setting_value'] === 'paypal' ? 'selected' : ''; ?>>PayPal</option>
                        </select>
                    <?php else: ?>
                        <input type="text" name="<?php echo $setting['setting_key']; ?>" id="<?php echo $setting['setting_key']; ?>" value="<?php echo htmlspecialchars($setting['setting_value']); ?>">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>

            <button type="submit" name="submit" class="btn btn-primary">Save Settings</button>
        </form>

        <div style="margin-top: 2rem;">
            <a href="dashboard.php" class="btn">Back to Dashboard</a>
        </div>
    </div>

    <script>
    // Add any JavaScript for dynamic form behavior here
    document.getElementById('payment_gateway').addEventListener('change', function() {
        const stripeFields = document.querySelectorAll('[id^="stripe_"]');
        const paypalFields = document.querySelectorAll('[id^="paypal_"]');
        
        if (this.value === 'stripe') {
            stripeFields.forEach(field => field.closest('.form-group').style.display = 'block');
            paypalFields.forEach(field => field.closest('.form-group').style.display = 'none');
        } else {
            stripeFields.forEach(field => field.closest('.form-group').style.display = 'none');
            paypalFields.forEach(field => field.closest('.form-group').style.display = 'block');
        }
    });
    </script>
</body>
</html>