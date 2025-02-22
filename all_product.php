
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .containerpro {
    max-width: 1200px; /* Adjust width as needed */
    margin: 50px auto; /* Centers the container with space on both sides */
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
            height: 300px;
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
    width:auto;
}


.product-wrapper .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Ensures proper fitting */
}

@media (max-width: 768px) {
    .product-wrapper .col-6 {
        flex: 0 0 50% !important;  /* 2 per row on small screens */
        max-width: 50% !important;
    }
}

@media (max-width: 576px) {
    .product-wrapper .col-6 {
        flex: 0 0 50% !important;
        max-width: 50% !important;
    }
}

@media (min-width: 992px) {
    .product-wrapper .col-lg-2 {
        flex: 0 0 20% !important; /* Ensures 5 per row */
        max-width: 20% !important;
    }
}

        .heading {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 15px;
            text-align:center;
        }
        .btn-orange {
            display: inline-block;
            /* background-color: rgb(243, 236, 241); */
            color: #ed711b;
            border-color: #ed711b;
            width: 150px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            margin-top: -50px;
        }
        .btn-orange:hover {
            background-color: #d66014;
            border-color: #d66014;
            color: white;
        }
         .tab-nav-boxed {
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }
        .nav-tabs {
            display: flex;
            justify-content: center;
            border-bottom: none;
        }
        .nav-tabs .nav-item {
            margin: 0 10px;
        }
        .nav-tabs .nav-link {
            font-weight: bold;
            color: black;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            background: rgb(243, 236, 241);
            transition: all 0.3s ease-in-out;
        }
        .nav-tabs .nav-link.active {
            background-color: rgb(243, 236, 241);
            color: #ed711b;
            border-color: #ed711b;
        }
        .nav-tabs .nav-link:hover {
            background-color: rgba(237, 113, 27, 0.1);
            color: #ed711b;
            transform: scale(1.05);
        }
       

    </style>

<div class="heading">Popular Departments</div>

<!-- Tab Navigation -->
<div class="tab tab-nav-boxed tab-nav-outline">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0)" onclick="fetchProducts('newarrival', this)">New Arrivals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="fetchProducts('featured', this)">Featured</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="fetchProducts('express', this)">Express Products</a>
        </li>
    </ul>
</div>
    <div class="containerpro">
        <div class="product-wrapper">
            <div class="row" id="product-container">
                <!-- Products  -->
                 
            </div>
        </div>
    </div>

   
       <script>
 document.addEventListener("DOMContentLoaded", function () {
    fetchProducts("newarrival", document.querySelector(".nav-tabs .nav-link.active"));
    displayRecentlyViewed();
});

// Fetch Products Function
function fetchProducts(protype, element) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_products.php?protype=" + protype, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("product-container").innerHTML = xhr.responseText;
            document.querySelectorAll(".nav-tabs .nav-link").forEach(tab => tab.classList.remove("active"));
            if (element) {
                element.classList.add("active");
            }
            addClickEventToCards();
        }
    };
    xhr.send();
}

    </script>
