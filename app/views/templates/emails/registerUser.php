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
            background-color: #f8f8f8;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            line-height: 1.6;
            font-size: 16px;
        }

        .cta-link {
            color: #0056b3;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .cta-link:hover {
            color: #004494;
            transform: translateY(-2px);
        }

        .cta-link:active {
            color: #003366;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Our Platform!</h1>
        <p>Dear <?= $data['username'] ?>,</p>
        <p>Thank you for joining us! We're thrilled to have you as a new member of our community.</p>
        <p>Explore our platform to discover exciting features and services tailored just for you.</p>
        <p>Should you have any questions or need assistance, feel free to reach out to our support team.</p>
        <p>Get started now by clicking the button below:</p>
        <a href="http://forus.com/login" class="cta-link">Get Started</a>
        <p>We hope you enjoy your experience with us!</p>
        <p>Sincerely,<br>Your Website Team</p>
    </div>
</body>

</html>