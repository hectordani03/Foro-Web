<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/reports/reporteduser.php',
                dataSrc: json => json.data
            },
            columns: [
                {
                    title: 'User',
                    data: 'id_user'
                },
                {
                    title: 'Reporting user',
                    data: 'id_reporting_user'
                },
                {
                    title: 'Report',
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