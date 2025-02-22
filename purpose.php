<style>
    .shop-by-purpose {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 50px auto;
        width: 100%;
        flex-wrap: wrap;
        text-align: center;
    }
    .purpose-card {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        text-align: center;
        transition: transform 0.3s ease-in-out;
    }
    .purpose-card:hover {
        transform: scale(1.1);
    }
    .purpose-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
    }
    .purpose-text {
        position: absolute;
        color: white;
        font-size: 18px;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .shop-by-purpose {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<h5 class="heading">Shop by Purpose</h5>

<!-- Shop by Purpose Section -->
<div class="shop-by-purpose">
    <div class="purpose-card">
        <img src="assets/images/show6.jpeg" alt="Gifting">
        <div class="purpose-text">Gifting</div>
    </div>
    <div class="purpose-card">
        <img src="assets/images/show5.jpeg" alt="Build a Hobby">
        <div class="purpose-text">Build a Hobby</div>
    </div>
    <div class="purpose-card">
        <img src="assets/images/show3.jpeg" alt="Special Day">
        <div class="purpose-text">Special Day</div>
    </div>
    <div class="purpose-card">
        <img src="assets/images/show2.jpeg" alt="Home Decor">
        <div class="purpose-text">Home Decor</div>
    </div>
</div>
