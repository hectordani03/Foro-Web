<?php
setFooter($d, "sweetalert2.all.min", "jquery", "functions", "contentPolicy", "navbarUser", "app", "objetive-info", "post", "comment");
?>
<script>
    $(function() {
        app.user.sv = <?= $ua->sv ? 'true' : 'false' ?>;
        app.user.id = <?= $ua->id ?? '""' ?>;
        app.user.username = "<?= $ua->username ?? '' ?>";
        app.user.role = "<?= $ua->role ?? '' ?>";
        app.user.pic = "<?= $ua->profilePic ?? '' ?>";
    });

    $(function() {
        app.categories();
        post.sharePost();
        comment.createComment();
        comment.replyComment();
    });
</script>

<?php

closeFooter();
?>