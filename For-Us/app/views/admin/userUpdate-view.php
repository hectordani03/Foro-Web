<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div class="container pb-6 pt-6">
    <div class="text-content">
        <h2 class="title has-text-centered"><?= $ua->username ?></h2>
        <div class="text-center">
            <img src="<?php echo PROF_IMG; ?><?= $ua->profilePic ?>" class="profile-img mx-auto recorte" id="preview_image">
        </div>

        <form class="" id="updateUser-form" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Profile Picture</label>
                        <input class="file-input form-control" type="file" name="profilePic" id="profilePic" accept=".jpg, .png, .jpeg">
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column mb-3">
                    <div class="control">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" id="username" pattern="^[a-zA-Z0-9]{1,100}$" minlength="3" maxlength="40" value="<?= $ua->username ?>" required>
                    </div>
                </div>
                <div class="column mb-3">
                    <div class="control">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" id="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" minlength="6" maxlength="70" value="<?= $ua->email ?>" required>
                    </div>
                </div>
            </div>
            <p class="has-text-centered">
                IF you wish to update your password, please complete the 2 fields. If you do NOT want to update your password, leave the fields empty.
            </p>
            <div class="columns">
                <div class="column mb-3">
                    <div class="control">
                        <label for="password">New Password</label>
                        <input class="form-control" type="password" name="password" id="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100">
                    </div>
                </div>
                <div class="column mb-3">
                    <div class="control">
                        <label for="password2">Confirm New Password</label>
                        <input class="form-control" type="password" name="password2" id="password2" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100">
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" id="updatebtn" class="button is-info is-rounded">Update</button>
                <button type="reset" class="button is-cancel is-rounded">Cancel</button>
            </div>

        </form>
    </div>
</div>
<script>
    const uuf = $("#updateUser-form");

    uuf.on("submit", function(e) {
        e.preventDefault();
        e.stopPropagation();

        const us = $("#username");
        const em = $("#email");
        const p1 = $("#password");
        const p2 = $("#password2");
        const btn = $("#updatebtn");
        const file = $("#profilePic")[0].files[0];
        const data = new FormData(this);

        if (us.val() === "" || em.val() === "") {
            handleFormError(btn);
        } else if (file && file.size / (1024 * 1024) > 2) {
            Swal.fire({
                icon: "error",
                text: "The image you have selected exceeds the allowed weight 2 MB.",
            });
        } else if (p1.val() !== p2.val()) {
            Swal.fire({
                icon: "error",
                text: "Passwords dont match",
            }).then(() => {
                p2.val("")
                p2.trigger("focus")
            })
        } else {
            fetch(app.routes.updateUser, {
                    method: "POST",
                    body: data,
                })
                .then((res) => res.json())
                .then((res) => {
                    if (res.r !== false) {
                        Swal.fire({
                            icon: "success",
                            text: "Changes made successfully",
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        handleUpdateError(uuf);
                    }
                })
                .catch(() => {
                    handleUpdateError(uuf);
                });
        }
    });

    function handleFormError(btn) {
        btn.prop("disabled", true);
        $("#error").removeClass("d-none").css("color", "red");
        setTimeout(function() {
            $("#error").addClass("d-none").css("color", "");
            btn.prop("disabled", false);
        }, 1800);
        $("#usernamep").val() === "" ? $("#usernamep").focus() : $("#emailp").focus();
    }

    function handleUpdateError(uuf) {
        Swal.fire({
            icon: "error",
            text: "Unexpected error, please try again",
        }).then(() => {
            uuf[0].reset();
        });
    }
</script>
<?php
require_once LAYOUTS_AD . 'footer.php';
