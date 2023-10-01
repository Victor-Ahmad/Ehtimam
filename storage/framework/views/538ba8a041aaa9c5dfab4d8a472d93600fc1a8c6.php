<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                <a href="<?php echo e(route('dashboard.home')); ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span><?php echo e(__('dash.dashboard')); ?></span>
                    </div>
                </a>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_visits')): ?>
                <li class="menu">
                    <a href="#visits" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>

                            <span>إدارة الزيارات</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="visits" data-parent="#accordionExample">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_visits')): ?>
                            <li>
                                <a href="<?php echo e(route('dashboard.visits.index')); ?>"> الزيارات </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_visits')): ?>
                            <li>
                                <a href="<?php echo e(route('dashboard.visits_statuses.index')); ?>"> حالات الزيارات </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('dashboard.reason_cancel.index')); ?>"> أسباب الإلغاء </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_packages')): ?>
                <li class="menu">
                    <a href="#contract" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-package">
                                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>

                            <span>إدارة التقاول</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="contract" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.contract_packages.index')); ?>"> باقات التقاول </a>
                        </li>

                        
                        
                        

                        <li>
                            <a href="<?php echo e(route('dashboard.contract_order.index')); ?>"> طلب التقاول </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_orders')): ?>
                <li class="menu">
                    <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <div class="icon-container">
                                <i data-feather="shopping-cart"></i><span class="icon-name"> الطلبات </span>
                            </div>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="orders" data-parent="#accordionExample">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_orders')): ?>
                            <li>
                                <a href="<?php echo e(route('dashboard.orders.index')); ?>"> الطلبات </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_orders')): ?>
                            <li>
                                <a href="<?php echo e(route('dashboard.order_statuses.index')); ?>"> حالات الطلب </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_bookings')): ?>
                <li class="menu">
                    <a href="#booking" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <div class="icon-container">
                                <i data-feather="book"></i><span class="icon-name"> الحجوزات </span>
                            </div>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="booking" data-parent="#accordionExample">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_bookings')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/bookings?type=service')); ?>"> الحجوزات </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_bookings')): ?>
                            <li>
                                <a href="<?php echo e(route('dashboard.booking_statuses.index')); ?>"> حالات الحجز </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('dashboard.booking_setting.index')); ?>"> المواعيد </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-lock">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <span>إدارة المستخدمين</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_admins')): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard.core.administration.admins.index')); ?>"> المستخدمين </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles')): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard.core.administration.roles.index')); ?>"> الصلاحيات </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_categories')): ?>
                <li class="menu">
                    <a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>

                            <span><?php echo e(__('dash.categories')); ?></span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="admin" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.core.category.index')); ?>"> <?php echo e(__('dash.category')); ?> </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_services')): ?>
                <li class="menu">
                    <a href="#service1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-server">
                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                <line x1="6" y1="18" x2="6.01" y2="18"></line>
                            </svg>

                            <span><?php echo e(__('dash.Service Management')); ?></span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="service1" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.core.service.index')); ?>"> <?php echo e(__('dash.Services')); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard.core.icon.index')); ?>"> الايقونات </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="menu">
                <a href="#car" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <div class="icon-container">
                            <i data-feather="users"></i>
                            <span class="icon-name">السيارات</span>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="car" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo e(route('dashboard.car_type.index')); ?>"> نوع السياره </a>
                        <a href="<?php echo e(route('dashboard.car_model.index')); ?>"> موديل السياره </a>
                        <a href="<?php echo e(route('dashboard.car_client.index')); ?>"> سيارات العملاء </a>
                    </li>

                </ul>
            </li>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_technicians')): ?>
                <li class="menu">
                    <a href="#tech" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <div class="icon-container">
                                <i data-feather="users"></i>
                                <span class="icon-name"><?php echo e(__('dash.technicians')); ?></span>
                            </div>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="tech" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.core.technician.index')); ?>"> <?php echo e(__('dash.technicians')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.core.group.index')); ?>"> <?php echo e(__('dash.technicians_groups')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.core.tech_specializations.index')); ?>"> تخصصات الفنيين </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallets')): ?>
                <li class="menu">
                    <a href="#wallet" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>

                            <span><?php echo e(__('dash.Wallet Management')); ?></span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="wallet" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.core.customer_wallet.index')); ?>"> <?php echo e(__('dash.customers wallet')); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard.core.technician_wallet.index')); ?>"> <?php echo e(__('dash.technicians wallet')); ?> </a>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_customers')): ?>
                <li class="menu">
                    <a href="#customer" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>

                            <span><?php echo e(__('dash.Customer Management')); ?></span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="customer" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.core.customer.index')); ?>"> <?php echo e(__('dash.Customers')); ?> </a>
                        </li>


                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rates')): ?>
                <li class="menu">
                    <a href="#rates" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>

                            <span>إدارة التقييمات</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="rates" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.rates.RateTechnician')); ?>"> تقييمات فنيين </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard.rates.RateService')); ?>"> تقييمات خدمات </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_notification')): ?>
                <li class="menu">
                    <a href="#notification" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span>إدارة الاشعارات</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="notification" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.notification.showNotification')); ?>">ارسال اشعارات </a>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_coupons')): ?>
                <li class="menu">
                    <a href="<?php echo e(route('dashboard.coupons.index')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-percent">
                                <line x1="19" y1="5" x2="5" y2="19"></line>
                                <circle cx="6.5" cy="6.5" r="2.5"></circle>
                                <circle cx="17.5" cy="17.5" r="2.5"></circle>
                            </svg>

                            <span>إدارة الكوبونات</span>
                        </div>
                        <div>
                        </div>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_setting')): ?>
                <li class="menu">
                    <a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>

                            <span><?php echo e(__('dash.System settings')); ?></span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="setting" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo e(route('dashboard.settings')); ?>">الاعدادات العامة</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.country.index')); ?>"> <?php echo e(__('dash.Countries')); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard.city.index')); ?>"> <?php echo e(__('dash.Cities')); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard.region.index')); ?>"> <?php echo e(__('dash.Regions')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.core.measurements.index')); ?>"> وحدات القياس </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.faqs.index')); ?>">الأسئلة الشائعة</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dashboard.banners.index')); ?>">البنرات</a>
                        </li>


                    </ul>
                </li>
            <?php endif; ?>

            <li class="menu">
                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>

                        <span>تقارير</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="reports" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo e(route('dashboard.report.sales')); ?>"> تقرير المبيعات </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('dashboard.report.contractSales')); ?>"> تقرير مبيعات تقاول </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('dashboard.report.customers')); ?>"> تقرير العملاء </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('dashboard.report.technicians')); ?>"> تقرير الفنيين </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('dashboard.report.services')); ?>"> تقرير الخدمات </a>
                    </li>

                </ul>
            </li>

            
            
            
            
            
            
            
            
            
            
            
            
            

        </ul>

    </nav>

</div>

<!--  END SIDEBAR  -->
<?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/layout/sidebar.blade.php ENDPATH**/ ?>