<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/posts_json.php',
                dataSrc: json => json.data
            },
            columns: [
                {
                    title: 'ID',
                    data: 'id_post'
                },
                {
                    title: 'User id',
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
                    title: 'Img',
                    data: 'img'
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>