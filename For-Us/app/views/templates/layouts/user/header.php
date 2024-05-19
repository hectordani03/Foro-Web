<?php
    setHeader($d, "index", "styles");
    $ua = $d->ua;
    
?>

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

<body id="body-content" class="flex dark:bg-slate-800">
    <?php
    require_once LAYOUTS_US . 'navbar.php';
