<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="suspend-user-modal" class="modal text-content">
    <form class="" id="suspendUser-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Suspend User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="reportId" value="">

                <label for="userId">Reported User:</label>
                <input class="form-control" type="text" name="userId" readonly>

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
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            processing: true,
            //   serverSide: true,
            ajax: {
                url: "http://forus.com/reports/getReportedUsers",
                dataSrc: ""
            },
            columns: [{
                    title: 'ID',
                    data: 'id'
                },
                {
                    title: 'Reported User',
                    data: 'reportedUser'
                },
                {
                    title: 'Reporting user',
                    data: 'userId'
                },
                {
                    title: 'Reason',
                    data: 'reason'
                },
                {
                    title: 'Status',
                    data: 'active'
                },
                {
                    title: 'Actions',
                    render: function(data, type, row) {
                        var idUser = row.userId;
                        if ( row.active_user === 1) {
                            return '<button class="button warning-button btn-view-user" data-userId="' + idUser + '">Suspend</button>';
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
                        suspendUserModal(rowData);
                    }
                });
            }
        });
    });


</script>