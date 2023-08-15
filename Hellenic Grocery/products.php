<?php
// Replace these variables with your own database credentials
$host = 'localhost';
$username = 'root';
$password = 'HellenicGrocery';
$database = 'hellenic_grocery';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

// Include your database connection here

// Fetch and display products from the database
// Example:
$products = [
    ['id' => 1, 'name' => 'Greek Salad', 'price' => 9.99],
    ['id' => 2, 'name' => 'Moussaka', 'price' => 12.99],
    // Add more products here
];
?>

<?php
// Establish database connection (as shown above)

// Fetch and display products from the database
$products = [];
$sql = "SELECT id, name, price FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!-- Rest of your HTML and PHP code for product listing -->


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content same as index.html -->
</head>
<body>
    <!-- Header content same as index.html -->

    <main>
        <section class="product-listing">
            <h2>Our Products</h2>
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
