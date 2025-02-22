<style>
    .art-craft-section {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 50px auto;
        width: 100%;
        flex-wrap: wrap;
        text-align: center;
    }
    .art-card {
        width: 450px;
        height: 350px;
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 15px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .art-card:hover {
        transform: scale(1.05);
    }
    .art-card img {
        width: 100%;
        height: 80%;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }
    .explore-btn {
        display: inline-block;
        background-color: #ed711b;
        color: white;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
        text-decoration: none;
    }
    .explore-btn:hover {
        background-color: #d66014;
        transform: scale(1.05);
    }
    
    @media (max-width: 768px) {
        .art-craft-section {
            flex-direction: column;
            align-items: center;
        }
        .art-card {
            width: 90%;
        }
    }
</style>

<h5 class="heading">Unleashing Creativity 🎨✨<br>A Glimpse of Our Latest Art & Craft Works! 🖌️</h5>

<!-- Art & Craft Section -->
<div class="art-craft-section">
    <div class="art-card">
        <img src="https://uthhanadmin.gergstore.com/uploads/banner_image/edited_images/Ecom_banner_1.webp" alt="Art & Craft 1">
        <a href="explore.php" class="explore-btn">Explore Creativity</a>
    </div>
    <div class="art-card">
        <img src="https://uthhanadmin.gergstore.com/uploads/banner_image/edited_images/Ecom_banner_4_.webp" alt="Art & Craft 2">
        <a href="explore.php" class="explore-btn">Explore Creativity</a>
    </div>
    <div class="art-card">
        <img src="https://uthhanadmin.gergstore.com/uploads/banner_image/edited_images/banner3.webp" alt="Art & Craft 3">
        <a href="explore.php" class="explore-btn">Explore Creativity</a>
    </div>
</div>
