<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.edit_settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.edit_settings')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_settings')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_settings')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('update')); ?>" enctype="multipart/form-data">
                            <?php echo e(method_field('put')); ?> <?php echo e(csrf_field()); ?>

                            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-body">
                                <div class="row">
                                    <?php if($setting->type == 'url'): ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e($setting->name); ?></span>
                                                </div>
                                                <input type="url" class="form-control" name="<?php echo e($setting->key); ?>" placeholder="<?php echo e(trans($setting->name)); ?>" value="<?php echo e($setting->value); ?>">
                                            </div>
                                        </div>

                                    <?php elseif($setting->type == 'email'): ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e($setting->name); ?></span>
                                                </div>
                                                <input type="email" class="form-control" name="<?php echo e($setting->key); ?>" placeholder="<?php echo e(trans($setting->name)); ?>" value="<?php echo e($setting->value); ?>">
                                            </div>
                                        </div>

                                    <?php elseif($setting->type == 'tel'): ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e($setting->name); ?></span>
                                                </div>
                                                <input type="tel" class="form-control" name="<?php echo e($setting->key); ?>" placeholder="<?php echo e(trans($setting->name)); ?>" value="<?php echo e($setting->value); ?>">
                                            </div>
                                        </div>
                                    <?php elseif($setting->type == 'text'): ?>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <span><?php echo e($setting->name); ?></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="<?php echo e($setting->key); ?>" placeholder="<?php echo e(trans('admin_content.location')); ?>" value="<?php echo e($setting->value); ?>">
                                                </div>
                                            </div>
                                    <?php elseif($setting->type == 'file'): ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e($setting->name); ?></span>
                                                </div>
                                                <input type="file" class="form-control" name="<?php echo e($setting->key); ?>" placeholder="<?php echo e(trans($setting->name)); ?>" accept=".gif, .jpg, .png, .webp">
                                                <img src="<?php echo e(asset($setting->value)); ?>" alt="logo" style="width:200px; height:100px"/>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo e(trans('admin_content.edit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--end div-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>