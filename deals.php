<style>
    .sweet-deals {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 90px auto;
        width: 100%;
        flex-wrap: wrap;
        margin-top:0px;
        margin-bottom:0px;
    }
    .deal-card {
        width: 450px;
        height: 400px;
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
    }
    .deal-card:hover {
        transform: scale(1.05);
    }
    .deal-card img {
        width: 100%;
        height: 80%;
        object-fit: fixed;
        border-radius: 10px 10px 0 0;
    }
    .deal-card .btn-orange {
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .sweet-deals {
            flex-direction: column;
            align-items: center;
        }
        .deal-card {
            width: 90%;
        }
    }
</style>
<h5 class="heading" style="margin-bottom: 0;margin-top:40px">New Launch of the Week</h5>
<!-- Sweet Deals Section -->
<div class="sweet-deals">
    <div class="deal-card">
        <img src="assets/images/banner1.png" alt="Sweet Deal 1">
        <div class="text-center">
            <a href="home.php" class="btn btn-orange">Shop Now</a>
        </div>
    </div>
    <div class="deal-card">
        <img src="assets/images/banner2.webp" alt="Sweet Deal 2">
        <div class="text-center">
            <a href="home.php" class="btn btn-orange">Check Now</a>
        </div>
    </div>
    <div class="deal-card">
        <img src="assets/images/banner1.png" alt="Sweet Deal 3">
        <div class="text-center">
            <a href="home.php" class="btn btn-orange">See More...</a>
        </div>
    </div>
</div>
