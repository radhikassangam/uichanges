<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Images</title>
</head>
<body>
    <h2>Insert Product Images</h2>
    <form action="img_insert.php" method="POST" enctype="multipart/form-data">
        <label for="product_id">Product ID:</label>
        <input type="number" name="product_id" id="product_id" required><br><br>

        <label for="main_img">Main Image:</label>
        <input type="file" name="main_img" id="main_img" required><br><br>

        <label for="img1">Image 1:</label>
        <input type="file" name="img1" id="img1"><br><br>

        <label for="img2">Image 2:</label>
        <input type="file" name="img2" id="img2"><br><br>

        <label for="img3">Image 3:</label>
        <input type="file" name="img3" id="img3"><br><br>

        <label for="img4">Image 4:</label>
        <input type="file" name="img4" id="img4"><br><br>

        <button type="submit" name="submit">Insert Images</button>
    </form>
</body>
</html>
<?php
$host = 'localhost';
$dbname = 'gemstore'; // Replace with your database name
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
// Check if form is submitted
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];

    // Handling file uploads
    $target_dir = "assets/images/"; // Directory to save images
    
    $main_img = $target_dir . basename($_FILES["main_img"]["name"]);
    $img1 = $target_dir . basename($_FILES["img1"]["name"]);
    $img2 = $target_dir . basename($_FILES["img2"]["name"]);
    $img3 = $target_dir . basename($_FILES["img3"]["name"]);
    $img4 = $target_dir . basename($_FILES["img4"]["name"]);

    // Move uploaded files to the target directory
    move_uploaded_file($_FILES["main_img"]["tmp_name"], $main_img);
    move_uploaded_file($_FILES["img1"]["tmp_name"], $img1);
    move_uploaded_file($_FILES["img2"]["tmp_name"], $img2);
    move_uploaded_file($_FILES["img3"]["tmp_name"], $img3);
    move_uploaded_file($_FILES["img4"]["tmp_name"], $img4);

    // SQL Insert query
    $sql = "INSERT INTO `product_img_table` (`product_id`, `main_img`, `img1`, `img2`, `img3`, `img4`) 
            VALUES (:product_id, :main_img, :img1, :img2, :img3, :img4)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':main_img', $main_img);
    $stmt->bindParam(':img1', $img1);
    $stmt->bindParam(':img2', $img2);
    $stmt->bindParam(':img3', $img3);
    $stmt->bindParam(':img4', $img4);

    // Execute the query
    if ($stmt->execute()) {
        echo "Product images inserted successfully.";
    } else {
        echo "Error inserting product images.";
    }
}
?>
