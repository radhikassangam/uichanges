<?php
// Include database connection
include('includes/db.php');

// Assuming you have the product ID (for example, product ID = 1)
$product_id = 2; // You can dynamically get this from a URL or form input

// SQL query to fetch a single product by its ID
$sql = "SELECT * FROM product WHERE id = $product_id"; // Adjust the column name if needed
$result = $conn->query($sql);

// Check if product exists
if ($result->num_rows > 0) {
    // Fetch the product details
     $row = $result->fetch_assoc();
    
    // echo "<div class='product'>";
    // echo "<h3>" . $row['product_name'] . "</h3>"; // Assuming column 'product_name'
    // echo "<p>Price: $" . $row['price'] . "</p>"; // Assuming column 'price'
    // echo "<p>" . $row['description'] . "</p>"; // Assuming column 'description'
    // echo "</div>";
} else {
    echo "Product not found.";
}

?>
