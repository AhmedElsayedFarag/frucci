<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.coupons')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.coupons')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.coupons')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="<?php echo e(route('coupons.create')); ?>" class="btn btn-primary btn-block my-2 waves-effect waves-light"><?php echo e(trans('admin_content.add_coupon')); ?> </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.coupon')); ?></th>
                                    <th><?php echo e(trans('admin_content.option')); ?></th>
                                    <th><?php echo e(trans('admin_content.brand')); ?></th>
                                    <th><?php echo e(trans('admin_content.type_coupon')); ?></th>
                                    <th><?php echo e(trans('admin_content.value')); ?></th>
                                    <th><?php echo e(trans('admin_content.expire_date')); ?></th>
                                    <th><?php echo e(trans('admin_content.number_of_users')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($coupon->coupon); ?></td>
                                        <?php if($coupon->option == 'brand'): ?>
                                        <td><?php echo e(trans('admin_content.brand')); ?></td>
                                        <?php else: ?>
                                        <td><?php echo e(trans('admin_content.products')); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e(optional($coupon->brand)->name); ?></td>
                                        <?php if($coupon->type == 'percentage'): ?>
                                            <td><?php echo e(trans('admin_content.percentage')); ?></td>
                                        <?php else: ?>
                                            <td><?php echo e(trans('admin_content.discount')); ?></td>
                                        <?php endif; ?>
                                        <?php if($coupon->type == 'discount'): ?>
                                            <td><?php echo e($coupon->value . ' ' . trans('admin_content.currency')); ?></td>
                                        <?php else: ?>
                                            <td><?php echo e($coupon->value); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($coupon->expire_date); ?></td>
                                        <td><?php echo e($coupon->number_of_users); ?></td>
                                        <td>
                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="<?php echo e($coupon->id); ?>" delete_url="/coupons/" href="#">
                                            <i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/coupons/index.blade.php ENDPATH**/ ?>