<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Our Platform</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #333;
        text-align: center;
    }
    p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .cta-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Platform!</h1>
        <p>Dear <?=$data['username']?>,</p>
        <p>Thank you for joining us! We're thrilled to have you as a new member of our community.</p>
        <p>Explore our platform to discover exciting features and services tailored just for you.</p>
        <p>Should you have any questions or need assistance, feel free to reach out to our support team.</p>
        <p>Get started now by clicking the button below:</p>
        <a href="http://forus.com/login" class="cta-button">Get Started</a>
        <p>We hope you enjoy your experience with us!</p>
        <p>Sincerely,<br>Your Website Team</p>
    </div>
</body>
</html>
