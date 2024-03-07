<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/src/app/app/ajax/user_json.php',
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
                    data: 'status'
                },
                {
                    title: 'Registration',
                    data: 'registration'
                },

            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>