<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="datamodal" class="modal text-content">
    <form class="requestForm" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Report Comt</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="comt_module" value="reportComt">
                <input type="hidden" name="id" value="" readonly>

                <label for="content">Content</label>
                <input class="form-control" type="text" name="content" value="" readonly>

                <label for="reason">Reason:</label>
                <select name="reasonSelect" class="form-control" id="select" onchange="showInput()" required>
                    <option selected value="Nudity">Nudity</option>
                    <option value="Terrorism">Terrorism</option>
                    <option value="Harrasment">Harrasment</option>
                    <option value="Hate speech">Hate speech</option>
                    <option value="False News">False News</option>
                    <option value="Unauthorized sales">Unauthorized sales</option>
                    <option value="Suicide or self-injury">Suicide or self-injury</option>
                    <option value="Spam">Spam</option>
                    <option value="Other">Other</option>
                </select>
                <div id="reason"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button report-button">Report</button>
            </div>
        </div>
    </form>
</div>

<table id="datatable" class="hover row-border table"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    $(function() {
        const dataTable = $('#datatable').DataTable({
            processing: true,
            //   serverSide: true,
            ajax: {
                url: "http://forus.com/comments/getAllComments",
                dataSrc: ""
            },

            columns: [{
                    title: 'ID',
                    data: 'id'
                },
                {
                    title: 'User id',
                    data: 'userId'
                },
                {
                    title: 'Post id',
                    data: 'postId'
                },
                {
                    title: 'Content ',
                    data: 'content'
                },
                {
                    title: 'Created at',
                    data: 'created_at'
                },
                {
                    title: 'Report',
                    render: function(data, type, row) {
                        return '<button class="button warning-button btn-view-comment" data-id="' + row.id + '">Report</button>';
                    }
                },

            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-comment').on('click', function() {
                    const rowData = dataTable.row($(this).closest('tr')).data();

                    if (rowData) {
                        openCommentModal(rowData);
                    } else {
                        console.error('No se pudo obtener los datos de la fila.');
                    }
                });
            }
        });

    });
</script>