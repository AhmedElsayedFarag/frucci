<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.edit_slider')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.sliders')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_slider')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_slider')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="<?php echo e(route('sliders.update', $slider->id)); ?>">
                            <?php echo e(method_field('PATCH')); ?>  <?php echo e(csrf_field()); ?>

                            <div class="form-body">
                                <div class="row">
                                    <?php $__currentLoopData = $slider->getTranslationsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.head')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.head')); ?>" name="<?php echo e("head_$locale"); ?>" value="<?php echo e($value['head']); ?>">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.link_title')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.link_title')); ?>" name="<?php echo e("link_title_$locale"); ?>" value="<?php echo e($value['link_title']); ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.link')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="url" class="form-control" placeholder="<?php echo e(trans('admin_content.link')); ?>" name="link" value="<?php echo e($slider->link); ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.image')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><?php echo e(trans('admin_content.edit')); ?></button>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/sliders/edit.blade.php ENDPATH**/ ?>