<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/ajax/reports/reportedcomt.php',
                dataSrc: json => json.data
            },
            columns: [
                {
                    title: 'Comment',
                    data: 'id_comment'
                },
                {
                    title: 'Reported User',
                    data: 'id_user'
                },
                {
                    title: 'Publication',
                    data: 'id_post'
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
                {
                    title: 'Report',
                    render: function(data, type, row) {
                        return '<button class="btn-view-user" data-id_user="' + row.id_user + '">Report</button>';
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');
            }
        });

    });
</script>