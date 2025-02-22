<?php
@include("includes/db.php");

$limit = 6; // Display only 6 products

// Fetch products with images
$sql = "SELECT p.id, p.pname, p.category, p.price, p.ratings, pi.main_img 
        FROM product p
        LEFT JOIN product_img_table pi ON p.id = pi.product_id
        LIMIT $limit";
$result = $conn->query($sql);
?>

<div class="tab tab-nav-boxed tab-nav-outline">
    <ul class="nav nav-tabs justify-content-center" role="tablist">
        <li class="nav-item mr-2 mb-2">
            <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New Arrivals</a>
        </li>
        <li class="nav-item mr-0 mb-2">
            <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
        </li>
        <li class="nav-item mr-2 mb-2">
            <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Express Products</a>
        </li>
    </ul>
</div>

<div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
    <div class="row g-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($product = $result->fetch_assoc()): 
                $main_img = $product['main_img'] ?: 'assets/images/default_product.jpg';
            ?>
                <div class="col-6 col-md-4 col-lg-2"> 
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($main_img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['pname']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($product['pname']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['category']) ?></p>
                            <p class="card-text">₹<?= number_format($product['price'], 2) ?></p>
                            <p class="card-text text-warning">⭐ <?= number_format($product['ratings'], 1) ?> / 5</p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No products found.</p>
        <?php endif; ?>
    </div>
</div>


<div class="text-center mt-4">
    <a href="home.php" class="btn btn-orange">Show More...</a>
  </div>
  <style>
    .btn-orange {
        display: inline-block;
        border: 2px solid #ed711b;
        background-color: #ed711b;
        width: 300px;
        margin-top: -25px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none; /* Remove underline for <a> */
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .btn-orange:hover {
        background-color: #d66014;
        border-color: #d66014;
        color: white;
    }
</style>
