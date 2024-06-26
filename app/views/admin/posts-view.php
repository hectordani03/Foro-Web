<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div id="report-modal" class="modal text-content">
    <form class="" id="reportp-form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close closed">&times;</span>
                <h2>Report Post</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="postId" value="" readonly>

                <label for="content">Content</label>
                <input class="form-control" type="text" name="text" id="text" value="" readonly>

                <label for="category">Category</label>
                <input class="form-control" type="text" name="category" id="category" value="" readonly>

                <label for="reason">Reason:</label>
                <select name="reason" class="form-control" id="reason" onchange="showInput()" required>
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
                <div id="other-r"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button report-button">Report</button>
            </div>
        </div>
    </form>
</div>

<table id="postDT" class="hover row-border table" style="width: 100%"></table>
<?php
require_once LAYOUTS_AD . 'footer.php';
?>
<script>
    $(function() {
        app_ad.reportPost();
        app_ad.postDT();
    });
</script>