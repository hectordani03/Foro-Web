<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/reports/reportedpost.php',
                dataSrc: json => json.data
            },
            columns: [
                {
                    title: 'Post id',
                    data: 'id_post'
                },
                {
                    title: 'Reported user',
                    data: 'id_user'
                },
                {
                    title: 'Reporting user',
                    data: 'id_reporting_user'
                },
                {
                    title: 'Reports',
                    data: 'reason'
                },
                {
                    title: 'State',
                    data: 'state'
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>