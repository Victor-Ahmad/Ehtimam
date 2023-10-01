<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <?php if(\App\Models\Setting::first()->logo != null): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('dashboard.home')); ?>" class="nav-link logo">
                    <img src="<?php echo e(asset(\App\Models\Setting::first()->logo)); ?>" class="flag-width" alt="flag">
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item theme-text">
                <a href="<?php echo e(route('dashboard.home')); ?>" class="nav-link"> <?php echo e(\App\Models\Setting::first()->$name); ?> </a>
            </li>
        </ul>
        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown language-dropdown">
                <?php if(app()->getLocale() == 'ar'): ?>
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(asset(app()->getLocale().'/assets/img/ksa-circle.png')); ?>" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="<?php echo e(route('dashboard.lang', 'en')); ?>"><img
                                src="<?php echo e(asset(app()->getLocale().'/assets/img/ca.png')); ?>" class="flag-width" alt="flag">
                            <span class="align-self-center">&nbsp;English</span></a>
                    </div>
                <?php else: ?>
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(asset(app()->getLocale().'/assets/img/ca.png')); ?>" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="<?php echo e(route('dashboard.lang', 'ar')); ?>"><img
                                src="<?php echo e(asset(app()->getLocale().'/assets/img/ksa-circle.png')); ?>" class="flag-width" alt="flag">
                            <span class="align-self-center">&nbsp;English</span></a>
                    </div>
                <?php endif; ?>

            </li>

            
                
                   
                    
                         
                         
                        
                        
                    
                
                
                    
                        
                            
                                

                                    
                                        
                                            
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                                
                                                
                                            
                                        
                                    

                                
                            
                        
                    
                
            

            
                
                   
                    
                         
                         
                        
                        
                    
                    
                        
                    
                
                
                    
                        
                            
                                
                                    
                                         
                                         
                                        
                                        
                                        
                                        
                                        
                                    
                                    
                                        
                                            
                                            
                                        

                                        
                                            
                                                
                                                     
                                                     
                                                     
                                                     
                                                    
                                                
                                            
                                        
                                    
                                
                            
                        
                    
                
            

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img
                        src="<?php echo e(auth('dashboard')->user()->avatar? : asset(app()->getLocale().'/assets/img/90x90.jpg')); ?>"
                        alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="<?php echo e(route('dashboard.core.administration.profile.edit', auth()->user()->id)); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <?php echo e(__('dash.profile')); ?></a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="<?php echo e(route('dashboard.logout')); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <?php echo e(__('dash.signout')); ?></a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>


<?php /**PATH C:\Users\tcavw\OneDrive\Desktop\fromSFTP\public_html\resources\views/dashboard/layout/navbar.blade.php ENDPATH**/ ?>