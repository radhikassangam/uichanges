<style>
    .signup-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        background: #f8f8f8;
        padding: 40px 20px;
        border-radius: 10px;
        width: 100%;
        margin-top: 50px; /* Space above only */
        margin-bottom: 0; /* No space at the bottom */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .signup-heading {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    .signup-text {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }
    .signup-form {
        display: flex;
        width: 100%;
        max-width: 600px;
    }
    .signup-input {
        flex: 1;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
        font-size: 14px;
        outline: none;
        width: 100%;
    }
    .signup-button {
        background-color: #ed711b;
        color: white;
        border: none;
        padding: 12px 20px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }
    .signup-button:hover {
        background-color: #d66014;
    }
</style>

<div class="signup-section">
    <div class="signup-heading">Sign Up and SAVE BIG!</div>
    <p class="signup-text">Sign up to stay updated on the most current On Uthhan discounts, events, collections, and plans!</p>
    <div class="signup-form">
        <input type="email" class="signup-input" placeholder="Enter your email" required>
        <button class="signup-button">Subscribe</button>
    </div>
</div>
