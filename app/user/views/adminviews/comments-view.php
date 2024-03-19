<div id="datamodal" class="modal text-content">
    <form class="requestForm" action="<?php echo APP_URL; ?>user/requestControllers/comments/comtRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Report Comt</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="comt_module" value="reportComt">
                <input type="hidden" name="id_comment" value="" readonly>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/requestControllers/comments/comtData.php',
                dataSrc: json => json.data
            },

            columns: [{
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
                {
                    title: 'Report',
                    render: function(data, type, row) {
                        return '<button class="button warning-button btn-view-comment" data-id_comment="' + row.id_comment + '">Report</button>';
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
        $('#datamodal input[name="content"]').val(postData.content);
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