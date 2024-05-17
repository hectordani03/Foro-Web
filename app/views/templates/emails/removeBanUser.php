<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Reactivation Notice</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
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
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Account Reactivation Notice</h1>
        <p>Dear User,</p>
        <p>We are pleased to inform you that your account with the following details has been reactivated.</p>
        <p>Email: <?= $data['email'] ?></p>
        <p>Username: <?= $data['username'] ?></p>
        <p>Your requests for account reactivation have been carefully considered, and we have concluded to reinstate your account.</p>
        <p>You can now access all the features and services provided by our platform.</p>
        <p>If you have any further questions or concerns, please don't hesitate to contact our support team.</p>
        <p>Thank you for choosing us.</p>
        <p>Sincerely,<br>For Us Support Team.</p>
    </div>
</body>
</html>
