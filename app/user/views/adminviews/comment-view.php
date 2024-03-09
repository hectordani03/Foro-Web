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
                    title: 'From: ',
                    data: 'id_publication'
                },
                {
                    title: 'Message',
                    data: 'content'
                },
                {
                    title: 'Answer? ',
                    data: 'id_main_comment'
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