<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/img/po.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/sidebar-assets/css/style.css">

    <!-- JS -->
    <script src="<?= base_url(); ?>/sidebar-assets/js/solid.js"></script>
    <script src="<?= base_url(); ?>/sidebar-assets/js/fontawesome.js"></script>
    <script src="<?= base_url(); ?>/sidebar-assets/js/jquery-3.3.1.slim.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0f01835ff.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.min.js"></script>

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
    
    <script src="<?= base_url(); ?>/sidebar-assets/js/script.js"></script>
    <script src="<?= base_url(); ?>/sidebar-assets/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>