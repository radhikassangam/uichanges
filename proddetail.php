

<style>

@media (max-width: 768px) {
    .product-details {
        max-width: 100%;
    }

    .proimages img {
        max-width: 100%;
        height: auto;
    }

    .product-title {
        font-size: 1rem; /* Smaller font for very small screens */
    }

    .col-md-6 {
        width: 100%;
       
    }
    .fix-bottom {
        padding: 15px 5px;
    }

    .product-form {
        flex-direction: column;
        align-items: center;
    }

    .product-qty-form {
        margin-bottom: 10px;
    }

    .input-group {
        flex-direction: column;
        align-items: stretch;
    }

    .input-group label {
        margin-bottom: 5px;
        text-align: center;
    }

    .input-group .form-control {
        max-width: 80px;
        margin: 0 auto 10px auto;
    }

    .input-group button {
        width: 100%;
        margin-bottom: 5px;
    }

    .btn {
        font-size: 14px;
        width: 100%;
        margin-bottom: 10px;
    }

    .whatsappbuy {
        width: 100%;
        text-align: center;
    }
        .quantity-label {
        margin-bottom: 10px;
        text-align: center;
    }

    .quantity-controls {
        width: 100%;
        justify-content: space-between;
    }

    .quantity-controls button {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }

    .quantity-controls .form-control {
        max-width: 60px;
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
   

   
    .product-title {
        font-size: 1rem; /* Smaller font for very small screens */
    }

    
    .fix-bottom {
        padding: 15px 5px;
    }

    .product-form {
        flex-direction: column;
        align-items: center;
    }

    .product-qty-form {
        margin-bottom: 10px;
    }

    .input-group {
        flex-direction: column;
        align-items: stretch;
    }

    .input-group label {
        margin-bottom: 5px;
        text-align: center;
    }

    .input-group .form-control {
        max-width: 80px;
        margin: 0 auto 10px auto;
    }

    .input-group button {
        width: 100%;
        margin-bottom: 5px;
    }

    .btn {
        font-size: 14px;
        width: 100%;
        margin-bottom: 10px;
    }

    .whatsappbuy {
        width: 100%;
        text-align: center;
    }
    .qqqqqqqq {
        display: flex !important;
        align-items: center;
        justify-content: flex-start;
        /* Ensures there is space between the elements */
    }

    .quantity-minus, .quantity-plus {
        width: 35px; /* Adjust width for buttons */
        height: 35px; /* Adjust height for buttons */
        font-size: 20px; /* Adjust font size for icons */
    }

    .quantity {
        width: 60px; /* Adjust input width */
        text-align: center; /* Center the text inside the input */
    }
  .proimages{
    display:none;
    z-index: -1;
  }
    
}


    </style>
    
        <div class="col-md-6 mb-4 mb-md-6 proddd">
        <div class="product-details1 proimages">                 
        <img src="<?php echo !empty($row2['img2']) ? $row2['img2'] : 'Not available';?>" alt="Product Thumb" width="800" height="700">
        </div>
        </div>
                        
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details pppppp; ">
                                <h1 class="product-title; margin-top:-10px"><?php echo !empty($row['pname']) ? $row['pname'] : 'Not available'; ?> </h1>
                                                                <div class="product-bm-wrapper">
                                    <figure class="brand">
                                        <img src="<?php echo !empty($row2['img3']) ? $row2['img3'] : 'Not available';?>" alt="Brand" width="105" height="48" />
                                    </figure>
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category"><a href="#"><?php echo !empty($row['category']) ? $row['category'] : 'Not available'; ?></a></span>
                                        </div>
                                        <div class="product-categories">
                                            Sub Category: <span><?php echo !empty($row['subcat']) ? $row['subcat'] : 'Not available'; ?></span>
                                        </div>
                                        <div class="product-sku">
                                            Wishlist:
                                            <span class="product-category">
                                                <a href="#" style="font-size:15px;" class=" btn-wishlist w-icon-heart" onclick="addToWishlist(37914)" title="Wishlist">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                            </span>
                                            <!--<span class="product-category"><a href="#">Metal</a></span>-->
                                        </div>
                                    </div>
                                </div>
                                <hr class="product-divider">
                        <div class="product-price"style="font-weight:bold "><span style="font-size:30px;color:black;font-family:sans-serif;"> <i class="fa-solid fa-indian-rupee-sign"></i></i> <?php echo !empty($row['price']) ? $row['price'] : 'Not available'; ?></span>  <ins class="new-price"><span style="font-size: 17px!important;color:#e55d29;"><i>(including G.S.T.)</i></span></ins></div>
                               <div class="ratings-container" style="margin:-5px; margin-bottom:10px">
    <a href="login.php" class="rating-reviews">
        <div class="ratings-full">
            <span class="stars">
                <?php
                    $rating = !empty($row['ratings']) ? $row['ratings'] : 0;
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="star fas fa-star"></i>'; // Full star
                        } elseif ($i - 0.5 <= $rating) {
                            echo '<i class="star fas fa-star-half-alt"></i>'; // Half star
                        } else {
                            echo '<i class="star fas fa-star"></i>'; // Empty star
                        }
                    }
                ?>
            </span> <a href="login.php" class="rating-reviews">(<?php echo $rating; ?> Reviews)</a>
            <span class="tooltiptext tooltip-top">Rating: <?php echo $rating; ?> out of 5</span>
        </div>
    </a>
   
