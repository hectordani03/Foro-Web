<!-- Botón para abrir el modal -->
<button class="button" id="openModalBtn">Add User</button>

<div id="myModal" class="modal">
    <form class="ajaxForm" action="<?php echo APP_URL; ?>user/ajax/ajaxUser.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_module" value="admin_registration">

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" required>

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" maxlength="70" required>

                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>

                <label for="confirm_password">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>

                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                </select>

                <label class="file-label">
                    <input class="file-input form-control" type="file" name="user_profile_photo" accept=".jpg, .png, .jpeg" required>
                    <span class="file-cta">
                        <span class="file-label">
                            Select Picture
                        </span>
                    </span>
                    <span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
                </label>

            </div>
            <div class="modal-footer">
                <button type="reset" class="button is-link is-light is-rounded">Cancel</button>
                <button type="submit" class="button is-info is-rounded">Add</button>
            </div>
        </div>
    </form>
</div>

<div id="datamodal" class="modal">
    <form class="ajaxForm" action="<?php echo APP_URL; ?>user/ajax/ajaxUser.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Report User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_module" value="report_user">
                <input type="hidden" name="id_user" value="" readonly>

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" value="" readonly>

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" maxlength="70" value="" readonly>

                <label for="role">Role</label>
                <input class="form-control" type="text" name="role" maxlength="70" value="" readonly>

                <label for="reason">Reason:</label>
                    <select name="reasonSelect" class="form-control" id="select" onchange="showInput()" required>
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
                    <div id="reason"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button is-info is-rounded">Report</button>
            </div>
        </div>
    </form>
</div>

<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/user_json.php',
                dataSrc: json => json.data
            },
            columns: [{
                    title: 'ID',
                    data: 'id_user'
                },
                {
                    title: 'Username',
                    data: 'username'
                },
                {
                    title: 'Email',
                    data: 'email'
                },
                {
                    title: 'Role',
                    data: 'id_role'
                },
                {
                    title: 'Status',
                    data: 'state'
                },
                {
                    title: 'Registration',
                    data: 'registration'
                },
                {
                    title: 'Report',
                    render: function(data, type, row) {
                        return '<button class="btn-view-user" data-id_user="' + row.id_user + '">Report</button>';
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-user').on('click', function() {
                    const rowData = dataTable.row($(this).closest('tr')).data();

                    if (rowData) {
                        openModal(rowData);
                    } else {
                        console.error('No se pudo obtener los datos de la fila.');
                    }
                });
            }
        });
    });

    function openModal(userData) {
        // Llenar los inputs del modal con los datos del usuario
        $('#datamodal input[name="id_user"]').val(userData.id_user);
        $('#datamodal input[name="username"]').val(userData.username);
        $('#datamodal input[name="email"]').val(userData.email);
        $('#datamodal input[name="role"]').val(userData.id_role);

        // Mostrar el modal
        $('#datamodal').css('display', 'block');
    }
</script>
<script>
    
    function showInput() {
        var selectElement = document.getElementById("select");
        var reasonInput = document.getElementById("reason");

        reasonInput.innerHTML = '';

        if (selectElement.value === "Other") {
            var inputElement = document.createElement("input");
            inputElement.type = "text";
            inputElement.placeholder = "Please specify";
            inputElement.name = "reasonInput";
            reasonInput.appendChild(inputElement);
        }
    }
</script>