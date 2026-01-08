<?php
session_start();
require_once('db.php');

// Fetch categories from categories table
$categories_query = "SELECT id, name FROM categories ORDER BY name";
$categories_result = $conn->query($categories_query);

// Get cart count if user is logged in
$cart_count = 0;
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $cart_query = "SELECT COUNT(*) as count FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($cart_query);
    $stmt->bind_param("i", $id);  // fixed $user_id bug
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_count = $result->fetch_assoc()['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home Decor - AURA Architects</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; margin:0; }
        .head { background-color: #333; color: white; text-align: center; padding: 20px 0; font-size: 24px; }
        nav { padding: 1rem 2rem; display: flex; justify-content: center; gap: 2rem; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);}
        nav a { color: black; text-decoration: none; font-weight: 500; position: relative; transition: color 0.3s ease;}
        nav a:hover { color: brown; }
        .products { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; padding: 20px; max-width: 1200px; margin: 0 auto;}
        .product-card { background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: 0.3s; overflow: hidden; margin-bottom: 20px;}
        .product-card:hover { transform: translateY(-5px);}
        .product-card img { width: 100%; height: 300px; object-fit: cover;}
        .product-info { padding: 15px; text-align: center;}
        .product-info h3 { font-size: 18px; margin-bottom: 10px; color: #333;}
        .product-info p { color: maroon; font-weight: bold; margin-bottom: 15px;}
        .product-info button { padding: 10px 20px; background: olive; color: white; border: none; border-radius: 5px; cursor: pointer;}
        .product-info button:hover { background: #333; }
        .category-title { text-align: center; margin: 30px 0; color: #333; font-size: 24px; }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="AURA_Architects.php">Home</a>
            <a href="services.php">Services</a>
            <a href="homedecor.php">Decor Items</a>
            <a href="aboutus.php">About</a>
            <a href="contactus.php">Contact</a>
            <?php if(isset($_SESSION['id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="head">🛒 Home Decor Items</div>

    <?php while($category = $categories_result->fetch_assoc()): 
        $category_id = $category['id'];
        $category_name = $category['name'];

        $products_query = "SELECT * FROM products WHERE category_id = ? LIMIT 4";
        $stmt = $conn->prepare($products_query);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $products_result = $stmt->get_result();

        if ($products_result->num_rows > 0): // show only if products exist
    ?>
        <h2 class="category-title"><?php echo htmlspecialchars($category_name); ?></h2>
        <section class="products">
            <?php while($product = $products_result->fetch_assoc()): ?>
                <div class="product-card">
                    <a href="product_details.php?id=<?php echo $product['id']; ?>">
                        <img src="uploads/<?php echo htmlspecialchars($product['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </a>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p>₹<?php echo number_format($product['price'], 2); ?></p>
                        <a href="orderdetails.php?id=<?php echo $product['id']; ?>">
                            <button>Buy Now</button>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; endwhile; ?>

</body>
</html>
