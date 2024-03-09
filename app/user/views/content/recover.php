<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foronu Hub - Login</title>
    <link rel="stylesheet" href="../css/recover.css">
</head>

<body>
    
    <div class="container-form">
        <video autoplay loop muted src="../assets/resources/gradient.mp4"></video>
        <div class="login-form">
            <h1><b><span class="white-text">Recover your</span><span class="blue-text"> Password</span></b></h1>
            <form>
                <h1 class="text">Enter your email to recover your password:</h1>
                <input type="email" placeholder="Enter your email">
                <button type="submit" class="send-btn">Send</button>
                <button type="reset" class="cancel-btn">Cancel</button>
                <a class="animate" href="<?php echo APP_URL; ?>user/login" class="left"><span class="white-text">Back to</span><span class="blue-text"> log in</span></a>
            </form>
        </div>
    </div>
</body>

</html>