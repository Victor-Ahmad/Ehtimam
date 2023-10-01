<?php if($finalAvailTimes): ?>

    <?php $__currentLoopData = $finalAvailTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<?php if($notAvailable->isNotEmpty()): ?>

    <div class="select-time">

        <label
            class="bg-btn-hover dark-hover fw-bold  radio"
            dir="<?php echo e(get_current_lang()=='en'?'ltr':'rtl'); ?>"
            for="timeselect-<?php echo e($itr); ?>-<?php echo e($time->timestamp); ?>">
            <input name="start_time[<?php echo e($itr); ?>]" type="radio" class="btn-check time"
                                                         id="timeselect-<?php echo e($itr); ?>-<?php echo e($time->timestamp); ?>"
                                                         value="<?php echo e($time->timestamp); ?>" <?php echo e(array_sum($notAvailable->pluck('quantity')->toArray()) === array_sum($service->pluck('count_group')->toArray()) && in_array($time->timestamp,$notAvailable->pluck('time')->toArray()) ? 'disabled' : ''); ?>>
           <span> <?php echo e($time->format('g:i A')); ?> </span>
        </label>
    </div>
<?php else: ?>

    <div class="select-time">

        <label
            class="bg-btn-hover dark-hover fw-bold  radio"
            dir="<?php echo e(get_current_lang()=='en'?'ltr':'rtl'); ?>"
            for="timeselect-<?php echo e($itr); ?>-<?php echo e($time->timestamp); ?>">
            <input name="start_time[<?php echo e($itr); ?>]" type="radio" class="btn-check time"
                   id="timeselect-<?php echo e($itr); ?>-<?php echo e($time->timestamp); ?>"
                   value="<?php echo e($time->timestamp); ?>">
            <span> <?php echo e($time->format('g:i A')); ?> </span>
        </label>
    </div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
    <div class="text-center">
        <img width="40%" src="<?php echo e(asset('images/time.png')); ?>">
    </div>
<?php endif; ?>
<?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/orders/schedules-times-available.blade.php ENDPATH**/ ?>