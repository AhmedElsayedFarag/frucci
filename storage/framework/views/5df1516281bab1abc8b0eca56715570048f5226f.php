<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.users')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.users')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.users')); ?>

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
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-block my-2 waves-effect waves-light"><?php echo e(trans('admin_content.add_user')); ?> </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.name')); ?></th>
                                    <th><?php echo e(trans('admin_content.email')); ?></th>
                                    <th><?php echo e(trans('admin_content.phone')); ?></th>
                                    <th><?php echo e(trans('admin_content.status')); ?></th>
                                    <th><?php echo e(trans('admin_content.image')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->phone); ?></td>
                                        <td><?php echo e($user->is_active == 1 ? trans('admin_content.active') : trans('admin_content.inactive')); ?></td>
                                        <td><img src="<?php echo e(asset($user->image ? asset($user->image) : 'default.jpg')); ?>" alt="user" style="width:200px; height:100px"></td>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/users/index.blade.php ENDPATH**/ ?>