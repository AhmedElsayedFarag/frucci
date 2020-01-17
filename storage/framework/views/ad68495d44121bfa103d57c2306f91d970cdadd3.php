<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.edit_question')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.questions')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_question')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_question')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('questions.update', $question->id)); ?>">
                            <?php echo e(method_field('PATCH')); ?> <?php echo e(csrf_token()); ?>

                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
<?php $__currentLoopData = $question->getTranslationsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans("admin_content.question")); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" placeholder="<?php echo e(trans('admin_content.question')); ?>" name="<?php echo e("question_$locale"); ?>" required><?php echo e($value['question']); ?></textarea>
                                                    <div class="invalid-feedback">
                                                        <?php echo e(trans('admin_content.please_enter_question')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span><?php echo e(trans("admin_content.answer")); ?></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" placeholder="<?php echo e(trans('admin_content.answer')); ?>" name="<?php echo e("answer_$locale"); ?>" required><?php echo e($value['answer']); ?></textarea>
                                                    <div class="invalid-feedback">
                                                        <?php echo e(trans('admin_content.please_enter_question')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/questions/edit.blade.php ENDPATH**/ ?>