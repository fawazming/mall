
<?php echo e(Form::model($users, array('route' => array('store-resource.display', $users->id), 'method' => 'PUT','enctype'=>'multipart/form-data'))); ?>

<?php echo csrf_field(); ?>
<?php echo method_field('put'); ?>
<div class="p-4">
	<p>This action can not be undone. Do you want to continue?</p>
	</div>
 <div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <button type="submit" class="btn  btn-primary" value="<?php echo e($users->store_display); ?>"><?php echo e(__('Yes')); ?></button>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/storeenabled.blade.php ENDPATH**/ ?>