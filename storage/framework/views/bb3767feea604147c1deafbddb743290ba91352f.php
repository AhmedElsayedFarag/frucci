<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.countries_cities')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.countries_cities')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.countries_cities')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>







































        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الدول</h4>
                </div>
                <div class="card-content" >
                    <div class="card-body card-dashboard" >
                        <div class="table-responsive" style="overflow: hidden">
                            <table class="table zero-configuration">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.country')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($city->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('countries-cities.edit', $city->id)); ?>"><i class="fa fa-edit"></i></a>

                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.country')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">المدن</h4>
                </div>
                <div class="card-content" >
                    <div class="card-body card-dashboard" >
                        <div class="table-responsive" style="overflow: hidden">
                            <table class="table zero-configuration">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.city')); ?></th>
                                    <th><?php echo e(trans('admin_content.country')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($city->name); ?></td>
                                        <td><?php echo e($city->country->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('countries-cities.edit', $city->id)); ?>"><i class="fa fa-edit"></i></a>

                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.city')); ?></th>
                                    <th><?php echo e(trans('admin_content.country')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    </div>
    <!--end div-->

<?php $__env->stopSection(); ?>










<?php $__env->startSection('scripts'); ?>

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

    <script src="<?php echo e(asset('admin/app-assets/js/scripts/datatables/datatable.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\arrr\projects\New folder\frucci\resources\views/admin/countries-cities/index.blade.php ENDPATH**/ ?>