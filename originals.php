
    <style>
        
    .parent-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-bottom:50px;
}

        /* Banner Container */
        .sale-banner {
            position: relative;
            background: linear-gradient(135deg, rgba(90, 62, 54, 0.9), rgba(74, 50, 44, 0.9));
            color: white;
            padding: 15px 20px;
            border-radius: 15px;
            width: 1200px;
            height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(8px);
            overflow: hidden;
            transition: 0.3s ease-in-out;
        }

        /* Animated Moving Dotted Border */
        .sale-banner::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 15px;
            border: 3px dashed rgba(255, 255, 255, 0.7);
            animation: moveDashes 1.5s linear infinite;
        }

        /* Keyframe Animation for Moving Dotted Border */
        @keyframes moveDashes {
            0% { border-image-source: linear-gradient(90deg, white, transparent, white, transparent); }
            100% { border-image-source: linear-gradient(90deg, transparent, white, transparent, white); }
        }

        /* Hover Effect */
        .sale-banner:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(237, 113, 27, 0.6);
        }

        /* Heading */
        .banner-heading {
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            color: #ff8c42;
        }

        /* Banner Text */
        .banner-text {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        /* Button */
        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: linear-gradient(135deg, #ED711B, #ff8c42);
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(237, 113, 27, 0.4);
        }

        /* Button Hover Effect */
        .btn:hover {
            background: linear-gradient(135deg, #d85d15, #ff6b00);
            transform: scale(1.1);
        }

    </style>

<div class="parent-container">
    <div class="sale-banner">
        <div class="banner-heading">Uthhan Originals!</div>
        <div class="banner-text">Grow Your Business
        <a href="https://uthhanecom.gergstore.com/Store/enquiry" class="btn">
            Join Now
        </a></div>
    </div>
</div>
