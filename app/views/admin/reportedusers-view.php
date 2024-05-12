<div id="datamodal" class="modal text-content">
    <form class="requestForm" action="<?= REQUEST; ?>users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Suspend User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_module" value="suspendUser">
                <input type="hidden" name="id_report" value="">


                <label for="id_user">Reported User:</label>
                <input class="form-control" type="text" name="id_user" readonly>

                <label for="reason">Reason</label>
                <input class="form-control" type="text" name="reason" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" readonly>

                <label for="suspension">Suspension days:</label>
                <select name="suspension" class="form-control" required>
                    <option selected value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="7">1 week</option>
                    <option value="31">1 month</option>
                    <option value="0">Definitive suspension</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button report-button">Suspend</button>
            </div>
        </div>
    </form>
</div>

<table id="datatable" class="hover row-border table"></table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/requestControllers/reports/reporteduser.php',
                dataSrc: json => json.data
            },
            columns: [{
                    title: 'Reported User',
                    data: 'id_user'
                },
                {
                    title: 'Reporting user',
                    data: 'id_reporting_user'
                },
                {
                    title: 'Reason',
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
                        var idUser = row.id_user;
                        var isSuspended = row.id_suspended_user !== null;
                        if (state === 0 && !isSuspended) {
                            return '<button class="button warning-button btn-view-user" data-id_user="' + idUser + '">Suspend</button>';
                        } else {
                            return '';
                        }
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-user').on('click', function() {
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

    function openModal(userData) {
        $('#datamodal input[name="id_user"]').val(userData.id_user);
        $('#datamodal input[name="id_report"]').val(userData.id_report);
        $('#datamodal input[name="reason"]').val(userData.reason);
        $('#datamodal').css('display', 'block');
    }
</script>