<?php
setHeader($d, "recover.css", "sweetalert2.min.css");
?>

<div class="container-form">
    <video autoplay loop muted src="<?php echo VIDEO; ?>gradient.mp4"></video>
    <div class="login-form">
        <h1><b><span class="white-text">Recover your</span><span class="blue-text"> Password</span></b></h1>
        <form>
            <h1 class="text">Enter your email to recover your password:</h1>
            <input type="email" placeholder="Enter your email">
            <button type="submit" class="send-btn">Send</button>
            <button type="reset" class="cancel-btn">Cancel</button>
            <a class="animate" href="../login" class="left"><span class="white-text">Back to</span><span class="blue-text"> log in</span></a>
        </form>
    </div>
</div>
<?php

setFooter($d, "alerts.js", "sweetalert2.all.min.js");
closeFooter();
