<div id="datamodal" class="modal text-content">
    <form class="requestForm" action="<?php echo REQUEST; ?>comments/comtRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Delete Comt</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="comt_module" value="deleteComt">
                <input type="hidden" name="id_comment" value="" readonly>
                <input type="hidden" name="id_report" value="" readonly>

                <label for="content">Content</label>
                <input class="form-control" type="text" name="content" value="" readonly>

                <label for="reason">Reason:</label>
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
                url: 'http://localhost/For-Us/app/user/requestControllers/reports/reportedcomt.php',
                dataSrc: json => json.data
            },
            columns: [{
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
                    title: 'Actions',
                    render: function(data, type, row) {
                        var state = row.state;
                        if (state === 0) {
                            return '<button class="button danger-button btn-view-comment" data-id_comment="' + row.id_comment + '">Delete</button>';
                        } else {
                            return '';
                        }
                    }
                },

            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-comment').on('click', function() {
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
        $('#datamodal input[name="id_comment"]').val(postData.id_comment);
        $('#datamodal input[name="id_report"]').val(postData.id_report);
        $('#datamodal input[name="content"]').val(postData.content);
        $('#datamodal input[name="reason"]').val(postData.reason);
        $('#datamodal').css('display', 'block');
    }
</script>
<script>
    function showInput() {
        var selectElement = document.getElementById("select");
        var reasonInput = document.getElementById("reason");

        reasonInput.innerHTML = '';

        if (selectElement.value === "Other") {
            var inputElement = document.createElement("input");
            inputElement.type = "text";
            inputElement.placeholder = "Please specify";
            inputElement.name = "reasonInput";
            reasonInput.appendChild(inputElement);
        }
    }
</script>