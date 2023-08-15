
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

// Fetch and display product details from the database based on $_GET['id']
// Example:
$product_id = $_GET['id'];
$product = [
    'id' => $product_id,
    'name' => 'Greek Salad',
    'description' => 'A delicious Greek salad made with fresh vegetables...',
    'price' => 9.99,
    // Add more details here
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content same as index.html -->
</head>
<body>
    <!-- Header content same as index.html -->

    <main>
        <section class="product-details">
            <h2><?php echo $product['name']; ?></h2>
            <p class="price">$<?php echo $product['price']; ?></p>
            <p><?php echo $product['description']; ?></p>
            <!-- Add more details here -->
        </section>
    </main>

    <!-- Footer content same as index.html -->
</body>
</html>
