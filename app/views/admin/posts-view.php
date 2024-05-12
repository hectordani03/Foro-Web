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
                url: "http://forus.com/posts/getPosts",
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
                    title: 'Content',
                    data: 'text'
                },
                {
                    title: 'Category',
                    data: 'category'
                },
                {
                    title: 'Img',
                    data: 'img',
                    render: function(data, type, row) {
                        if (type === 'display' && data) {
                            return '<img src="http://forus.com/resources/assets/img/post/' + data + '" alt="Image" width="40" height="40">';
                        } else {
                            return data;
                        }
                    }
                },
                {
                    title: 'Created at',
                    data: 'created_at'
                },
                {
                    title: 'Report',
                    render: function(data, type, row) {
                        return '<button class="button warning-button btn-view-post" data-id="' + row.id + '">Report</button>';
                    }
                },

            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center');

                $('.btn-view-post').on('click', function() {
                    const rowData = dataTable.row($(this).closest('tr')).data();

                    if (rowData) {
                        reportPostModal(rowData);
                    } 
                });
            }
        });
    });
    $(function() {
        app_ad.reportPost();
    });
</script>