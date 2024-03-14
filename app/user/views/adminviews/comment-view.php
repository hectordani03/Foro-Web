<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/comments_json.php',
                dataSrc: json => json.data
            },

            columns: [
                {
                    title: 'ID',
                    data: 'id_comment'
                },
                {
                    title: 'User id',
                    data: 'id_user'
                },
                {
                    title: 'Post id',
                    data: 'id_post'
                },
                {
                    title: 'Content ',
                    data: 'content'
                },
                {
                    title: 'Date',
                    data: 'date'
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>