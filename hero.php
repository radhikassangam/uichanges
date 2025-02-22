<section class="relative w-full h-[55vh] bg-cover bg-center" style="background-image: url('assets/images/Website_Banner.png');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white px-6">
        <h1 class="text-5xl font-bold mb-4">Welcome to Our Website</h1>
        <p class="text-lg mb-6">Discover amazing experiences with us.</p>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg text-lg transition">Get Started</a>
    </div>
    
    <!-- Moving Flash Message -->
    <div class="absolute bottom-2 w-full overflow-hidden bg-orange-500 py-2">
        <div class="moving-text text-white text-lg font-bold flex items-center">
            <span>🚀 UTHHAN is currently feeding 10,000+ artisan families through K.A.S.B.A. | 🎁 Gifts & Customized Crafts Available | 🏡 Express Delivery to Your Doorstep! | 🛍️ Lowest Prices for Handicrafts 🎨</span>
            <span class="spacer">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>🚀 UTHHAN is currently feeding 10,000+ artisan families through K.A.S.B.A. | 🎁 Gifts & Customized Crafts Available | 🏡 Express Delivery to Your Doorstep! | 🛍️ Lowest Prices for Handicrafts 🎨</span>
        </div>
    </div>
</section>

<style>
    .moving-text {
        display: flex;
        white-space: nowrap;
        animation: marquee 20s linear infinite;
    }

    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
