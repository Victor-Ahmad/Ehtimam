<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo e(__('dash.login')); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset(app()->getLocale().'/assets/img/favicon.ico')); ?>"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo e(asset(app()->getLocale().'/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset(app()->getLocale().'/assets/css/plugins.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset(app()->getLocale().'/assets/css/authentication/form-2.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(app()->getLocale().'/assets/css/forms/theme-checkbox-radio.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(app()->getLocale().'/assets/css/forms/switches.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap">
    <style>
        body{
            font-family: Cairo, Serif !important;
        }
        .form-form .form-container{
            min-height: auto!important;
        }
        .btn-primary {
            color: #fff !important;
            background-color: #1b4269 !important;
            border-color: #1b4269;
            box-shadow: 0 10px 20px -10px #1b4269;
        }

    </style>
</head>
<body class="form">
<?php echo $__env->yieldContent('content'); ?>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo e(asset(app()->getLocale().'/assets/js/libs/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset(app()->getLocale().'/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset(app()->getLocale().'/bootstrap/js/bootstrap.min.js')); ?>"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo e(asset(app()->getLocale().'/assets/js/authentication/form-2.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/layout/guest.blade.php ENDPATH**/ ?>