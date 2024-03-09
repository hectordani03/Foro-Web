<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/publications_json.php',
                dataSrc: json => json.data
            },
            columns: [
                {
                    title: 'ID',
                    data: 'id_publication'
                },
                {
                    title: 'User',
                    data: 'id_user'
                },
                {
                    title: 'Message',
                    data: 'content'
                },
                {
                    title: 'Category',
                    data: 'category'
                },
                {
                    title: 'Status',
                    data: 'state'
                },
                {
                    title: 'Interaction',
                    data: 'interaction_type'
                },
                {
                    title: 'Reports',
                    data: 'reports'
                },


            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>