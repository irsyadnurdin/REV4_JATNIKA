<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN - SISTEM INFORMASI INVENTARIS</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="keywords" content="LOGIN - SISTEM INFORMASI INVENTARIS" />
        <meta name="description" content="LOGIN - SISTEM INFORMASI INVENTARIS">
        <meta name="author" content="IRSYAD NURDIN">

        <link href="<?= base_url('_img/favicon.png') ?>" rel="icon">
        <link href="<?= base_url('_img/favicon.png') ?>" rel="apple-touch-icon">

        <!-- SWEETALERT2 -->
        <link href="<?= base_url('sweetalert/sweetalert2.css') ?>" rel="stylesheet">
        
        <!-- TEMP_LOGIN -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/animate/animate.css') ?>">	
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/css-hamburgers/hamburgers.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/animsition/css/animsition.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/select2/select2.min.css') ?>">	
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/vendor/daterangepicker/daterangepicker.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/css/util.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('temp_login/css/main.css') ?>">
    </head>

    <body>    
        <!-- =========================================================================== -->
        <!-- =========================================================================== -->

        <?= $this->renderSection('content') ?>

        <!-- =========================================================================== -->
        <!-- =========================================================================== -->
            
        <!-- BOOTSTRAP -->
        <script src="<?= base_url('js/jquery.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('bootstrap/js/bootstrap.bundle.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('bootstrap/js/bootstrap.js') ?>" type="text/javascript"></script>

        <!-- SWEETALERT2 -->
        <script src="<?= base_url('sweetalert/sweetalert2.js') ?>" type="text/javascript"></script>

        <!-- TEMP_LOGIN -->
        <script src="<?= base_url('temp_login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/animsition/js/animsition.min.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/bootstrap/js/popper.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/select2/select2.min.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/daterangepicker/moment.min.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/daterangepicker/daterangepicker.js') ?>"></script>
        <script src="<?= base_url('temp_login/vendor/countdowntime/countdowntime.js') ?>"></script>
        <script src="<?= base_url('temp_login/js/main.js') ?>"></script>
        
        <!-- =========================================================================== -->
        <!-- =========================================================================== -->

        <?= $this->renderSection('javascript') ?>

        <!-- =========================================================================== -->
        <!-- =========================================================================== -->
        
    </body>
</html>