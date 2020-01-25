<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.add_coupon')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.coupons')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.add_coupon')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.add_coupon')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('coupons.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.coupon')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="<?php echo e(trans('admin_content.coupon')); ?>" name="coupon" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_coupon')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.option')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <label><?php echo e(trans('admin_content.brand')); ?><input type="radio" id='enable_brand' name="option" value="brand" required></label>
                                                <label><?php echo e(trans('admin_content.products')); ?><input type="radio" id="disable_brand" name="option" value="products" required></label>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_choose_one')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.type_coupon')); ?></label>
                                        <select class="form-control" id="change_type" name ="type" required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <option value="percentage"><?php echo e(trans('admin_content.percentage')); ?></option>
                                            <option value="discount"><?php echo e(trans('admin_content.discount')); ?></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_choose_type')); ?>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.value')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" id="change_value" placeholder="<?php echo e(trans('admin_content.value')); ?>" step="any" min="" max="" name="value" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_value')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.expire_date')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="date" id="valid_date" class="form-control" min="" placeholder="<?php echo e(trans('admin_content.expire_date')); ?>" name="expire_date">
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_expire_date')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.number_of_users')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="<?php echo e(trans('admin_content.number_of_users')); ?>" name="number_of_users">
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_number_of_users')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.brand')); ?></label>
                                        <select class="form-control" name ="brand_id" id="select_brand" disabled required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_choose_brand')); ?>

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
        $('#change_type').change(function(){
            if($(this).val() === 'percentage'){
               $('#change_value').attr({
                   "max" : 0.99,
                   "min" : 0.01
               });



            }else{
                $('#change_value').attr({
                    'min': 1,
                    'max' : 1000000,
                });
            }
        });
    </script>

    <script>
        $('#disable_brand').click(function(){

                $('#select_brand').attr('disabled', 'disabled');

        });

        $('#enable_brand').click(function(){
            $('#select_brand').removeAttr('disabled');



        });
    </script>

    <script>
        $('#valid_date').click(function ()
        {
            var todaysDate = new Date();
            var year = todaysDate.getFullYear();
            var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);
            var day = ("0" + todaysDate.getDate()).slice(-2);
            var minDate = (year +"-"+ month +"-"+ day);
            $('#valid_date').attr('min',minDate);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/coupons/create.blade.php ENDPATH**/ ?>