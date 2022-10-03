<?php $__env->startSection('content'); ?>
<div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            The Type has not been saved, please correct the errors.
        </div>
        <?php $__errorArgs = ['store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php endif; ?>
    <form action="<?php echo e(url('tipo')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nombre">Type name</label>
            <input value="<?php echo e(old('nombre')); ?>" required type="text" minlength="2" maxlength="100" class="form-control" id="nombre" name="nombre" placeholder="Type name">
            <?php $__errorArgs = ['nombre'];
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
        <div class="form-group">
            <label for="precio">Type description</label>
            <input value="<?php echo e(old('descripcion')); ?>" required type="text" min="2" class="form-control" id="descripcion" name="descripcion" placeholder="Type description">
            <?php $__errorArgs = ['precio'];
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
        <button type="submit" class="btn btn-primary">add</button>
        &nbsp;
        <a href="<?php echo e(url('tipo')); ?>" class="btn btn-primary">back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/PHP/ejercicio2/productoApp/resources/views/tipo/create.blade.php ENDPATH**/ ?>