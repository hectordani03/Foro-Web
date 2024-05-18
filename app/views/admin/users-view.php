<!-- Botón para abrir el modal -->
<?php
require_once LAYOUTS_AD . 'header.php';
?>
<?php if ($ua->role == 1) { ?>
    <div class="container">
        <button class="button primary-button open-modal" id="btn-add">Add User</button>
    </div>
<?php } ?>

<div id="add-modal" class="modal text-content">
    <form class="" id="register-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_module" value="adminRegister">

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" pattern="^[a-zA-Z0-9]{1,100}$" minlength="3" maxlength="40" required>

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" minlength="6" maxlength="70" required>

                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>

                <label for="password2">Confirm Password</label>
                <input class="form-control" type="password" name="password2" id="password2" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>

                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="reset" class="button cancel-button">Cancel</button>
                <button type="submit" class="button accept-button">Add</button>
            </div>
        </div>
    </form>
</div>

<div id="report-modal" class="modal text-content">
    <form class="" id="reportu-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Report User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="userId" readonly>

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="rusername" pattern="^[a-zA-Z0-9]{1,100}$" minlength="3" maxlength="40" readonly>

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="remail" minlength="6" maxlength="70" readonly>

                <label for="reason">Reason:</label>
                <select name="reason" class="form-control" id="reason" onchange="showInput()" required>
                    <option selected value="Nudity">Nudity</option>
                    <option value="Terrorism">Terrorism</option>
                    <option value="Harrasment">Harrasment</option>
                    <option value="Hate speech">Hate speech</option>
                    <option value="False News">False News</option>
                    <option value="Unauthorized sales">Unauthorized sales</option>
                    <option value="Suicide or self-injury">Suicide or self-injury</option>
                    <option value="Spam">Spam</option>
                    <option value="Other">Other</option>
                </select>
                <div id="other-r"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button report-button">Report</button>
            </div>
        </div>
    </form>
</div>

<div id="delete-modal" class="modal text-content">
    <form class="" id="delete-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Delete User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="userId" id="userId" readonly>
                <input type="hidden" name="profilePic" id="profilePic" readonly>

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="dusername" pattern="^[a-zA-Z0-9]{1,100}$" minlength="3" maxlength="40" required>

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="demail" readonly required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button delete-button">Delete</button>
            </div>
        </div>
    </form>
</div>
<table id="userDT" class="hover row-border table"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>

    $(function() {
        app_ad.registerUser();
        app_ad.deleteUser();
        app_ad.reportUser();
        app_ad.userDT();
    });
</script>