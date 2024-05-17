<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="delete-post-modal" class="modal text-content">
    <form class="" id="deletep-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Delete Post</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="img" id="img" readonly>

                <label for="content">Post ID</label>
                <input class="form-control" type="text" name="postId" id="postId" readonly>

                <label for="reason">Report</label>
                <input class="form-control" type="text" name="reason" id="reason" readonly>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button delete-button">Delete</button>
            </div>
        </div>
    </form>
</div>

<table id="reportPostDT" class="hover row-border table"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    $(function() {
        app_ad.deletePost();
        app_ad.reportPostDT();
    });
</script>