
<?php
include('includes/db.php');
if ($conn) {
    $main_categories = $conn->query("SELECT * FROM main_categories");
} else {
    die("Database connection not established.");
}
?>
<style>
  /* Ensure that the dropdown button uses flexbox */
.dropdown-toggle {
  display: flex;
  justify-content: space-between; /* Space out the text and the arrow */
  width: 100%; /* Make sure the button takes full width to allow space between items */
  text-align: left; /* Align the text to the left */
  padding-right: 1.5rem; /* Give some space to the right so the arrow doesn't touch the text */
}

/* Adjust the dropdown arrow to stay on the right */
.dropdown-toggle::after {
  margin-left: 0; /* Remove any left margin from the caret */
  margin-right: 0; /* Ensure no right margin */
}

/* Make sure the dropdown menu is always visible */
.dropdown-menu.show {
    display: block !important;
    visibility: visible;
  
}

/* Style the second-level dropdown menu */
.dropend .dropdown-menu {
    left: 100%;
    top: 0;
    /* margin-left:50px; */
    margin-top: -10px; /* Align to the top of the parent dropdown */
    display: none; /* Initially hidden */
    visibility: hidden; /* Initially hidden */
position:absolute;
   width:250px;
   right:100%;
   
 
   
}

/* Display second-level menu when hovered or active */
.dropend:hover .dropdown-menu,
.dropend .dropdown-menu.show {
    display: block;
    visibility: visible;
   
}

/* Optional: Adjust the width of second-level dropdown menu */
.dropend .dropdown-menu.droping {
    width: 300px; /* Adjust based on your design */
}
.droping {
    width: 600px; /* Adjust based on your design */
    margin-left:40px;
    position:absolute;
}
/* Style the dropdown button */
.dropdown .btn {
    background-color: #007bff;
    color: #fff;
    border-radius: 0.25rem;
    border: none; /* Optional: Remove the border */
}



/* Style the dropdown items without background color */
.dropdown-item {
    border-bottom: 1px solid #ddd;  /* Adds a light border at the bottom */
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
                
                <div class="dropdown category-dropdown">
                <a href="#" class="category-toggle text-white category-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="fa-solid fa-list"></i>
                            <span>Browse Categories</span>
                        </a>
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
            <li class="dropdown-item">
                <div class="btn-group dropend">
                <div style="display: flex; justify-content: space-between; align-items: center;">
    <span style="flex: 1; text-align: left;"><?php echo $main_category_name; ?></span>
    <a style="text-align: right !important; padding-right: 30px;" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      
    </a>
</div>
                    <?php
                    // Fetch distinct first-level categories (subcategories) for the current main category
                    $first_categories_query = $conn->query("SELECT DISTINCT first_category_id FROM second_categories WHERE main_category_id = {$main_category_id}");

                    if ($first_categories_query->num_rows > 0) {
                        // Loop through each distinct first_category_id
                        echo '<ul class="dropdown-menu droping">'; // Start the dropdown for first categories
                        while ($first_category_row = $first_categories_query->fetch_assoc()) {
                            $first_category_id = $first_category_row['first_category_id'];

                            // Fetch the name of the first category
                            $first_category_sql = "SELECT name FROM first_categories WHERE id = {$first_category_id}";
                            $first_category_result = $conn->query($first_category_sql);

                            if ($first_category_result->num_rows > 0) {
                                $first_category = $first_category_result->fetch_assoc();
                                echo '<li class="dropdown-submenu">';
                                echo '<h5 style="padding-top:10px">' . htmlspecialchars($first_category['name']) . '</h5>';

                                // Fetch second categories for the current first_category_id
                                $second_categories_sql = "SELECT name FROM second_categories WHERE first_category_id = {$first_category_id} AND main_category_id = {$main_category_id}";
                                $second_categories_result = $conn->query($second_categories_sql);

                                if ($second_categories_result->num_rows > 0) {
                                   // echo '<ul class="dropdown-menu ">'; // Nested dropdown for second categories
                                    while ($second_category_row = $second_categories_result->fetch_assoc()) {
                                        echo '<li><a style="  border-bottom:none" class="dropdown-item" href="#">' . htmlspecialchars($second_category_row['name']) . '</a></li>';
                                    }
                                  //  echo '</ul>'; // End of second-level dropdown
                                }

                                echo '</li>'; // End of first-level category item
                            }
                        }
                        echo '</ul>'; // End of first-level dropdown
                    }
                    ?>
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
                                <a href="home.php">Home</a>
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