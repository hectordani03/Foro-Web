<?php

    unset(
        $_SESSION["id"],
    );
    session_destroy();
    header("Location: ./login.php");
