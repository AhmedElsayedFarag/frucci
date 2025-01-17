<?php $__env->startSection('pageTitle'); ?><?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?> <?php echo e(trans('admin_content.categories')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.categories')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.categories')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>


        
            
                
                    
                        
                            
                            
                                
                                
                                    
                                    
                                    
                                    
                                    
                                    
                                
                                
                                
                                
                                    
                                        
                                        
                                        
                                        
                                        
                                        
                                            

                                            
                                                
                                        
                                    
                                
                                
                            
                        
                    
                
            
        
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الأقسام الرئيسية</h4>
                    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary btn-block my-2 waves-effect waves-light"><?php echo e(trans('admin_content.add_category')); ?> </a>

                </div>
                <div class="card-content" >
                    <div class="card-body card-dashboard" >
                        <div class="table-responsive" style="overflow: hidden">
                            <table class="table zero-configuration">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.main_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><img src="<?php echo e(asset($category->image)); ?>" alt="category" style="width:200px; height:100px"></td>
                                        <td>
                                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>"><i class="fa fa-edit"></i></a>

                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="<?php echo e($category->id); ?>" delete_url="/categories/" href="#">
                                            <i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.main_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الأقسام الفرعية</h4>
                </div>
                <div class="card-content" >
                    <div class="card-body card-dashboard" >
                        <div class="table-responsive" style="overflow: hidden">
                            <table class="table zero-configuration">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.sub_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.sub_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr align="center">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($subCategory->name); ?></td>
                                        <td><img src="<?php echo e(asset($subCategory->image)); ?>" alt="category" style="width:200px; height:100px"></td>
                                        <td><?php echo e($subCategory->category->name); ?></td>
                                        <td><img src="<?php echo e(asset($subCategory->category->image)); ?>" alt="category" style="width:200px; height:100px"></td>
                                        <td>
                                            <a href="<?php echo e(route('categories.edit', $subCategory->id)); ?>"><i class="fa fa-edit"></i></a>

                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="<?php echo e($subCategory->id); ?>" delete_url="/categories/" href="#">
                                            <i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('admin_content.sub_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.sub_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category')); ?></th>
                                    <th><?php echo e(trans('admin_content.main_category_image')); ?></th>
                                    <th><?php echo e(trans('admin_content.taken_action')); ?></th>

                                </tr>
                                </tfoot>
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

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

    <script src="<?php echo e(asset('admin/app-assets/js/scripts/datatables/datatable.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>