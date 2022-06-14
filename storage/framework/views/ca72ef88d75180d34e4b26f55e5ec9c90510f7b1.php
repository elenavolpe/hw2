

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href='<?php echo e(asset( 'css/login.css' )); ?>' />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset( 'js/login.js' )); ?>' defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div id="log">
                    <div>
                        <form method="post" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <p><label>Username<input type='text' name='username'></label></p>
                            <p><label>Password<input type='password' name='password'></label></p>
                            <?php if(isset($errore)): ?>
                            <p class = 'errore' ><?php echo e($errore); ?></p>
                            <?php endif; ?>
                            <p><label>&nbsp<input type='submit' name='invio' value='entra'></label></p>
                        </form>
                        Non fai ancora parte del nostro team? <a href="registrazione">registrati</a>
                    </div>
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>