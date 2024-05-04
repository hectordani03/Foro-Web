<?php
setHeader($d, "register.css", "sweetalert2.min.css");
?>

<div class="container-form">
    <video autoplay loop muted src="<?php echo VIDEO; ?>gradient.mp4"></video>
    <div class="login-form">
        <h1><b><span class="white-text">Create</span><span class="blue-text"> Account</span></b></h1>

        <form class="" id="register-form" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input placeholder="Username" class="input" type="text" id="username" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" maxlength="40" required>
            <input placeholder="Email" class="input" type="email" id="email" name="email" maxlength="70" required>
            <input placeholder="Password" class="input" type="password" id="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" minlength="7" maxlength="100" required>
            <input placeholder="Confirm Password" class="input" type="password" id="password2" name="password2" pattern="[a-zA-Z0-9$@.-]{7,100}" minlength="7" maxlength="100" required>
            <div>
                <a href="login"><span class="white-text">Do you already</span> <span class="blue-text"> have an account?</span></a>
            </div>
            <button type="submit">Register</button>
        </form>

    </div>
</div>
<?php

setFooter($d, "sweetalert2.all.min.js", "alerts.js", "jquery.js", "app.js");
?>
<script>
    $(function() {
        const rf = $("#register-form")
        rf.on("submit", function(e) {
            e.preventDefault()
            e.stopPropagation()
            let p1 = $("#password")
            let p2 = $("#password2")
            if (p1.val() !== p2.val()) {
                Swal.fire({
                    icon: "error",
                    text: "Passwords dont match",
                }).then(() => {
                    p2.val("")
                    p2.trigger("focus")
                })
            } else {
                const data = new FormData(this)
                fetch(app.routes.register, {
                        method: "POST",
                        body: data
                    }).then(res => res.json())
                    .then(res => {
                        if (res.r !== false) {
                            location.href = app.routes.login
                        } else {
                            Swal.fire({
                                icon: "error",
                                text: "Unexpected error, please try again",
                            }).then(() => {
                                rf[0].reset()
                            })
                        }
                    }).catch(err => {
                        Swal.fire({
                            icon: "error",
                            text: "Unexpected error, please try again",
                        }).then(() => {
                            rf[0].reset()
                        })
                    })
            }

        })
    })
</script>
<?php
closeFooter();
