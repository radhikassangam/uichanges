<?php

$product_name = $row['pname'];
//$product_id =  $row['id']; // Example product ID
$category_name = $row['category']; // Example category
$sub_category_name = $row['subcat']; // Example subcategory
$previous_product = ["id" => 1, "name" => "Samsung", "image" => "assets/images/img1.jpg"];
$next_product = ["id" => 51370, "name" => "Worlpool Refrigerator", "image" => "assets/images.img3.jpg"];



?>

<nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
        <li><a href="index.php"  style="color:black;font-weight:bold;font-size: 20px;">Home</a></li><i class="fa-solid fa-greater-than" style="font-size:10px;margin-top:10px"></i>
        <li><a href="#" style="color:#ed711b;font-weight:bold;font-size: 20px;"><?php echo $category_name; ?></a></li><i  style="font-size:10px;margin-top:10px"class="fa-solid fa-greater-than"></i>
        <li><a href="#"  style="color:black;font-weight:bold;font-size: 20px;"><?php echo $sub_category_name; ?></a></li>
        <i class="fa-solid fa-greater-than" style="color:black;font-weight:bold;font-size:10px;margin-top:10px"></i><li style="margin-top:7px"><?php echo $product_name; ?></li>
    </ul>
    <ul class="product-nav list-style-none">
        <!-- Previous Product -->
        <li class="product-nav-prev">
            <a href="productDescription.php?id=<?php echo $previous_product['id']; ?>&name=<?php echo urlencode($previous_product['name']); ?>">
            <i style="font-size:10px" class="fa-solid fa-less-than"></i>
           
            </a>
            <span class="product-nav-popup">
                <img src="<?php echo $previous_product['image']; ?>" alt="Product" width="110" height="110" />
                <span class="product-name"><?php echo $previous_product['name']; ?></span>
            </span>
        </li>

        <!-- Next Product -->
        <li class="product-nav-next">
            <a href="productDescription.php?id=<?php echo $next_product['id']; ?>&name=<?php echo urlencode($next_product['name']); ?>">
            <i style="font-size:10px" class="fa-solid fa-greater-than"></i>
            </a>
            <span class="product-nav-popup">
                <img src="<?php echo $next_product['image']; ?>" alt="Product" width="110" height="110" />
                <span class="product-name"><?php echo $next_product['name']; ?></span>
            </span>
        </li>
    </ul>
</nav>
         <!-- End of Breadcrumb -->