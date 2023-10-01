<?php $__env->startPush('style'); ?>
    <link href="<?php echo e(asset('css/VisitShowStyle.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('sub-header'); ?>
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-2">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo e(route('dashboard.home')); ?>"><?php echo e(__('dash.home')); ?></a></li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo e(route('dashboard.region.index')); ?>"><?php echo e(__('dash.Region')); ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.create')); ?></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form action="<?php echo e(route('dashboard.region.store')); ?>" method="post" class="form-horizontal"
                          enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><?php echo e(__('dash.title_ar')); ?></label>
                                    <input type="text" name="title_ar" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.title_ar')); ?>"
                                    >
                                    <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><?php echo e(__('dash.title_en')); ?></label>
                                    <input type="text" name="title_en" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.title_en')); ?>"
                                    >
                                    <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">

                                    <label for="inputEmail4"><?php echo e(__('dash.city')); ?></label>
                                    <select id="inputState" class="select2 form-control pt-1"
                                            name="city_id">
                                        <option disabled><?php echo e(__('dash.choose')); ?></option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($city); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <div class="form-group col-md-6">

                                    <label for="inputEmail4">مسافه التغطيه بالكيلومتر</label>
                                    <input type="text" name="space_km" class="form-control"
                                           id="inputEmail4"
                                           placeholder="مسافه التغطيه بالكيلومتر"
                                    >
                                    <?php $__errorArgs = ['space_km'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">

                                    <label for="inputEmail4">lat</label>
                                    <input type="text" name="lat" class="lat form-control"
                                           id="inputEmail4"
                                           placeholder="lat"
                                    >
                                    <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                                <div class="form-group col-md-6">

                                    <label for="inputEmail4">lon</label>
                                    <input type="text" name="lon" class="lon form-control"
                                           id="inputEmail4"
                                           placeholder="lon"
                                    >
                                    <?php $__errorArgs = ['lon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                            </div>


                            <div class="form-group col-md-12">

                                <div id="map">

                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('dash.save')); ?></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        var map;
        var markers = [];

        function initMap() {
            var center = {lat: 24.6310665, lng: 46.5635056};

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: center,
            });

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                clearMarkers();
                addMarker(event.latLng);
                $('.lat').val(event.latLng.lat())
                $('.lon').val(event.latLng.lng())
            });


        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }
    </script>

    <script type="text/javascript" async defer
            src="https://maps.google.com/maps/api/js?key=<?php echo e(Config::get('app.GOOGLE_MAP_KEY')); ?>&callback=initMap" ></script>

<?php $__env->stopPush(); ?>






<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/settings/regions/create.blade.php ENDPATH**/ ?>