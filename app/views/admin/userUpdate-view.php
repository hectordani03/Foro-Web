<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div class="container pb-6 pt-6 w-full mx-auto ml-20">
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
                        <input class="form-control" type="email" name="email" id="email" minlength="6" maxlength="70" value="<?= $ua->email ?>" required>
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
<?php
require_once LAYOUTS_AD . 'footer.php';
?>

<script>
    $(function() {
        app_ad.updateUser();

    });
</script>