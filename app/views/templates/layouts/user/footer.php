<?php
setFooter($d, "sweetalert2.all.min", "alerts", "jquery", "card-menu", "card-comment", "card-share", "contentPolicy", "privacyPolicy", "navbarUser", "app", "post", "profile");
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
        profile.userPosts();
    });
</script>
<?php

closeFooter();
?>