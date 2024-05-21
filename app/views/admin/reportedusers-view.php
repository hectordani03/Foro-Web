<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="suspend-modal" class="modal text-content">
    <form class="" id="suspendu-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Suspend User</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="reportId" id="reportId">
                <input type="hidden" name="email" id="email">
                <input type="hidden" name="username" id="username">

                <label for="userId">Reported User:</label>
                <input class="form-control" type="text" name="userId" id="userId" readonly>

                <label for="reason">Reason</label>
                <input class="form-control" type="text" name="reason" id="reason" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" readonly>

                <label for="period">Suspension days:</label>
                <select name="period" id="period" class="form-control" required>
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
<div id="remove-ban-modal" class="modal text-content">
    <form class="" id="removebu-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Remove Ban</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="reportId" id="reportId">
                <input type="hidden" name="email" id="email">
                <input type="hidden" name="username" id="username">

                <label for="userId">Reported User:</label>
                <input class="form-control" type="text" name="userId" id="userIdrb" readonly>

                <label for="reason">Reason</label>
                <input class="form-control" type="text" name="reason" id="reasonrb" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" readonly>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button report-button">Remove ban</button>
            </div>
        </div>
    </form>
</div>

<table id="reportUserDT" class="hover row-border table"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    $(function() {
        app_ad.suspendUser();
        app_ad.removeBanUser();
        app_ad.reportUserDT();
    });
</script>