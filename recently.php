<style>
/* Container */
.recently-viewed-container {
    width: 100%;
    max-width: 1100px;
    margin: 20px auto;
    padding: 10px 0;
}

/* Title Styling */
.recently-viewed-title {
    text-align: left;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    padding-left: 10px;
}

/* Flexbox for Scroll Buttons & Wrapper */
.recently-viewed-content {
    display: flex;
    align-items: center;
    position: relative;
}

/* Wrapper for Scrolling */
.recently-viewed-wrapper {
    overflow-x: auto;
    scroll-behavior: smooth;
    white-space: nowrap;
    width: 90%;
    padding: 10px 20px;
}

/* Product Image Container */
.recently-viewed {
    display: flex;
    gap: 12px;
    padding: 5px;
}

/* Individual Item */
.recent-item {
    position: relative;
    flex: 0 0 auto;
    width: 10vw;
    height: 10vw;
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.recent-item img {
    width: 100%;
    height: 100%;
    object-fit: fixed;
    border-radius: 8px;
}

/* Hover Effect */
.recent-item:hover {
    transform: scale(1.1);
}

/* Scroll Buttons */
.scroll-btn {
    background: #ed711b;
    border: none;
    color: white;
    font-size: 18px;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
}

/* Position Adjustments */
.left-btn {
    left: -40px;
}

.right-btn {
    right: -40px;
}

/* Hide Scrollbar */
.recently-viewed-wrapper::-webkit-scrollbar {
    display: none;
}
/* Responsive Adjustments */
@media (max-width: 768px) {
    .scroll-btn {
        width: 30px;
        height: 30px;
        font-size: 16px;
    }
    
    .left-btn {
        left: 4px; /* Keep inside */
    }

    .right-btn {
        right: 4px; /* Keep inside */
    }

    /* Adjust wrapper width to avoid overflowing */
    .recently-viewed-wrapper {
       
        width: calc(100% - 60px);
        padding-left: 40px;
        padding-right: 40px;
    }
}
</style>
<div class="recently-viewed-container">
    <h5 class="recently-viewed-title">Recently Viewed</h5>
    <div class="recently-viewed-content">
        <button class="scroll-btn left-btn">&lt;</button>
        <div class="recently-viewed-wrapper">
            <div class="recently-viewed" id="recently-viewed">
                <!-- Recently viewed products will be loaded here -->
            </div>
        </div>
        <button class="scroll-btn right-btn">&gt;</button>
    </div>
</div>
