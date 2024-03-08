<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foronu Hub - Login</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>
    
    <div class="container-form">
        <video autoplay loop muted src="./assets/resources/gradient.mp4"></video>
        <div class="login-form">
            <h1><b><span class="white-text">Create</span><span class="blue-text"> Account</span></b></h1>
            <form>
                <input type="text" placeholder="Enter your user" required>
                <input type="email" placeholder="Enter your email" required>
                <input type="password" placeholder="Enter your password" required>
                <input type="password" placeholder="Confirm your password" required>
                <div>
                    <a href="<?php echo APP_URL; ?>login"><span class="white-text">Do you already</span> <span class="blue-text"> have an account?</span></a>
                </div>
                <button type="submit">Log in</button>
            </form>
        </div>
    </div>
</body>

</html>