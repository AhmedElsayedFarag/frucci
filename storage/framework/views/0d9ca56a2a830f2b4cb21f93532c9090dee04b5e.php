<?php $__env->startSection('pageTitle'); ?><?php echo e((App()->getLocale() == 'ar') ? 'لوحة التحكم' : 'Dashboard'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e((App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e((App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('main')); ?>"><?php echo e((App()->getLocale() == 'ar') ? 'الرئيسية' : 'Main'); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e((App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <a href="<?php echo e(route('questions.create')); ?>" class="btn btn-primary btn-block my-2 waves-effect waves-light"><?php echo e((App()->getLocale() == 'ar') ? 'اضافة سؤال' : 'Add question'); ?> </a>
            <table class="table table-bordered mb-0">
                <thead>
                <tr align="center">
                    <th>#</th>
                    <th><?php echo e((App()->getLocale() == 'ar') ? 'السؤال' : 'Question'); ?></th>
                    <th><?php echo e((App()->getLocale() == 'ar') ? 'الاجابة' : 'Answer'); ?></th>
                    <th><?php echo e((App()->getLocale() == 'ar') ? 'الاجراء المتخذ' : 'Taken action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr align="center">
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($question->question); ?></td>
                        <td><?php echo e($question->answer); ?></td>
                        <td>
                            <a href="<?php echo e(route('questions.edit', $question->id)); ?>"><i class="fa fa-edit"></i></a>

                           <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="<?php echo e($question->id); ?>" delete_url="/questions/" href="#">
                                <i class="fa fa-times"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


    </div>
    <!--end div-->

<?php $__env->stopSection(); ?>










<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\arrr\projects\New folder\frucci\resources\views/admin/questions/index.blade.php ENDPATH**/ ?>