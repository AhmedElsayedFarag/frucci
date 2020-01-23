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
                                        <td><?php echo e($user->is_active == 1 ? trans('admin_content.active') : trans('admin_content.banned')); ?></td>
                                        <td><img src="<?php echo e(asset($user->image ? asset($user->image) : 'avatar.png')); ?>" alt="user" style="width:200px; height:100px"></td>
                                        <?php if(auth()->id()): ?>
                                        <td>
                                            <a <?php if($user-> is_active == 0 ): ?> title="unban" <?php else: ?> title="ban" <?php endif; ?> onclick="return true;" id="confirm-color" object_id='<?php echo e($user->id); ?>' object_status='<?php echo e($user->is_active); ?>'  class="ban-unlock">
                                                <?php if($user->is_active == 1): ?><i class="fa fa-ban"></i> <?php else: ?> <i class="fa fa-unlock"></i><?php endif; ?> </a>
                                        </td>
                                        <?php endif; ?>
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
    <!--end div-->

<?php $__env->stopSection(); ?>










<?php $__env->startSection('scripts'); ?>
    <script>


        $(document).on('click', '.ban-unlock', function (e) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'swal2-confirm',
                    cancelButton: 'swal2-cancel'
                },
                buttonsStyling: true
            });
            swalWithBootstrapButtons.fire({
                title: '<?php echo e(trans('sweet_alert.title')); ?>',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '<?php echo e(trans('sweet_alert.yes')); ?>',
                cancelButtonText: '<?php echo e(trans('sweet_alert.no')); ?>',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    var id = $(this).attr('object_id');
                    var status = $(this).attr('object_status');
                        token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'post',
                        url: 'ban-user/'+id,
                        data: {
                            _method:'get',
                            _token: token
                        } ,
                        dataType: 'json',
                        success: function(response) {

                            if (response === 'ban') {
                                Swal.fire({
                                    type: 'success',
                                    title: '<?php echo e(trans('sweet_alert.banned')); ?>',
                                    showConfirmButton: false,
                                    timer: 1500



                                })
                                window.location.reload();

                            } else if (response === 'unban') {
                                Swal.fire({
                                    type: 'success',
                                    title: '<?php echo e(trans('sweet_alert.unbanned')); ?>',
                                    showConfirmButton: false,
                                    timer: 1500


                                })
                                window.location.reload();









                            }


                        }
                    });
                } else if (
                    // / Read more about handling dismissals below /
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: '<?php echo e(trans('sweet_alert.cancelled')); ?>',
                        showConfirmButton: false,
                        timer: 1000
                    });

                }
            })
        });



    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/users/index.blade.php ENDPATH**/ ?>