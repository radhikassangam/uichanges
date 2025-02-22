<?php
@include("includes/db.php");

$protype = isset($_GET['protype']) ? $_GET['protype'] : 'newarrival';
$limit = 5; // Show 5 products per page

// Fetch products based on protype
$sql = "SELECT p.id, p.pname, p.category, p.price, p.ratings, pi.main_img 
        FROM product p
        LEFT JOIN product_img_table pi ON p.id = pi.product_id
        WHERE p.protype = ?
        ORDER BY p.id DESC 
        LIMIT ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $protype, $limit);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0): ?>
    <div class="row g-4 justify-content-center">
        <?php while ($product = $result->fetch_assoc()): 
            $main_img = $product['main_img'] ?: 'assets/images/default_product.jpg';
        ?>
            <div class="col-6 col-md-4 col-lg-2 d-flex">
    <div class="card h-100 w-100" onclick="storeRecentlyViewed(<?= htmlspecialchars(json_encode($product)) ?>)">
        <img src="<?= htmlspecialchars($main_img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['pname']) ?>">
        <div class="card-body text-center">
            <h5 class="card-title"><b><?= htmlspecialchars($product['pname']) ?></b></h5>
            <p class="card-text">₹<?= number_format($product['price'], 2) ?></p>
            <p class="card-text text-warning">⭐ <?= number_format($product['ratings'], 1) ?> / 5</p>
        </div>
    </div>
</div>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <p class="text-center">No products found.</p>
<?php endif; ?>

<div class="text-center mt-4">
    <a href="home.php" class="btn btn-orange">Show More...</a>
  </div>