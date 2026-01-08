<?php
session_start();

// Log the logout activity if admin was logged in
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {
    require_once('db.php');
    
    // Log the logout activity
    $admin_id = $_SESSION['admin_id'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $stmt = $conn->prepare("INSERT INTO admin_activity_log (admin_id, action, ip_address, description) VALUES (?, 'logout', ?, 'Admin logged out')");
    $stmt->bind_param("is", $admin_id, $ip);
    $stmt->execute();
}

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>