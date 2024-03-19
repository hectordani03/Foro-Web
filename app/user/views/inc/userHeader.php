<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> -->
    <link rel="icon" href="<?php echo APP_URL; ?>assets/logo.png">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>css/index.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        #nav-header {
            overflow-y: hidden;
            transition: overflow-y 0.5s;
        }

        #nav-header:hover {
            overflow-y: auto;
        }

        #nav-header::-webkit-scrollbar {
            width: 8px;
        }

        #nav-header::-webkit-scrollbar-track {
            background: transparent;
        }

        #nav-header::-webkit-scrollbar-thumb {
            background-color: #a6a6a6;
            border-radius: 4px;
        }

        #nav-header::-webkit-scrollbar-thumb:hover {
            background-color: #888;
        }
    </style>
</head>

<body id="body-content" class="flex dark:bg-slate-800">
    <?php
    require_once './views/inc/userNavbar.php';

    ?>