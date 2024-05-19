<?php
setFooter($d, "sweetalert2.all.min", "alerts", "jquery", "functions", "contentPolicy", "navbarUser", "app", "post", "comment");
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        app.user.sv = <?= $ua->sv ? 'true' : 'false' ?>;
        app.user.id = <?= $ua->id ?? '""' ?>;
        app.user.username = "<?= $ua->username ?? '' ?>";
        app.user.role = "<?= $ua->role ?? '' ?>";
        app.user.pic = "<?= $ua->profilePic ?? '' ?>";
    });
</script>


<script>
    $(function() {
        app.allPosts();
        post.addPosts();
        post.sharePost();
        comment.comment();
    });
</script>
<?php

closeFooter();
?>