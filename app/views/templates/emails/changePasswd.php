<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Código</title>
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
    <h1>Verification Code</h1>
    <p>Hello <?= $userData[0]->username ?>,</p>
    <p>You have requested a password change in our system. To proceed with this change, we need you to enter the following verification code:</p>
    <h2 style="text-align: center; margin-bottom: 30px;">Verification Code:</h2>
    <h2 style="text-align: center; margin-bottom: 30px;"><?= $code ?></h2>
    <p>For security reasons, this code will expire in the next 3 minutes. Please make sure to use it within that time.</p>
    <p><strong>Important:</strong> Once you have successfully used this verification code to change your password, it will become invalid. If you need to change your password again, you will need to restart the process and request a new verification code.</p>
    <p><strong>Important:</strong> Do not navigate away from this page or log out without changing your password. If you leave this page, the verification code will become invalid, and you will need to request a new one.</p>
    <p>If you didn't request this password change, please disregard this message or contact us immediately.</p>
    <a href="http://forus.com/verify" class="cta-link">Change Password</a>
    <p>Thank you for your cooperation.</p>
    <p>Sincerely,<br>For Us Support Team</p>
</div>

</body>

</html>
