
<?php
setFooter($d, "sweetalert2.all.min", "jquery", "functions", "jquery.DT.min", "app", "alerts", "navbar", "modal", "app_ad", "chart");
?>
<script>
    $(function() {
        app.user.sv = <?= $ua->sv ? 'true' : 'false' ?>;
        app.user.id = <?= $ua->id ?? '""' ?>;
        app.user.username = "<?= $ua->username ?? '' ?>";
        app.user.role = "<?= $ua->role ?? '' ?>";
        app.user.pic = "<?= $ua->profilePic ?? '' ?>";
    });
</script>

<?php
closeFooter();
