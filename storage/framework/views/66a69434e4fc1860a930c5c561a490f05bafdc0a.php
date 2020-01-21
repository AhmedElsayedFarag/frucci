<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.countries_cities')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.countries_cities')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.add_country_city')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.add_country_city')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('countries-cities.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="<?php echo e(trans('admin_content.country_city')); ?>" name="name_ar" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="<?php echo e(trans('admin_content.country_city')); ?>" name="name_en" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.country')); ?></label>
                                        <select class="form-control" name ="parent_id" required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <option value="0"><?php echo e(trans('admin_content.without_country')); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_enter_name')); ?>

                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo e(trans('admin_content.add')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/countries-cities/create.blade.php ENDPATH**/ ?>