<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO main_categories (name) VALUES ('$name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New main category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label for="name">Main Category Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" name="submit">Add Main Category</button>
</form>
