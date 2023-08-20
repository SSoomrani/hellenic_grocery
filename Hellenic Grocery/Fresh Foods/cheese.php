<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection code
$host = 'localhost';
$username = 'root';
$password = 'HellenicGrocery';
$database = 'hellenic_grocery';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch fresh food products from the database
$products = [];
$sql = "SELECT id, name, price, image_url FROM products WHERE category = 'Cheese'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Foods - Hellenic Grocery</title>
    
    
</head>
    <style>
    
    /* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Basic styling for body and text */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: lightslategray;
}

/* Header styling */
header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1rem 0;
}

header h1 {
    margin: 0;
    font-size: 2rem;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
}

/* Main content styling */
.main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Featured products section */
.featured-products {
    text-align: center;
    margin-bottom: 2rem;
}

/* Product listing styling */
.product-listing ul {
    list-style: none;
    padding: 0;
}

.product-listing li:last-child {
    border-bottom: none;
}
        
.product-listing li .price {
    margin-left: 0;
}


.price {
    font-weight: bold;
    margin-left: 10px;
    color: #e74c3c;
}

/* Product details styling */
.product-details {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product-details h2 {
    margin-bottom: 10px;
}

/* Footer styling */
footer {
    text-align: center;
    padding: 1rem 0;
    background-color: #333;
    color: #fff;
}

/* ... Your existing CSS styles ... */

/* Product listing styling */
.product-listing h3 {
    margin-top: 20px;
    font-size: 1.5rem;
    cursor: pointer;
}

.product-listing ul.active {
    display: block; /* Display active subcategory list */
    margin-bottom: 20px;
}

/* Add some styling for the dropdown arrow */
.product-listing h3::after {
    content: '\25BC'; /* Downward-pointing triangle (▼) */
    display: inline-block;
    margin-left: 5px;
    font-size: 1rem;
}

/* Change the arrow direction for active subcategories */
.product-listing ul.active + h3::after {
    content: '\25B2'; /* Upward-pointing triangle (▲) */
}

/* Dropdown menu styles */
.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: black;
    border: 1px solid white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    padding: 10px;
}

/* ... Your existing CSS styles ... */

    </style>
<body>
    
    <!-- Header content same as index.html -->
    <main>
        <section class="product-listing">
            <h2> Cheese </h2>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <a href="product_details.php?id=<?php echo $product['id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                        <span class="price">$<?php echo $product['price']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <!-- Footer content same as index.html -->
</body>
</html>

