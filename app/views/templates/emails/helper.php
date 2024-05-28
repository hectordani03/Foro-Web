<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Request Notification</title>
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

        .description {
            color: #333;
            font-weight: bold;
            border-left: 4px solid #ff5733;
            padding-left: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .info {
            color: #333;
            font-weight: bold;
        }

        .info span {
            font-weight: normal;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Request Notification</h1>
        <p>Dear Team,</p>
        <p>We have received a new request from a user with the following details:</p>
        <p class="info">Username: <span><?= $data['username'] ?></span></p>
        <p class="info">Email: <span><?= $data['email'] ?></span></p>
        <p class="description">Description: <br><span><?= nl2br(htmlspecialchars($data['description'])) ?></span></p>
        <p>Please address this request as soon as possible.</p>
        <p>Thank you for your attention.</p>
        <p>Sincerely,<br>Your Support Team</p>
    </div>
</body>

</html>
