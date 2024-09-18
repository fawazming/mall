<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan-Request')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Plan Request')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="row  m-1">
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-icon  bg-light-secondary me-2" href="<?php echo e(route('planrequests.export', $plan_requests)); ?>"
                data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Export')); ?>">
                <i data-feather="download"></i>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('User Name')); ?></th>
                                    <th><?php echo e(__('Plan Name')); ?></th>
                                    <th><?php echo e(__('Max Product')); ?></th>
                                    <th><?php echo e(__('Max Store')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                    <th><?php echo e(__('expiry date')); ?></th>
                                    <th width="150px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($plan_requests) && !empty($plan_requests)): ?>
                                    <?php $__currentLoopData = $plan_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>

                                                <div class="font-style font-weight-bold"><?php echo e($prequest->user->name); ?></div>
                                            </td>
                                            <td>
                                                <div class="font-style font-weight-bold"><?php echo e($prequest->plan->name); ?></div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold"><?php echo e($prequest->plan->max_products); ?></div>
                                                
                                            </td>
                                            <td>
                                                <div class="font-weight-bold"><?php echo e($prequest->plan->max_stores); ?></div>
                                                
                                            </td>
                                            <td>
                                                <div class="font-style font-weight-bold">
                                                    <?php if($prequest->duration == 'Month'): ?>
                                                        <?php echo e(__('One Month')); ?>

                                                    <?php elseif($prequest->duration == 'Year'): ?>
                                                        <?php echo e(__('One Year')); ?>

                                                    <?php else: ?>
                                                    <?php echo e(__('Lifetime')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td><?php echo e(\App\Models\Utility::getDateFormated($prequest->created_at, true)); ?>

                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?php echo e(route('response.request', [$prequest->id, 1])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-check f-20"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('response.request', [$prequest->id, 0])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-x f-20"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center">
                                            <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                            <h2>Opps...</h2>
                                            <h6>No data Found. </h6>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/plan_request/index.blade.php ENDPATH**/ ?>