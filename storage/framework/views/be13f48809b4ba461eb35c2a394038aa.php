<div class="modal-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td><b><?php echo e(__('Store ')); ?></b></td>
                        <td><b><?php echo e(__('Store Link ')); ?></b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $storesNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storesName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($storesName); ?></td>
                            <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($store->name == $storesName): ?>
                                    <td>
                                        <a href="<?php echo e($store['store_url']); ?>" target="_blank" class="text-danger">
                                            <?php echo e($store['store_url']); ?></a>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/storelinks.blade.php ENDPATH**/ ?>