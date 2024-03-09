<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/user_json.php',
                dataSrc: json => json.data
            },
            columns: [
                {
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
                        return '<button class="btn-view-user" data-user-id="' + row.id_user + '">View</button>';
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
