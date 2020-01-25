<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                <ul class="menu-content">
                    <li class="active"><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('questions.index')); ?>"><i class="fa fa-question"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.questions')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('sliders.index')); ?>"><i class="fa fa-arrows"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.sliders')); ?></span></a>

            <li class=" nav-item"><a href="<?php echo e(route('brands.index')); ?>"><i class="fa fa-shirtsinbulk"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.brands')); ?></span></a>

            <li class=" nav-item"><a href="<?php echo e(route('countries-cities.index')); ?>"><i class="fa fa-flag"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.countries_cities')); ?></span></a>

            <li class=" nav-item"><a href="<?php echo e(route('categories.index')); ?>"><i class="fa fa-joomla"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.categories')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-barcode"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.products')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('stores.index')); ?>"><i class="fa fa-life-ring"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.stores')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.users')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('packages.index')); ?>"><i class="fa fa-angellist"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.packages')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('subscribers')); ?>"><i class="fa fa-envelope"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.subscribers')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('contacts.index')); ?>"><i class="fa fa-phone"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.contacts')); ?></span></a>
            </li>

            <li class=" nav-item"><a href="<?php echo e(route('coupons.index')); ?>"><i class="fa fa-battery-full"></i><span class="menu-title" data-i18n="Email"><?php echo e(trans('admin_sidebar.coupons')); ?></span></a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>