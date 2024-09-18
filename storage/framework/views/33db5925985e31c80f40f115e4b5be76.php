<script src="<?php echo e(asset('custom/js/jquery-admin.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dash.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/simple-datatables.js')); ?>"></script>


<script src="<?php echo e(asset('custom/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/repeater.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>

<script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/select2/dist/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/dropzone-amd-module.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>
<!-- Time picker -->
<script src="<?php echo e(asset('assets/js/plugins/flatpickr.min.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('assets/js/plugins/datepicker-full.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/letter.avatar.js')); ?>"></script>

<script src="<?php echo e(asset('custom/js/custom-admin.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/ckeditor/classic/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/cookieconsent.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/socialSharing.js')); ?>"></script>

<?php
    $cookie_settings = Utility::AdminSettings();
?>
<?php if($cookie_settings['enable_cookie'] == 'on' && $cookie_settings['cookie_logging'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
    </script>
    <?php echo e(Session::forget('success')); ?>

<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
    </script>
    <?php echo e(Session::forget('error')); ?>

<?php endif; ?>
<?php echo $__env->yieldPushContent('script-page'); ?>
<?php /**PATH C:\xampp\htdocs\store\resources\views/partials/admin/footer.blade.php ENDPATH**/ ?>