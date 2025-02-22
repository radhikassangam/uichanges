

<?php
// Include database connection
include('includes/db.php');

// Assuming you have the product ID (for example, product ID = 1)
$product_id = 2; // You can dynamically get this from a URL or form input

// SQL query to fetch a single product by its ID
$sql = "SELECT * FROM product WHERE id = $product_id"; // Adjust the column name if needed
$result = $conn->query($sql);
$sql1= "SELECT * FROM productdetails WHERE product_id = $product_id";
$result1 = $conn->query($sql1);
$sql2= "SELECT * FROM product_img_table WHERE product_id = $product_id";
$result2 = $conn->query($sql2);
// Check if product exists
if ($result->num_rows > 0) {
    if ($result1->num_rows > 0) {
        if ($result2->num_rows > 0) {
    $row = $result->fetch_assoc();
    $row1 = $result1->fetch_assoc();
    $row2=$result2->fetch_assoc();
     // echo $row1['product_id'];  
    

?>
<style>
    .product-details123{
        display:none;
    }
    @media (max-width: 480px) {
        .product-details123{
        display:block;
        padding:10px;
        margin-bottom:-10px;
    }  
    }
    </style>
<!-- Start of Breadcrumb -->

 <!-- End of Breadcrumb -->
 <!-- Start of Main -->
<!-- Start of Main -->
<main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <?php
 @include('pages/Mainbread.php');
 ?>

 <!-- Product details -->
 <div class="page-content ">

        <div class="product-details123">                 
        <img src="<?php echo !empty($row2['img2']) ? $row2['img2'] : 'Not available';?>" alt="Product Thumb" width="800" height="700">
        </div>
    
 <div class="container">
 <?php
 @include('proddetail.php');
 ?> 
     <!-- Description part -->
  <?php
 @include('description.php');
 ?>    
</div></div>
                        </main>
<?php

}else {
    echo "image details not found.";
   }
}else {
 echo "Product details not found.";
}
} else {
 echo "Product not found.";
}

// Close connection
$conn->close();
?>