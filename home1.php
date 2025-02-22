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
    <script src="https://cdn.tailwindcss.com"></script>
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
            background-color:rgb(243, 236, 241);
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
  @include('pages/bottom.php');


@include('hero.php');
@include('deals.php');
@include('purpose.php');
@include('creativity.php');
            @include('all_product.php');
                    ?>
<!-- end of main part -->

        <?php  
       
           @include('originals.php');
           @include('express.php');
           @include('recently.php');
        @include('subscribe.php');
                    @include('footer.php');
                    ?>
                    <script>
    // Function to Store Clicked Product in localStorage
function addClickEventToCards() {
    document.querySelectorAll(".product-card").forEach(card => {
        card.addEventListener("click", function () {
            let product = {
                id: this.getAttribute("data-id"),
                pname: this.getAttribute("data-name"),
                price: this.getAttribute("data-price"),
                ratings: this.getAttribute("data-ratings"),
                main_img: this.getAttribute("data-img")
            };
            
            let recentlyViewed = JSON.parse(localStorage.getItem("recentlyViewed")) || [];
            recentlyViewed = recentlyViewed.filter(p => p.id !== product.id); // Remove duplicate
            recentlyViewed.unshift(product); // Add to the beginning
            if (recentlyViewed.length > 10) recentlyViewed.pop(); // Limit to 10 products
            localStorage.setItem("recentlyViewed", JSON.stringify(recentlyViewed));

            displayRecentlyViewed();
        });
    });
}

// Function to Display Recently Viewed Products
function displayRecentlyViewed() {
    let recentlyViewed = JSON.parse(localStorage.getItem("recentlyViewed")) || [];
    let container = document.getElementById("recently-viewed");
    container.innerHTML = "";

    if (recentlyViewed.length === 0) {
        container.innerHTML = "<p class='text-center text-muted'>No recently viewed products</p>";
        return;
    }

    recentlyViewed.forEach(product => {
        container.innerHTML += `
                    <div class="recent-item">
                <img src="${product.main_img}" alt="Product Image">
                
            </div>`;
    });

    addClickEventToCards();
}
document.querySelector(".left-btn").addEventListener("click", function () {
    document.querySelector(".recently-viewed-wrapper").scrollBy({ left: -200, behavior: "smooth" });
});

document.querySelector(".right-btn").addEventListener("click", function () {
    document.querySelector(".recently-viewed-wrapper").scrollBy({ left: 200, behavior: "smooth" });
});</script>

</body>
</html>
