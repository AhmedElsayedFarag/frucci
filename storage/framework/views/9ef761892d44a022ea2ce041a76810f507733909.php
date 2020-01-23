<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.add_store')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo e(trans('admin_content.stores')); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin_content.main')); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.add_store')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.add_store')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('stores.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="name_en" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.address_en')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.address')); ?>" name="address_en" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_address')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <span><?php echo e(trans('admin_content.working_times_en')); ?></span>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea  class="form-control myTextArea" rows="7" placeholder="<?php echo e(trans('admin_content.working_times')); ?>" name="working_times_en"></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.name_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="name_ar" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.address_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.address')); ?>" name="address_ar" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_address')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.working_times_ar')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea  class="form-control myTextArea" rows="7" placeholder="<?php echo e(trans('admin_content.working_times')); ?>" name="working_times_ar"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.phone')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="<?php echo e(trans('admin_content.phone')); ?>" minlength="10" maxlength="14" name="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.location')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <div id="map" style="height: 350px;"></div>
                                                <input type="hidden" name="lat" id="lat">
                                                <input type="hidden" name="long" id="lng">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group  col-md-6">
                                        <label><?php echo e(trans('admin_content.city')); ?></label>
                                        <select class="form-control" name ="city_id" required>
                                            <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e(trans('admin_content.please_enter_city')); ?>

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
        var map = L.map('map').setView([24.774265, 46.738586], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([24.774265, 46.738586],{
            draggable: true

        }).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();

        marker.on('dragend', function (e) {
            var lat = marker.getLatLng().lat;
            var lng = marker.getLatLng().lng;
            $('#lat').val(lat);
            $('#lng').val(lng);
            console.log(lat);
            console.log(lng);
        });

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/stores/create.blade.php ENDPATH**/ ?>