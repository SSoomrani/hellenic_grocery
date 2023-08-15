<?php
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
$sql = "SELECT id, name, price, image_url FROM products WHERE category = 'Fresh Food'";
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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!-- Header content as needed -->
    </header>
    <main>
        <section class="product-listing">
            <h2> Cans and Tins </h2>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p class="price">$<?php echo $product['price']; ?></p>
                        <a href="product_details.php?id=<?php echo $product['id']; ?>">View Details</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <!-- Footer content as needed -->
    </footer>
</body>
</html>
