<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$where = "";
if (!empty($_GET['email'])) {
    $email = $conn->real_escape_string($_GET['email']);
    $where .= " AND email LIKE '%$email%'";
}
if (!empty($_GET['name'])) {
    $name = $conn->real_escape_string($_GET['name']);
    $where .= " AND name LIKE '%$name%'";
}

$sql = "SELECT * FROM contact_form WHERE 1 $where ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Report</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            background-color: #00703C;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        th {
            background-color: #00703C;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #eafce7;
        }

        @media(max-width: 600px) {
            form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<h2>📩 Contact Form Report</h2>

<div class="container">
    <form method="GET">
        <input type="text" name="email" placeholder="Filter by Email" value="<?= $_GET['email'] ?? '' ?>">
        <input type="text" name="name" placeholder="Filter by Name" value="<?= $_GET['name'] ?? '' ?>">
        <button type="submit">Apply Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= htmlspecialchars($row["email"]); ?></td>
                        <td><?= htmlspecialchars($row["name"]); ?></td>
                        <td><?= nl2br(htmlspecialchars($row["message"])); ?></td>
                        <td><?= $row["created_at"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No contact messages found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
