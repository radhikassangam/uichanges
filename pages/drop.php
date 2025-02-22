
<?php
include('includes/db.php');
if ($conn) {
    $main_categories = $conn->query("SELECT * FROM main_categories");
} else {
    die("Database connection not established.");
}
?>
<style>
/* Make sure the dropdown menu is always visible */
.dropdown-menu.show {
    display: block !important;
    visibility: visible;
}

/* Style the second-level dropdown menu */
.dropend .dropdown-menu {
    left: 100%;
    top: 0;
    margin-top: -1px; /* Align to the top of the parent dropdown */
    display: none; /* Initially hidden */
    visibility: hidden; /* Initially hidden */
}

/* Display second-level menu when hovered or active */
.dropend:hover .dropdown-menu,
.dropend .dropdown-menu.show {
    display: block;
    visibility: visible;
}

/* Optional: Adjust the width of second-level dropdown menu */
.dropend .dropdown-menu.droping {
    width: 200px; /* Adjust based on your design */
}

/* Style the dropdown button */
.dropdown .btn {
    background-color: #007bff;
    color: #fff;
    border-radius: 0.25rem;
    border: none; /* Optional: Remove the border */
}

/* Remove background color from dropdown menu */
.dropdown-menu {
    border-radius: 0.25rem;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    background-color: white !important; /* No background color */
}

/* Style the dropdown items without background color */
.dropdown-item {
    padding: 10px 20px;
    color: #333;
    background-color: transparent; /* No background color */
}

/* Optional: Style for disabled items */
.dropdown-item.text-muted {
    color: #6c757d !important;
}


    </style>
<div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container-fluid">
            <div class="inner-wrap">
                <div class="header-left">
                
                <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Browse Categories
  </button>
  <ul class="dropdown-menu">
    <?php
    // Fetch all main categories
    $main_categories = $conn->query("SELECT * FROM main_categories");

    if ($main_categories->num_rows > 0) {
        while ($row = $main_categories->fetch_assoc()) {
            // Sanitize category name
            $main_category_name = htmlspecialchars($row['name']);
            $main_category_id = $row['id'];
            ?>
            <li>
              <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $main_category_name; ?>
                </button>
             
                 <?php
                  // Fetch second-level categories for each main category
                $second_categories = $conn->query("SELECT * FROM second_categories WHERE main_category_id = {$main_category_id}");

                // If second-level categories exist, display them in a dropend submenu
                if ($second_categories->num_rows > 0) {
                    echo "<ul class='dropdown-menu droping'>";
                    while ($second_row = $second_categories->fetch_assoc()) {
                        $second_category_name = htmlspecialchars($second_row['name']);
                        echo "<li><a class='dropdown-item' href='#'>{$second_category_name}</a></li>";
                    }
                    echo "</ul>";
                }  ?>
            
              </div>
            </li>
            <?php
        }
    } else {
        echo "<li class='dropdown-item text-muted'>No categories available</li>";
    }
    ?>
  </ul>
</div>


                    <nav class="main-nav ml-4">
                        <ul class="menu">
                            <li>
                                <a href="https://uthhanecom.gergstore.com/home/UthhanGovtPartnerships">Uthhan-Govt. Partnerships</a>
                            </li>
                            <li class="active">
                                <a href="https://uthhanecom.gergstore.com/">Home</a>
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/home/about_us">About Us</a>
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/home/contactUs">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">Craft Shop </a>
                                <!-- <ul>
                                    <li><a href="https://uthhanecom.gergstore.com/Product/shop">Shop By Products</a></li>
                                    <li><a href="https://uthhanecom.gergstore.com/Product/all_artisan">Shop By Artisan</a></li>
                                </ul> -->
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/Product/festival_Product">Wednesday Sales</a>
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/Gift_Card">Gift Card</a>
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/product/express"><span style="padding:2px; border: 2.5px solid coral; animation: mymove 5s infinite;">Express Products</span></a>
                            </li>
                            <li>
                                <a href="https://uthhanecom.gergstore.com/Tools_Row_Materials/tools_row_materials">Tools & Raw Materials </a>
                                <ul>
                                                                        
                                                                    </ul>
                            </li>
                       
            
                   <li> <a href="https://uthhanecom.gergstore.com/home/donateUs" class="d-xl-show"><i class="fa-solid fa-heart-pulse"></i>&nbsp;&nbsp; Donate Us</a>
</li>
<li> <a href="https://uthhan.gergstore.com/" class="d-xl-show"><i class="fa-regular fa-star"></i>&nbsp;&nbsp;Know Our Story</a>
</li>     </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('.category-toggle').on('click', function() {
    var dropdown = $(this).closest('.category-dropdown');
    var isVisible = dropdown.data('visible') === 'true';
    dropdown.data('visible', !isVisible);
});


</script>