<?php
include 'db.php'; // database connection

$usernameFilter = isset($_GET['username']) ? trim($_GET['username']) : '';
$emailFilter    = isset($_GET['email']) ? trim($_GET['email']) : '';

// Build dynamic query
$sql = "SELECT * FROM signup WHERE 1=1";
$params = [];
$types = "";

if (!empty($usernameFilter)) {
    $sql .= " AND username LIKE ?";
    $params[] = "%$usernameFilter%";
    $types .= "s";
}

if (!empty($emailFilter)) {
    $sql .= " AND email LIKE ?";
    $params[] = "%$emailFilter%";
    $types .= "s";
}

$stmt = $conn->prepare($sql);
if ($types && $params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup Report</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    h2 {
      text-align: center;
      margin-top: 30px;
    }

    .filter-box {
      background-color: #fff;
      padding: 20px;
      margin: 20px auto;
      width: 95%;
      max-width: 1100px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .filter-box input {
      width: 100%;
      max-width: 350px;
      padding: 10px;
      margin: 5px 10px 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .filter-box button {
      padding: 10px 20px;
      background-color: #007b5e;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .filter-box button:hover {
      background-color: #005b4f;
    }

    table {
      width: 95%;
      max-width: 1100px;
      margin: 0 auto 40px auto;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #006d4c;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    @media screen and (max-width: 768px) {
      .filter-box input {
        width: 100%;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>

<h2>Signup Report</h2>

<div class="filter-box">
  <form method="get">
    <input type="text" name="email" placeholder="Filter by Email" value="<?= htmlspecialchars($emailFilter) ?>" />
    <input type="text" name="username" placeholder="Filter by Username" value="<?= htmlspecialchars($usernameFilter) ?>" />
    <button type="submit">Apply Filter</button>
  </form>
</div>

<table>
  <thead>
    <tr>
      
      <th>Email</th>
      <th>Username</th>
      <th>Password</th>
      <th>Signup Date</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
       
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['password']) ?></td>
        <td><?= $row['created_at'] ?? 'N/A' ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
