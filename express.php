<?php
@include("includes/db.php");

$protype ='newarrival';
$limit = 10; // Fetch more products for smooth looping

// Fetch products from database
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
?>

<marquee behavior="scroll" direction="left" scrollamount="6" class="flashing-heading">
    <h2>🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery!🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery!🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery!🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery! 🚀 Express Delivery! 🚀</h2>
</marquee>

<div class="marquee-container">
    <div class="product-scroll">
        <?php 
        if ($result->num_rows > 0): 
            $products = [];
            while ($product = $result->fetch_assoc()):
                $products[] = $product;
            endwhile;
          
            foreach (array_merge($products, $products) as $product):
                $main_img = $product['main_img'] ?: 'assets/images/default_product.jpg';
        ?>
            <div class="item-box">
              
                <img src="<?= htmlspecialchars($main_img) ?>" class="item-image" alt="<?= htmlspecialchars($product['pname']) ?>">
                
                <div class="product-info">
                    <h4 class="item-name"><?= htmlspecialchars($product['pname']) ?></h4>
                    <p class="item-price">₹<?= number_format($product['price'], 2) ?></p>
                    <p class="item-rating">⭐ <?= number_format($product['ratings'], 1) ?> / 5</p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>

<!-- CSS Styling -->
<style>
  
    body {
        font-family: Arial, sans-serif;
        background: #f9f9f9;
    }

    .flashing-heading h2 {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        display: inline-block;
        animation: colorFlash 2s infinite alternate;
        
    }

    @keyframes colorFlash {
        0% { color: rgb(232, 109, 82); }
        50% { color: rgb(255, 170, 51); }
        100% { color: rgb(181, 52, 84); }
    }

    
    .marquee-container {
        /* width: 100%; */
        overflow: hidden;
        position: relative;
        white-space: nowrap;
        padding: 10px 0;
margin-top:0px;
    max-width: 1200px; /* Adjust width as needed */
    margin: 50px auto; /* Centers the container with space on both sides */
    /* padding: 0 40px; Ensures space inside the container */
    text-align: center;
    }


    .product-scroll {
        display: flex;
        align-items: center;
        gap: 15px; /* Reduce gap */
        animation: scrollLeft 10s linear infinite;
    }

   
    @keyframes scrollLeft {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%);
        }
    }

   
    .item-box {
        width: 220px; 
        flex-shrink: 0; /* Prevents shrinking */
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 10px;
        transition: transform 0.3s ease-in-out;
        position: relative;
        overflow: hidden;
    }

    .item-box:hover {
        transform: scale(1.05);
    }

  
    .item-image {
        width: 100%;
        height: 160px; /* Adjusted height */
        object-fit: fixed;
        border-radius: 8px;
    }

    
    .product-info {
        padding: 10px 0;
    }

    .item-name {
        font-size: 16px;
        font-weight: bold;
        margin: 8px 0 5px;
        color: #333;
    }

    .item-price {
        font-size: 14px;
        color: #d66014;
        font-weight: bold;
    }

    .item-rating {
        font-size: 12px;
        color: #ffaa00;
    }
</style>
