


<div class="header-middle" style="background-color:#fef1da61;">
        <div class="container">
            <div class="header-left ">
              
                <a href="#" class=" browsethings" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="fa-solid fa-list" style="font-size:40px;padding-top:15px"></i>
                        </a>
                <a href="#" class="mobile-menu-toggle w-icon-hamburger" aria-label="menu-toggle"></a>
                <a href="https://uthhanecom.gergstore.com/" class="logo ml-lg-0">
                    <img src="https://uthhanecom.gergstore.com//assets/logo_final.png" alt="logo" class="orglogo" />
                </a>
                <a href="https://play.google.com/store/apps/details?id=com.boss.flutter_application_1" class="google-play-button">
                    <div class="svg-container">
                        <img src="https://uthhanecom.gergstore.com/assets/images/google-play.png">
                    </div>
                    <div class="text-container">
                        <span class="small-text">GET IT ON</span>
                        <span class="large-text">Google Play</span>
                    </div>
                </a>
                <a href="#" class=" browsethings1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="fa-solid fa-bag-shopping" style="font-size:40px;padding-top:15px"></i>
                        </a>
               
                        <form method="get" action="searchwcat.php" class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex" style="background-color:;" autocomplete="on" spellcheck="true">
    <div class="search-container">
        <?php 
        @include("includes/db.php");// Query to fetch categories from the 'main_categories' table
        $sql = "SELECT `id`, `name` FROM `main_categories`";
        $result = $conn->query($sql);
        ?>

        <div class="select-box">
            <select id="category" name="category" class="form-select">
                <option value="All" <?= isset($_GET['category']) && $_GET['category'] == 'All' ? 'selected' : '' ?>>All Categories</option>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($category = $result->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($category['name']) ?>" <?= isset($_GET['category']) && $_GET['category'] == $category['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endwhile; ?>
                <?php else: ?>
                    <option value="">No categories found</option>
                <?php endif; ?>
            </select>
        </div>

        <input type="text" class="form-control" name="search" id="search" placeholder="Search for products & more" oninput="search_product()" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required autocomplete="on" spellcheck="true" />
        
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    
    <div id="search_option" style="position:absolute;z-index:100;top:30px;width:100%"></div>
</form>

            </div>
            <div class="header-right ml-4 test">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class=""><i class="fa-solid fa-phone"></i></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:uthhanops123@gmail.com" class="text-capitalize">Live Chat</a> or :
                        </h4>
                        <a href="tel:+91 7353155800" class="phone-number font-weight-bolder ls-50">+91 7353155800</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="https://uthhanecom.gergstore.com/My_Account/my_Wishlist">
                <i class="fa-regular fa-heart" style="font-size:30px"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                <div class="dropdown cart-dropdown  mr-0 mr-lg-2">
                    <div id="cart_data">
                                                    <a href="https://uthhanecom.gergstore.com/Product/cart" class="cart-toggle label-down link">
                                                    <i class="fa-solid fa-cart-shopping" style="font-size:30px">
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                                            </div>
                </div>
            </div>
        </div>
    </div>