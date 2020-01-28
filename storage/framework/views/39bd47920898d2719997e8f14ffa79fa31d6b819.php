<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.add_product')); ?>

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
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.add_product')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.add_product')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="<?php echo e(route('products.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="name_ar" required>
                                            </div>
                                        </div>


                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.description_ar')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="description_ar" required></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans('admin_content.short_description_ar')); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="short_description_ar" required></textarea>
                                                </div>
                                            </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.pattern_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.pattern')); ?>" name="pattern_ar" required>
                                            </div>
                                        </div>



                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <span><?php echo e(trans('admin_content.material_ar')); ?></span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.material')); ?>" name="material_ar" required>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <span><?php echo e(trans('admin_content.size_ar')); ?></span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.size')); ?>" name="size_ar" required>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="name_en" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.description_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="description_en" required></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.short_description_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="<?php echo e(trans('admin_content.description')); ?>" name="short_description_en" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">


                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.pattern_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.pattern')); ?>" name="pattern_en" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">


                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.material_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.material')); ?>" name="material_en" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">


                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.size_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.size')); ?>" name="size_en" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.price_before')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.price_before')); ?>" name="price_before" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.price_after')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.price_after')); ?>" name="price_after" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.colors')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <div>
                                                    <input type="color" class="form-control" placeholder="<?php echo e(trans('admin_content.colors')); ?>" name="colors[]">
                                                </div>

                                                <button type="button" class="btn btn-primary" id="addBtn">+</button>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group col-md-6">
                                            <label><?php echo e(trans('admin_content.status')); ?></label>
                                            <select class="form-control" name ="status" required>
                                                <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                                <option value="0"><?php echo e(trans('admin_content.not_available')); ?></option>
                                                <option value="1"><?php echo e(trans('admin_content.available')); ?></option>
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
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.quantity')); ?>" name="quantity" min="0" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.serial_number')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.serial_number')); ?>" name="serial_number" min="0" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.image')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="thumbnail" accept=".gif, .jpg, .png, .webp" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_upload_image')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.brand')); ?></label>
                                        <select class="form-control" name ="brand_id" required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
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
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#addBtn').click(function () {
           $(this).parent().find('div'). append('<input type="color" class="form-control" name="colors[]">\n');
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\arrr\projects\New folder\frucci\resources\views/admin/products/create.blade.php ENDPATH**/ ?>