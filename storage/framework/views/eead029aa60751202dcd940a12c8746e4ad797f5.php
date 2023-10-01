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
                                <li class="breadcrumb-item active" aria-current="page">عرض الطلب</li>
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

            <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="card-title">تفاصيل الطلب</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">

                            <table class="table table-bordered nowrap">

                                <thead>

                                <tr>
                                    <th>رقم الزياره</th>
                                    <td><?php echo e($visits->visite_id); ?></td>
                                </tr>
                                <tr>
                                    <?php if($visits->booking && $visits->booking->type == 'service'): ?>
                                    <th>اسم التصنيف</th>
                                    <td><?php echo e($visits->booking?->category?->title); ?></td>

                                    <?php else: ?>
                                        <th>اسم الباقه</th>
                                        <td><?php echo e($visits->booking?->package?->name); ?></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                        <th>اسماء الخدمات</th>

                                        <td>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn-sm btn-primary"><?php echo e($service); ?></button>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                </tr>
                                <tr>
                                    <th>اسم المجموعه الفنيه</th>
                                    <td><?php echo e($visits->group?->name); ?></td>
                                </tr>
                                <tr>
                                    <th>موعد الزياره</th>
                                    <td><?php echo e($visits->booking?->date); ?></td>
                                </tr>

                                <tr>
                                    <th>تاريخ البدء</th>
                                    <td><?php echo e($visits->start_time); ?></td>
                                </tr>

                                <tr>
                                    <th>تاريخ الانتهاء</th>
                                    <td><?php echo e($visits->end_time); ?></td>
                                </tr>

                                <tr>
                                    <th>الحاله</th>
                                    <td><?php echo e($visits->status?->name); ?></td>
                                </tr>
                            <?php if($visits->visits_status_id == 6): ?>
                                <tr>
                                    <th>سبب الالغاء</th>
                                    <td><?php echo e($visits->cancelReason?->reason); ?></td>
                                </tr>
                            <?php endif; ?>

                                <?php if($visits->visits_status_id == 5): ?>
                                    <tr>
                                        <th>صوره اكتمال الطلب</th>
                                        <td><img class="img-fluid" style="width: 40px;" src="<?php echo e(asset($visits->image)); ?>"></td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <th>الملاحظات</th>
                                    <td><?php echo $visits->note; ?></td>
                                </tr>

                                </thead>

                            </table><!-- end of table -->


                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div id="floating-panel">
                                <b>Mode of Travel: </b>
                                <select id="mode">
                                    <option value="DRIVING">Driving</option>
                                    <option value="WALKING">Walking</option>
                                    <option value="BICYCLING">Bicycling</option>
                                    <option value="TRANSIT">Transit</option>
                                </select>
                            </div>
                            <div id="map">

                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>



            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="card">
                        <div class="card-body p-0">

                            <div class="stepper-horizontal" id="stepper1">
                                <?php $__currentLoopData = $visit_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="step" data-id="<?php echo e($status->id); ?>">
                                    <div class="step-circle">

                                    </div>
                                    <div class="step-title"><?php echo e($status->name); ?></div>
                                    <?php if($key != $visit_status->keys()->last()): ?>
                                    <div class="step-bar-left"></div>
                                    <?php endif; ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>


        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php
    $latUser = $visits->booking?->address?->lat;
    $longUser = $visits->booking?->address?->long;
    $latTechn = $visits->lat??0;
    $longTechn = $visits->long??0;

    $locations = [
        ['lat'=>$latUser,'lng'=>$longUser],
        ['lat'=>$latTechn,'lng'=>$longTechn],
    ];
?>
<?php $__env->startPush('script'); ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [[0, 'desc']],
                "language": {
                    "url": "<?php echo e(app()->getLocale() == 'ar'? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json'); ?>"
                },
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(route('dashboard.visits.index')); ?>',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'visite_id', name: 'visite_id'},
                    {data: 'date', name: 'date'},
                    {data: 'group_name', name: 'group_name'},
                    {data: 'start_time', name: 'start_time'},
                    {data: 'end_time', name: 'end_time'},
                    {data: 'duration', name: 'duration'},
                    {data: 'status', name: 'status'},
                    {data: 'control', name: 'control', orderable: false, searchable: false},

                ]
            });
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            visitStatus();
        })

            function visitStatus(){
            var id = "<?php echo e($visits->id); ?>";
            $.ajax({
                url: '<?php echo e(route('dashboard.visits.updateStatus')); ?>',
                type: 'post',
                data: {id: id,_token: "<?php echo e(csrf_token()); ?>"},
                success: function (data) {
                    var steps = document.getElementsByClassName('step');

                    $.each(steps,function(index, node){
                        var stepNum = node.getAttribute('data-id');
                        if(data != 5 && data != 6){

                            if (stepNum == data) {
                                node.setAttribute("id", "await");
                            }
                            if (stepNum < data) {
                                node.setAttribute("id", "done");
                            }
                        }else if(data == 5 || data == 6){


                            if(stepNum == 5 && data == 5){
                                node.querySelector('.step-bar-left').setAttribute("style", "display:none;")
                            }

                            if (stepNum == data) {
                                node.setAttribute("id", "done");

                            }
                            if (stepNum < data) {
                                node.setAttribute("id", "done");
                            }

                            if(stepNum == 6 && data == 5){
                                node.setAttribute("style", "display:none;");
                            }else if(stepNum == 5 && data == 6){
                                node.setAttribute("style", "display:none;");
                            }


                        }


                    })
                }
            });
        }

    </script>

    <script type="text/javascript">

        var map, directionsService, directionsRenderer,currentZoomLevel,currentMapCenter;

        function initMap() {
            // Create a new map centered on the starting point
            const locations = <?php echo json_encode($locations) ?>;
            const myLatLng = { lat: Number(locations[0].lat) , lng: Number(locations[0].lng) };
            console.log(myLatLng)
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng
            });

            const marker = new google.maps.Marker({
                position: myLatLng,
                map,
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map
            });
            currentZoomLevel = map.getZoom();
            currentMapCenter = map.getCenter();

            setInterval(getLocation,10000)
        }


        function getLocation(){
            var id = "<?php echo e($visits->id); ?>";
            $.ajax({
                url: '<?php echo e(route('dashboard.visits.getLocation')); ?>',
                type: 'post',
                data: {id: id,_token: "<?php echo e(csrf_token()); ?>"},
                success: function (data) {
                    if(data[1].lat != 0 && data[1].lng != 0 && data[0].lat != 0 && data[0].lng != 0) {
                        updateRoute(data)
                    }else{
                        const myLatLng = { lat: data[0].lat , lng: data[0].lng };
                        const marker = new google.maps.Marker({
                            position: myLatLng,
                            map,
                        });
                    }
                }
            });
        }


        function updateRoute(locations) {
            var startingPoint = new google.maps.LatLng(locations[0].lat, locations[0].lng);
            var destination = new google.maps.LatLng(locations[1].lat, locations[1].lng);

            currentZoomLevel = map.getZoom();
            currentMapCenter = map.getCenter();


            var request = {
                origin: startingPoint,
                destination: destination,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    // Display the updated route on the map
                    directionsRenderer.setDirections(result);
                    map.setZoom(currentZoomLevel);
                    map.setCenter(currentMapCenter);

                }
            });
        }



        window.initMap = initMap;

        setInterval(visitStatus,10000)

    </script>


    <script type="text/javascript" async defer
            src="https://maps.google.com/maps/api/js?key=<?php echo e(Config::get('app.GOOGLE_MAP_KEY')); ?>&callback=initMap" ></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/visits/show.blade.php ENDPATH**/ ?>