<?php
include('../includes/db.php');

// Fetch all main categories (fixed)
$main_categories = $conn->query("SELECT * FROM main_categories");

// Fetch first-level categories based on selected main category
$first_categories = [];

    $result = $conn->query("SELECT * FROM first_categories ");
    $first_categories = $result->fetch_all(MYSQLI_ASSOC);


// Insert second-level category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $main_category_id = $_POST['main_category_id'];
    $first_category_id = $_POST['first_category_id'];

    // Insert the new second-level category
    $sql = "INSERT INTO second_categories (name, first_category_id, main_category_id) VALUES ('$name', '$first_category_id', '$main_category_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New second-level category added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label for="main_category_id">Main Category:</label>
    <select id="main_category_id" name="main_category_id" onchange="this.form.submit()" required>
        <option value="">Select Main Category</option>
        <?php
        // Populate main categories (fixed)
        while ($row = $main_categories->fetch_assoc()) {
            echo "<option value='{$row['id']}'" . (isset($_POST['main_category_id']) && $_POST['main_category_id'] == $row['id'] ? " selected" : "") . ">{$row['name']}</option>";
        }
        ?>
    </select>

    <?php if (!empty($first_categories)): ?>
    <label for="first_category_id">First-Level Category:</label>
    <select id="first_category_id" name="first_category_id" required>
        <option value="">Select First-Level Category</option>
        <?php
        // Populate first-level categories based on the selected main category
        foreach ($first_categories as $first_category) {
            echo "<option value='{$first_category['id']}'>{$first_category['name']}</option>";
        }
        ?>
    </select>
    <?php endif; ?>

    <label for="name">Second-Level Category Name:</label>
    <input type="text" id="name" name="name" required>

    <button type="submit" name="submit">Add Second-Level Category</button>
</form>
