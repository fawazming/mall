<div class="modal-body">
    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="list-group-item">
            <div class="row align-items-center">
                <div class="col ml-n2">
                    <a href="#!" class="d-block h6 mb-0"><?php echo e($plan->name); ?></a>
                    <div>
                        <span class="text-sm"><?php echo e(\App\Models\Utility::priceFormat($plan->price)); ?>

                            <?php echo e(' / ' . __(\App\Models\Plan::$arrDuration[$plan->duration])); ?></span>
                    </div>
                </div>
                <div class="col ml-n2">
                    <a href="#!" class="d-block h6 mb-0"><?php echo e(__('Stores')); ?></a>
                    <div>
                        <span class="text-sm"><?php echo e($plan->max_stores); ?></span>
                    </div>
                </div>
                <div class="col ml-n2">
                    <a href="#!" class="d-block h6 mb-0"><?php echo e(__('Products')); ?></a>
                    <div>
                        <span class="text-sm"><?php echo e($plan->max_products); ?></span>
                    </div>
                </div>
                <div class="col-auto">
                    <?php if($user->plan == $plan->id): ?>
                        <span class="d-flex align-items-center ">
                            <i class="f-10 lh-1 fas fa-circle text-success"></i>
                            <span class="ms-2"><?php echo e(__('Active')); ?></span>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e(route('plan.active', [$user->id, $plan->id])); ?>"
                            class="btn btn-xs btn-primary btn-icon" data-toggle="tooltip"
                            data-original-title="<?php echo e(__('Click to Upgrade Plan')); ?>">
                            <span class="btn-inner--icon"><i class="fas fa-cart-plus"></i></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\store\resources\views/user/plan.blade.php ENDPATH**/ ?>