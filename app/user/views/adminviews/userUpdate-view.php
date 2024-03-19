<div class="container pb-6 pt-6">
    <?php
    $data = $insLogin->selectData("unique", "user", "id_user", $_SESSION['id'], "id");
    if ($data->rowCount() > 0) {
        $data = $data->fetch();
    ?>
        <div class="text-content">
            <h2 class="title has-text-centered"><?php echo $data['username'] ?></h2>
            <div class="text-center">
                <img src="<?php echo APP_URL; ?>assets/profile_picture/<?php echo $data["profile_picture"]; ?>" class="profile-img mx-auto recorte" id="preview_image">
            </div>

            <form class="requestForm" id="photoForm" action="<?php echo APP_URL; ?>user/requestControllers/users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                <input type="hidden" name="user_module" id="user_module" value="">

                <input class="file-input form-control" type="file" name="user_profile_photo" accept=".jpg, .png, .jpeg">

                <div class="button-container">
                    <button type="button" class="button is-info is-rounded" onclick="setModule('updatePhoto')">Update Photo</button>
                    <button type="button" class="button is-danger is-rounded" onclick="setModule('deletePhoto')">Delete Photo</button>
                </div>

                <button type="submit" id="submitBtn" style="display: none;">Submit</button>
            </form>

            <form class="requestForm" action="<?php echo APP_URL; ?>user/requestControllers/users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">

                <input type="hidden" name="user_module" value="updateUser">
                <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" value="<?php echo $data['username']; ?>">
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" maxlength="70" value="<?php echo $data['email']; ?>">
                        </div>
                    </div>
                </div>


                <p class="has-text-centered">
                    IF you wish to update your password, please complete the 2 fields. If you do NOT want to update your password, leave the fields empty.
                </p>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label for="password">New Password</label>
                            <input class="form-control" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <label for="confirm_password">Confirm New Password</label>
                            <input class="form-control" type="password" name="confirm_password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                        </div>
                    </div>
                </div>

                <p class="has-text-centered">
                    In order to update the data, please enter your USER and PASSWORD with which you logged in.
                </p>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Current Username</label>
                            <input class="form-control" type="text" name="old_user" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <label>Current Password</label>
                            <input class="form-control" type="password" name="old_pass" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="button is-info is-rounded">Update</button>
                    <button type="reset" class="button is-cancel is-rounded">Cancel</button>
                </div>

            </form>
        </div>

    <?php
    } else { ?>
        <article class="message is-danger">
            <div class="message-header">
                <p>An unexpected error occurred!</p>
            </div>
            <div class="message-body">The requested data could not be loaded</div>
        </article> <?php } ?>
</div>