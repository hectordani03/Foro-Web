<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="delete-comt-modal" class="modal text-content">
    <form class="" id="deletec-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Delete Comt</h2>
            </div>
            <div class="modal-body">

                <label for="content">Comment ID</label>
                <input class="form-control" type="text" name="commentId" id="commentId" readonly>

                <label for="content">Content</label>
                <input class="form-control" type="text" name="content" id="content" readonly>

                <label for="reason">Reason:</label>
                <input class="form-control" type="text" name="reason" id="reason" readonly>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button delete-button">Delete</button>
            </div>
        </div>
    </form>
</div>

<table id="reportComtDT" class="hover row-border table"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    $(function() {
        app_ad.deleteComt();
        app_ad.reportComtDT();
    });
</script>