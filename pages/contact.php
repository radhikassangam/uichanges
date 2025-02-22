<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .contact-info, .contact-form { margin-top: 20px; }
        .contact-info h2, .contact-form h2 { text-align: center; }
        .contact-form input, .contact-form textarea { width: 100%; padding: 10px; margin-bottom: 10px; }
        .contact-form button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <section class="contact-info">
            <h2>Contact Information</h2>
            <p>Feel free to reach us via the following contact methods:</p>
            <p><strong>Phone:</strong> +91 7353155800</p>
            <p><strong>Email:</strong> contact@uthhanecom.com</p>
            <p><strong>Live Chat:</strong> Available on our website</p>
        </section>

        <section class="contact-form">
            <h2>Contact Us</h2>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>
</body>
</html>
