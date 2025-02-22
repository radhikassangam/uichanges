<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $main_category_id = $_POST['main_category_id'];

    $sql = "INSERT INTO first_categories (name, main_category_id) VALUES ('$name', '$main_category_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New first-level category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label for="name">First-Level Category Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="main_category_id">Main Category:</label>
    <select id="main_category_id" name="main_category_id" required>
        <?php
        $result = $conn->query("SELECT * FROM main_categories");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select>

    <button type="submit" name="submit">Add First-Level Category</button>
</form>
