<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Hellenic Grocery</title>
</head>
<body>
    <?php
	// Replace with your database credentials
	$host = 'localhost';
	$username = 'root';
	$password = 'HellenicGrocery';
	$database = 'hellenic_grocery';
        $message = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Create a connection to the database
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize and validate user input
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $category = $_POST["category"];

        // Upload image file
        $uploadDir = "uploads/"; // Directory to upload images
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            $imageUrl = $imagePath;

            // Insert new product
            $sql = "INSERT INTO products (name, description, price, image_url, category)
                    VALUES ('$name', '$description', $price, '$imageUrl', '$category')";

            if ($conn->query($sql) === TRUE) {
                $message = "New product added successfully.";
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Error uploading image.";
        }

        $conn->close();
    }
    ?>

    <h2>Add a New Product</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        
        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br>
        
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>
        
        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        
        <label for="category">Category:</label>
        <input type="text" name="category" required><br>
        
        <input type="submit" value="Add Product">
    </form>

    <?php echo $message; ?>
</body>
</html>
