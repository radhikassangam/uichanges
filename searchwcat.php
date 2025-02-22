<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Navigation</title>
    <link rel="stylesheet" href="assets/css/middle.css">
    <link rel="stylesheet" href="assets/css/top.css">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/all_pro.css">
    <link rel="stylesheet" href="assets/css/bottom.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/proddetails.css">
    <link rel="stylesheet" href="assets/css/mainbread.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/productdetail.js"></script>
      <!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <style>
        
        body {
            font-family:  sans-serif;
            margin: 0;
            padding: 0;
            width:100%;
    min-height: 100vh;
}
       
    </style>
</head>
<body>
<?php
  @include('pages/top.php')
  ?>
<!-- end of top part -->
 <!-- middle part -->
  <?php
  @include('pages/middle.php')
  ?>
  <!-- end of middle part -->


   <!-- bottom part -->
   <?php
  @include('pages/bottom.php')
  ?>



<!-- main part -->
<?php
@include("includes/db.php");
$limit = 12; // Number of products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? '%' . $conn->real_escape_string($_GET['search']) . '%' : '%';
$category = isset($_GET['category']) && $_GET['category'] != 'All' ? $conn->real_escape_string($_GET['category']) : null;

$sql = "SELECT p.id, p.pname, p.category, p.price, p.ratings, pi.main_img 
        FROM product p
        LEFT JOIN product_img_table pi ON p.id = pi.product_id 
        WHERE p.pname LIKE ?";

if ($category) {
    $sql .= " AND p.category = ?";
}

$sql .= " LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);

if ($category) {
    $stmt->bind_param("ssii", $search, $category, $limit, $offset);
} else {
    $stmt->bind_param("sii", $search, $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

// Count total products for pagination
$count_sql = "SELECT COUNT(*) AS total FROM product p WHERE p.pname LIKE ?";

if ($category) {
    $count_sql .= " AND p.category = ?";
}

$count_stmt = $conn->prepare($count_sql);

if ($category) {
    $count_stmt->bind_param("ss", $search, $category);
} else {
    $count_stmt->bind_param("s", $search);
}

$count_stmt->execute();
$count_result = $count_stmt->get_result();
$count_row = $count_result->fetch_assoc();
$total_products = $count_row['total'];

// Calculate total pages
$total_pages = ceil($total_products / $limit);
?>

<div class="container12 my-4">
    <div class="row g-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($product = $result->fetch_assoc()):
                $main_img = $product['main_img'] ?: 'assets/images/default_product.jpg';
            ?>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($main_img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['pname']) ?>">
                        <div class="card-body" style="text-align:center">
                            <h5 class="card-title"><?= htmlspecialchars($product['pname']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['category']) ?></p>
                            <p class="card-text" style="text-align:center"> ₹<?= number_format($product['price'], 2) ?></p>
                            <p class="card-text text-warning">⭐ <?= number_format($product['ratings'], 1) ?> / 5</p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No products found.</p>
        <?php endif; ?>
    </div>

    <?php
// Preserve existing search and category filters
$queryParams = [];
if (!empty($_GET['search'])) {
    $queryParams['search'] = urlencode($_GET['search']);
}
if (!empty($_GET['category']) && $_GET['category'] != 'All') {
    $queryParams['category'] = urlencode($_GET['category']);
}

// Convert parameters to query string
$queryString = !empty($queryParams) ? '&' . http_build_query($queryParams) : '';
 if ($total_pages > 1): ?>
     <nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php 
        $query_params = http_build_query([
            'search' => isset($_GET['search']) ? $_GET['search'] : '',
            'category' => isset($_GET['category']) ? $_GET['category'] : 'All'
        ]);
        ?>

        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?<?= $query_params ?>&page=<?= $page - 1 ?>">Previous</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?<?= $query_params ?>&page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?<?= $query_params ?>&page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>

</div>

<!-- end of main part -->
        <?php
                    @include('footer.php');
                    ?>
</body>
</html>
