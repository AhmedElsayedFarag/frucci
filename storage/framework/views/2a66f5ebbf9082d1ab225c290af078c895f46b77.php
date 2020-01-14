<div>

        <?php if(Session::has('success')): ?>
            <div class="alert alert-success alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>



        <?php if(Session::has('errors')): ?>
            <div class="alert alert-danger alert-styled-left media">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?><br/>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>


        
        
        
        
        
        

</div>
<?php /**PATH F:\arrr\projects\New folder\frucci\resources\views/alert.blade.php ENDPATH**/ ?>