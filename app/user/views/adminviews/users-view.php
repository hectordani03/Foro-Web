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
                    title: 'Actions',
                    render: function(data, type, row) {
                        return '<button class="btn-view-user" data-user-id="' + row.id_user + '">Edit</button>';
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                // Agregar evento clic para mostrar los datos del usuario al hacer clic en el botón
                $('.btn-view-user').on('click', function() {
                    const userId = $(this).data('user-id');
                    console.log('User ID:', userId);
                    // Aquí puedes agregar código adicional para mostrar los datos del usuario según el ID
                });
            }
        });
    });
</script>