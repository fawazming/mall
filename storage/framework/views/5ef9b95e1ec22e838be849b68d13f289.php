<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Custom Domain Request')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Custom Domain Request')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Custom Domain Request')); ?></li>
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
                                    <th> <?php echo e(__('Owner Name')); ?></th>
                                    <th> <?php echo e(__('Store Name')); ?></th>
                                    <th> <?php echo e(__('Custom Domain')); ?></th>
                                    <th> <?php echo e(__('Status')); ?></th>
                                    <th width="200px"> <?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $custom_domain_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_domain_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="font-style font-weight-bold">
                                                <?php echo e($custom_domain_request->user->name); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold"><?php echo e($custom_domain_request->store->name); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">
                                                <?php echo e($custom_domain_request->custom_domain); ?></div>
                                        </td>
                                        <td>
                                            <?php if($custom_domain_request->status == 0): ?>
                                                <span
                                                    class="badge fix_badges bg-danger p-2 px-3 rounded"><?php echo e(__(App\Models\CustomDomainRequest::$statues[$custom_domain_request->status])); ?></span>
                                            <?php elseif($custom_domain_request->status == 1): ?>
                                                <span
                                                    class="badge fix_badges bg-primary p-2 px-3 rounded"><?php echo e(__(App\Models\CustomDomainRequest::$statues[$custom_domain_request->status])); ?></span>
                                            <?php elseif($custom_domain_request->status == 2): ?>
                                                <span
                                                    class="badge fix_badges bg-warning p-2 px-3 rounded"><?php echo e(__(App\Models\CustomDomainRequest::$statues[$custom_domain_request->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <?php if($custom_domain_request->status == 0): ?>
                                                    <a href="<?php echo e(route('custom_domain_request.request',[$custom_domain_request->id,1])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-check f-20"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('custom_domain_request.request',[$custom_domain_request->id,0])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-x f-20"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php echo Form::open(['method' => 'Delete', 'route' => ['custom_domain_request.destroy',$custom_domain_request->id]]); ?>

                                                <a class="btn btn-sm btn-icon  bg-light-secondary me-2 show_confirm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo e(__('Delete')); ?>">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/custom_domain_request/index.blade.php ENDPATH**/ ?>