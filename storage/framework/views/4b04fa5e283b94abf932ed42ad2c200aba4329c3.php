<?php $__env->startSection('pageTitle'); ?>
    <?php echo e(trans('admin_content.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageSubTitle'); ?>
    <?php echo e(trans('admin_content.edit_store')); ?>

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
                        <li class="breadcrumb-item active"><?php echo e(trans('admin_content.edit_store')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(trans('admin_content.edit_store')); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="form form-horizontal needs-validation" method="post" action="<?php echo e(route('stores.update', $store->id)); ?>">
                            <?php echo e(method_field('PATCH')); ?> <?php echo e(csrf_field()); ?>

                            <div class="form-body">
                                <div class="row">
                                    <?php $__currentLoopData = $store->getTranslationsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.name_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.name')); ?>" name="<?php echo e("name_$locale"); ?>" value="<?php echo e($value['name']); ?>" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_name')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.address_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="<?php echo e(trans('admin_content.address')); ?>" name="<?php echo e("address_$locale"); ?>" value="<?php echo e($value['address']); ?>" required>
                                                <div class="invalid-feedback">
                                                    <?php echo e(trans('admin_content.please_enter_address')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans("admin_content.working_times_$locale")); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea  class="form-control myTextArea" rows="7" placeholder="<?php echo e(trans('admin_content.working_times')); ?>" name="<?php echo e("working_times_$locale"); ?>"><?php echo e($value['working_times']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span><?php echo e(trans('admin_content.phone')); ?></span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="<?php echo e(trans('admin_content.phone')); ?>" minlength="10" maxlength="14" value="<?php echo e($store->phone); ?>" name="phone">
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
                                                    <input type="hidden" name="lat" value="<?php echo e($store->lat); ?>" id="lat">
                                                    <input type="hidden" name="long" value="<?php echo e($store->long); ?>" id="lng">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group  col-md-6">
                                            <label><?php echo e(trans('admin_content.city')); ?></label>
                                            <select class="form-control" name ="city_id" required>
                                                <option value="" selected disabled ><?php echo e(trans('admin_content.choose_one')); ?></option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($store->city_id == $city->id ? 'selected' : ''); ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo e(trans('admin_content.please_enter_city')); ?>

                                            </div>
                                        </div>

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
<?php $__env->startSection('scripts'); ?>
    <script>
        var map = L.map('map').setView([<?php echo e($store->lat); ?>, <?php echo e($store->long); ?>], 5);
        console.log(<?php echo e($store->long); ?>);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([<?php echo e($store->lat); ?>, <?php echo e($store->long); ?>],{
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frucci\resources\views/admin/stores/edit.blade.php ENDPATH**/ ?>