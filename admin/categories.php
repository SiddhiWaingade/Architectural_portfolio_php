<?php
session_start();
include 'db.php'; // make sure this connects to your database

// ✅ Check admin session
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

// ✅ Slug generation
function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text ?: 'n-a';
}

// ✅ Handle category operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);

                // Check required fields
                if (!empty($name) && !empty($description) && isset($_FILES['image'])) {

                    // Handle image upload
                    $target_dir = "../uploads/";
                    if(!is_dir($target_dir)) mkdir($target_dir, 0777, true);

                    $image_name = time() . '_' . basename($_FILES['image']['name']); // unique name
                    $target_file = $target_dir . $image_name;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

                        // Debugging: Check the image path
                        echo "Image uploaded to: " . $target_file . "<br>";

                        // Generate unique slug
                        $slug = slugify($name);
                        $original_slug = $slug;
                        $counter = 1;
                        while ($conn->query("SELECT id FROM categories WHERE slug='$slug'")->num_rows > 0) {
                            $slug = $original_slug . '-' . $counter;
                            $counter++;
                        }

                        // Insert into DB
                        $stmt = $conn->prepare("INSERT INTO categories (name, description, slug, image_path) VALUES (?, ?, ?, ?)");
                        if (!$stmt) die("Prepare failed: " . $conn->error);
                        $stmt->bind_param("ssss", $name, $description, $slug, $target_file);
                        if (!$stmt->execute()) {
                            echo "Execute failed: " . $stmt->error;
                        } else {
                            echo "<script>alert('Category added successfully');</script>";
                        }
                    } else {
                        echo "<script>alert('Image upload failed');</script>";
                    }

                } else {
                    echo "<script>alert('Please fill all fields and select an image');</script>";
                }
                break;

            // Edit & Delete logic stays the same
        }
    }
}

// ✅ Fetch all categories
$categories = $conn->query("SELECT c.*, COUNT(p.id) as product_count 
                             FROM categories c 
                             LEFT JOIN products p ON c.id = p.category_id 
                             GROUP BY c.id")->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Categories</title>
<style>
/* Styles stay same */
 .admin-container { max-width: 1200px; margin: 2rem auto; padding: 2rem; }
    .category-form { background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; }
    .category-form input, .category-form textarea { width: 100%; padding: 0.5rem; margin-bottom: 1rem; }
    .category-table { width: 100%; border-collapse: collapse; }
    .category-table th, .category-table td { padding: 1rem; border: 1px solid #ddd; }
    .btn { padding: 0.5rem 1rem; border: none; border-radius: 5px; cursor: pointer; }
    .btn-primary { background: #007bff; color: white; }
    .btn-danger { background: #dc3545; color: white; }
</style>
</head>
<body>
<div class="admin-container">
    <h1>Manage Categories</h1>

    <!-- Add Category Form -->
    <div class="category-form">
        <h2>Add New Category</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <input type="text" name="name" placeholder="Category Name" required>
            <textarea name="description" placeholder="Category Description" required></textarea>
            <label>Category Image:</label>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>

    <!-- Categories Table -->
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo htmlspecialchars($category['name']); ?></td>
                <td><?php echo htmlspecialchars($category['description']); ?></td>
                <td><?php echo htmlspecialchars($category['slug']); ?></td>
                <td><?php echo $category['product_count']; ?></td>
                <td>
                    <form action="" method="POST" style="display: inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <button class="btn btn-primary" onclick="editCategory(<?php echo $category['id']; ?>)">Edit</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function editCategory(id) {
    alert('Edit functionality to be implemented for ID: ' + id);
}
</script>
</body>
</html>
