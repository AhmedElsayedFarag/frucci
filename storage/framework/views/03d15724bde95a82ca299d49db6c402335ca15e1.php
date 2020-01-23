<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.edit_product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.products')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_product')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_product')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="<?php echo e(route('products.update', $product->id)); ?>">
                            <?php echo e(method_field('PATCH')); ?> <?php echo e(csrf_field()); ?>

                            <div class="form-body">
                                <div class="row">
                                    <?php $__currentLoopData = $product->getTranslationsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.name_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="<?php echo e("name_$locale"); ?>" value="<?php echo e($value['name']); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.description_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="<?php echo e("description_$locale"); ?>" required><?php echo e($value['description']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.short_description_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="<?php echo e("short_description_$locale"); ?>" required><?php echo e($value['short_description']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.pattern_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.pattern')); ?>" name="<?php echo e("pattern_$locale"); ?>" value="<?php echo e($value['pattern']); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.material_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.material')); ?>" name="<?php echo e("material_$locale"); ?>" value="<?php echo e($value['material']); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.size_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.size')); ?>" name="<?php echo e("size_$locale"); ?>" value="<?php echo e($value['size']); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.price_before')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.price_before')); ?>" name="price_before" value="<?php echo e($product->price_before); ?>" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.price_after')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.price_after')); ?>" name="price_after" value="<?php echo e($product->price_after); ?>" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.colors')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="color" class="form-control" placeholder="<?php echo e(trans('admin_content.colors')); ?>" name="colors" value="<?php echo e($product->colors); ?>">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group  col-md-6">
                                            <label><?php echo e(trans('admin_content.status')); ?></label>
                                            <select class="form-control" name ="status" required>
                                                <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                                <option <?php if($product->status == 0): ?> selected <?php endif; ?> value="0"><?php echo e(trans('admin_content.not_available')); ?></option>
                                                <option <?php if($product->status == 1): ?> selected <?php endif; ?> value="1"><?php echo e(trans('admin_content.available')); ?></option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo e(trans('admin_content.please_enter_state')); ?>

                                            </div>
                                        </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.quantity')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.quantity')); ?>" name="quantity" value="<?php echo e($product->quantity); ?>" min="0" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.serial_number')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.serial_number')); ?>" name="serial_number" value="<?php echo e($product->serial_number); ?>" min="0" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.brand')); ?></label>
                                        <select class="form-control" name ="brand_id" required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($product->brand_id == $brand->id ? 'selected' : ''); ?> value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_enter_name')); ?>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.image')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="thumbnail" accept=".gif, .jpg, .png, .webp">
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_upload_image')); ?>

                                                </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>