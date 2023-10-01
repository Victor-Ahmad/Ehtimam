<?php $attributes = $attributes->exceptProps([ 'name', 'type'=>'text', 'value'=>null, 'label'=>'', 'class'=>'', ]); ?>
<?php foreach (array_filter(([ 'name', 'type'=>'text', 'value'=>null, 'label'=>'', 'class'=>'', ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $invalidClass =$errors->has(dotted_string($name)) ? 'is-invalid' : '';
    $splitAttributes = explode(' ',$attributes);
    $defaultPlaceHolder = t_('Enter :name',['name'=>$label]);
    $properties = [
    'class'=>"{$invalidClass} form-control {$class}" ,
    'placeholder'=> $defaultPlaceHolder,
    ...$splitAttributes,
    ];
?>
<div class="form-group mb-4">
    <label
        class="<?php echo e($errors->has(dotted_string($name)) ? 'text-danger' : ''); ?>"> <?php echo e($label); ?> <?php echo data_get($attributes,'required') ? '<span class="tx-danger">*</span>':''; ?></label>
    <?php if(!in_array($type,['file','password'])): ?>
        <?php echo Form::$type($name,$value,$properties); ?>

    <?php else: ?>
        <?php echo Form::$type($name,$properties); ?>

    <?php endif; ?>
    <?php $__errorArgs = [dotted_string($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <ul class="parsley-errors-list filled" id="<?php echo e($name); ?>parsley-id-32">
        <li class="parsley-required">
            <?php echo e($message); ?>

        </li>
    </ul>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/components/forms/input.blade.php ENDPATH**/ ?>