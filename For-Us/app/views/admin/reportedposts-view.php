<div id="datamodal" class="modal text-content">
    <form class="requestForm" action="<?php echo REQUEST; ?>post/postRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Delete Post</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="post_module" value="deletePost">
                <input type="hidden" name="id_post" value="" readonly>
                <input type="hidden" name="id_report" value="" readonly>

                <label for="content">Content</label>
                <input class="form-control" type="text" name="content" value="" readonly>

                <label for="category">Category</label>
                <input class="form-control" type="text" name="category" value="" readonly>

                <label for="reason">Report</label>
                <input class="form-control" type="text" name="reason" value="" readonly>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button delete-button">Delete</button>
            </div>
        </div>
    </form>
</div>

<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/requestControllers/reports/reportedpost.php',
                dataSrc: json => json.data
            },
            columns: [{
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
                {
                    title: 'Actions',
                    render: function(data, type, row) {
                        var state = row.state;
                        if (state === 0) {
                            return '<button class="button danger-button btn-view-post" data-id_post="' + row.id_post + '">Delete</button>';
                        } else {
                            return '';
                        }
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-post').on('click', function() {
                    const rowData = dataTable.row($(this).closest('tr')).data();

                    if (rowData) {
                        openModal(rowData);
                    } else {
                        console.error('No se pudo obtener los datos de la fila.');
                    }
                });
            }
        });

    });

    function openModal(postData) {
        $('#datamodal input[name="id_post"]').val(postData.id_post);
        $('#datamodal input[name="id_report"]').val(postData.id_report);
        $('#datamodal input[name="content"]').val(postData.content);
        $('#datamodal input[name="category"]').val(postData.category);
        $('#datamodal input[name="reason"]').val(postData.reason);

        $('#datamodal').css('display', 'block');
    }
</script>