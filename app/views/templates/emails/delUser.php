<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Termination Notice</title>
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

        .reason {
            color: #b22222;
            font-weight: bold;
        }

        .signature {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Account Termination Notice</h1>
        <p>Dear User,</p>
        <p>We regret to inform you that your account has been permanently terminated due to a violation of our terms of service. The details of your account are as follows:</p>
        <p><strong>Email:</strong> <?= $data['email'] ?></p>
        <p><strong>Username:</strong> <?= $data['username'] ?></p>
        <p>This decision is final and irreversible.If you believe this termination is an error, you may contact our support team for further clarification. However, please be advised that all decisions are made after careful consideration and in adherence to our policies.</p>
        <p>We appreciate your understanding in this matter.</p>
        <p class="signature">Sincerely,<br>For Us Support Team</p>
    </div>
</body>

</html>