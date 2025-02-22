<?php
@include("includes/db.php");

$limit = 10; // Number of products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$total_sql = "SELECT COUNT(*) AS total FROM product";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

$sql = "SELECT p.id, p.pname, p.category, p.price, p.ratings, pi.main_img 
        FROM product p
        LEFT JOIN product_img_table pi ON p.id = pi.product_id
        LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>
 <style>
       <style>
        body {
            font-family: Arial, sans-serif;
        }
        .containerpro {
    max-width: 1200px; /* Adjust width as needed */
    margin: 40px auto; /* Centers the container with space on both sides */
    /* padding: 0 40px; Ensures space inside the container */
    text-align: center;
}
      
        .card {
            transition: transform 0.2s ease-in-out;
            border: none;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 320px;
            object-fit: cover;
        }
        .product-wrapper {
    padding: 1%;
    box-shadow: rgb(33 33 33 / 20%) 7px 0px 14px 0px;
    border-radius: 10px;
    background: #fff;
    display: flex;
    justify-content: center;  /* Centers horizontally */
    align-items: center;  /* Centers vertically */
    flex-wrap: wrap;  /* Ensures proper wrapping if needed */
    text-align: center;  /* Ensures text inside products is centered */
    height:auto;
}

.product-wrapper .row {
    display: flex;
    justify-content: center; /* Centers products inside the row */
    flex-wrap: wrap; /* Ensures products wrap if necessary */
}
@media (max-width: 768px) {
    .product-wrapper .col-6 {
        flex: 0 0 50% !important;  /* Ensures 2 products per row */
        max-width: 50% !important;
    }
}

@media (max-width: 480px) {
    .product-wrapper .col-6 {
        flex: 0 0 50% !important;
        max-width: 50% !important;
    }
}
        .heading {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 15px;
            text-align:center;
        }
        
</style>

<div class="containerpro my-4">
<div class="heading">All Products</div>
   
<div class="row g-4">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($product = $result->fetch_assoc()): ?>
            <?php $main_img = !empty($product['main_img']) ? htmlspecialchars($product['main_img']) : 'assets/images/default_product.jpg'; ?>
            <div class="col-6 col-md-4 col-lg-2"> <!-- 6 per row on small screens, 4 per row on medium, 2 per row on large -->
                <div class="card h-100">
                    <img src="<?= $main_img ?>" class="card-img-top" alt="<?= htmlspecialchars($product['pname']) ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($product['pname']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['category']) ?></p>
                        <p class="card-text text-dark">₹<?= number_format($product['price'], 2) ?></p>
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

    <!-- Pagination -->
    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
