<script src="<?php echo APP_URL; ?>js/card-menu.js"></script>
<script src="<?php echo APP_URL; ?>js/card-comment.js"></script>
<script src="<?php echo APP_URL; ?>js/card-share.js"></script>
<script src="<?php echo APP_URL; ?>js/contentPolicy.js"></script>
<script src="<?php echo APP_URL; ?>js/privacyPolicy.js"></script>
<script src="<?php echo APP_URL; ?>js/navbarUser.js"></script>
<script src="<?php echo APP_URL; ?>js/edit-profile.js"></script>
<script src="<?php echo APP_URL; ?>js/ajax.js"></script>
<script>
    var currentUser = {
        id: <?php echo json_encode($_SESSION['id']); ?>,
        username: <?php echo json_encode($_SESSION['username']); ?>,
        email: <?php echo json_encode($_SESSION['email']); ?>,
        age: <?php echo json_encode($_SESSION['age']); ?>,
        nacionality: <?php echo json_encode($_SESSION['nacionality']); ?>,
        description: <?php echo json_encode($_SESSION['description']); ?>,
        profile_picture: <?php echo json_encode($_SESSION['photo']); ?>
    };
</script>
</body>

</html>