</div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-short-desc lh-2">
                                            <ul class="list-type-check list-style-none" style="font-size:15px;">
                                           <li><i class="fa-solid fa-check"></i><span style=" font-weight:bold;">Material :</span> <?php echo !empty($row['material']) ? $row['material'] : 'Not available'; ?></li>
                                          <li>   <li><i class="fa-solid fa-check"></i> <span style=" font-weight:bold;">Color : <span name="orderby" id="color_choose" value="Multicolor">Multicolor</span></li>
                                             <li>  <li><i class="fa-solid fa-check"></i><span style=" font-weight:bold;">Maximum Quantity :</span> <?php echo !empty($row['maxquantity']) ? $row['maxquantity'] : 'Not available'; ?> </li>
                                         <li>  <li><i class="fa-solid fa-check"></i><span style=" font-weight:bold;">Weight :</span> <?php echo !empty($row['weight']) ? $row['weight'] : 'Not available'; ?>                                                                                                                                                                   </li>
                                         <li>
    <div class="row g-2 align-items-center">
        <div class="col-12">
            <label class="visually-hidden" style="font-weight:bold;width:300px">Search Delivery by Pin Code</label>
            <input type="number" class="form-control" min="6" max="6" name="Pin_search" id="Pin_search" placeholder="Enter Your Pin code here">
        </div>
    </div></li><li>
    <div class="row g-2 mt-3">
        <div class="col-12">
            <button type="submit" style="  border-color: #ed711b;
    background-color: #ed711b;width:300px;margin-top:-25px" class="btn btn-primary mb-3" onclick="pincode_search()">Check</button>
        </div>
    </div>
</li>

                                                                                            </ul>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                        <div class="widget widget-icon-box " style="box-shadow:2px 3px 4px rgba(33,33,33,.2)">
                                            <div class="icon-box icon-box-side">
                                                <span class="icon-box-icon text-dark">
                                                <i class="fa-solid fa-tag" style="font-size:4rem"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <h4 class="icon-box-title">Discount available</h4>
                                                    <p style="font-weight:bold;line-height:16px">Rs 50 off on prepaid payment<br />( *conditions apply )</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="product-divider">
                                <!--check in stock-->
                                                                                                            <div class="fix-bottom ">
                                            <div class="product-form container">
                                                <div class="product-qty-form with-label">
                                                 
                                                    <!-- <div class="input-group">
                                     <input class="quantity form-control" style="wwidth:100px" type="number" min="1" max="10000000" id="quantity_data">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                                                                            </div>
                                                </div> -->
                                                <div class="input-group " style="margin:10px">
                                                    <div class="qqqqqqqq">
                                                <label>Quantity:</label>
                                              
        <button class="quantity-minus w-icon-minus" onclick="decreaseQuantity()"><i class="fa-solid fa-minus"></i></button>
        <input class="quantity form-control" type="number" min="1" max="10000000" id="quantity_data" value="1">
        <button class="quantity-plus w-icon-plus" onclick="increaseQuantity()"><i class="fa-solid fa-plus"></i></button>
      </div></div></div>
                                                <button class="btn btn-primary btn-cart" style=" border-color: #ed711b;
    background-color: #ed711b;width:173px; margin-left:15px"onclick="addToCart(37914)">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                                <button class="btn btn-primary btn-cart ml-2" style=" border-color: #ed711b;
    background-color: #ed711b;width:173px;" onclick="buynow(37914)">
                                                 <i class="fa-solid fa-bag-shopping"></i>`
                                                    <span>Buy Now</span>
                                                </button>
                                                <button class="btn btn-primary btn-cart whatsappbuy whatsapp-button" style="display:block; border-color: #ed711b;
    background-color: #ed711b;width:173px;margin-left:5px">
                                                    <!-- <button class="" style="height:43px; width:173px;"> -->
                                                        <i class="fab fa-whatsapp"></i>
                                                        <span>&nbsp;Order Now</span>
                                                    <!-- </button> -->
    </button>
                                            </div>
                                            <div id="cart_success">
                                            </div>
                                        </div>
                                                                                                    <!--check in stock ends-->
                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin" style="text-decoration:none">
                                             <a href="https://www.facebook.com/dialog/share?app_id=664104045723432&display=popup&href=https://uthhanecom.gergstore.com/Product/productDescription?id=37914&redirect_uri=https://uthhanecom.gergstore.com/Product/productDescription?id=37914" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="http://twitter.com/share?text=uthhan_ecommerce&url=https://uthhanecom.gergstore.com/Product/productDescription?id=37914" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="http://pinterest.com/pin/create/button/?url=https://uthhanecom.gergstore.com/Product/productDescription?id=37914&description=Metal tray with center mirror and Glass Jars with metal lid" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="https://wa.me/?text=https://uthhanecom.gergstore.com/Product/productDescription?id=37914" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <!--<a href="https://www.linkedin.com/shareArticle?url=https://uthhanecom.gergstore.com/'Product/productDescription?id='.37914"><i class="fab fa-linkedin"></i></a>-->                                           <a href="https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Futhhanecom.gergstore.com%2FProduct%2FproductDescription%3Fid%3D37914" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                                                </div>
                                              