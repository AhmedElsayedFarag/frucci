<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.categories')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.categories')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_category')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_category')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="<?php echo e(route('categories.update', $category->id)); ?>">
                            <?php echo e(method_field('PATCH')); ?>  <?php echo e(csrf_field()); ?>

                            <div class="form-body">
                                <div class="row">
                                    <?php $__currentLoopData = $category->getTranslationsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.name_ar')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" placeholder="<?php echo e(trans('admin_content.category')); ?>" name="<?php echo e("name_$locale"); ?>" value="<?php echo e($value['name']); ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.image')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" name="image">
                                                    <div class="invalid-feedback">
                                                        <?php echo e(trans('admin_content.please_upload_image')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.main_category')); ?></label>
                                        <select class="form-control" name ="parent_id" required>
                                            <option value="" selected disabled><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <option value="0"><?php echo e(trans('admin_content.without_main_category')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($category->parent_id == $cat->id ? 'selected' : ''); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_enter_name')); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>