<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Suspension Notice</title>
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
            border: 1px solid #ddd;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        .reason {
            color: #ff5733;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Account Suspension Notice</h1>
        <p>Dear User,</p>
        <p>We regret to inform you that your account with the following details has been suspended for <?= $duration ?> days:</p>
        <p>Email: <?= $data['email'] ?></p>
        <p>Username: <?= $data['username'] ?></p>
        <p><span class="reason">Reason:</span> <?= $data['reason'] ?></p>
        <p>This action has been taken in accordance with our terms of service. If you believe this suspension is in error, please contact our support team.</p>
        <p>Thank you for your understanding.</p>
        <p>Sincerely,<br>For Us Support Team.</p>
    </div>
</body>

</html>