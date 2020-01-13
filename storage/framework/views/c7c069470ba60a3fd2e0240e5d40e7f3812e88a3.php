<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="<?php echo e((\App()->getLocale()=='ar')?'data-textdirection="rtl"':'data-textdirection="ltr"'); ?>">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?php echo $__env->yieldContent('pageTitle'); ?> | <?php echo $__env->yieldContent('pageSubTitle'); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('admin/app-assets/app-assets/images/ico/apple-icon-120.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('admin/app-assets/images/ico/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <?php if(\App()->getLocale()=='ar'): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/vendors-rtl.min.css')); ?>">

    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/vendors.min.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/charts/apexcharts.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/tether-theme-arrows.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/tether.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/vendors/css/extensions/shepherd-theme-default.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <?php $locale=(\App()->getLocale()=='ar')?'-rtl':''; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/themes/semi-dark-layout.css')); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/pages/dashboard-analytics.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/pages/card-analytics.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css'.$locale.'/plugins/tour/tour.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css'.$locale.'/style.css')); ?>">
    <?php if($locale=='ar'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/style-rtl.css')); ?>">
    <?php endif; ?>

    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('admin/app-assets/vendors/js/vendors.min.js')); ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app-assets/vendors/js/extensions/tether.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app-assets/vendors/js/extensions/shepherd.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('admin/app-assets/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app-assets/js/core/app.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app-assets/js/scripts/components.js')); ?>"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('admin/app-assets/js/scripts/pages/dashboard-analytics.js')); ?>"></script>
<!-- END: Page JS-->

<?php echo $__env->yieldContent('scripts'); ?>

</body>
<!-- END: Body-->

</html>
<?php /**PATH F:\arrr\projects\New folder\frucci\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>