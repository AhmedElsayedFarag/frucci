<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.products')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.products')); ?>

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
                            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary btn-block my-2 waves-effect waves-light"><?php echo e(trans('admin_content.add_product')); ?> </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.name')); ?></th>
                                    <th><?php echo e(trans('admin_content.price_before')); ?></th>
                                    <th><?php echo e(trans('admin_content.price_after')); ?></th>
                                    <th><?php echo e(trans('admin_content.quantity')); ?></th>
                                    <th><?php echo e(trans('admin_content.serial_number')); ?></th>
                                    <th><?php echo e(trans('admin_content.thumbnail')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e($product->price_before); ?></td>
                                        <td><?php echo e($product->price_after); ?></td>
                                        <td><?php echo e($product->quantity); ?></td>
                                        <td><?php echo e($product->serial_number); ?></td>
                                        <td><img src="<?php echo e(asset($product->thumbnail)); ?>" alt="ad" style="width:200px; height:100px"></td>
                                        <td>
                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>"><i class="fa fa-edit"></i></a>

                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="<?php echo e($product->id); ?>" delete_url="/products/" href="#">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/products/index.blade.php ENDPATH**/ ?>