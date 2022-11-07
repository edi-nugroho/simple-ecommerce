<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="sidebar-assets/css/style.css">
    <link rel="stylesheet" href="sidebar-assets/css/bootstrap.min.css">

    <!-- JS -->
    <link rel="stylesheet" href="sidebar-assets/js/solid.js">
    <link rel="stylesheet" href="sidebar-assets/js/fontawesome.js">
    <script src="sidebar-assets/js/jquery-3.3.1.slim.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0f01835ff.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?= $this->include('layouts/admin/sidebar'); ?>

        <!-- Page Content  -->
        <div id="content">
            <!-- Navbar -->
            <?= $this->include('layouts/admin/navbar'); ?>

            <!-- Main Content -->
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
    
    <script src="sidebar-assets/js/script.js"></script>
    <script src="sidebar-assets/js/popper.min.js"></script>
    <script src="sidebar-assets/js/bootstrap.min.js"></script>
</body>
</html>