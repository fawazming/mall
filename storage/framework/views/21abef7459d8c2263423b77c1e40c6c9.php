<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Sub Domain')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Domain')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('store-resource.index')); ?>"><?php echo e(__('Store')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Sub Domain')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="row gy-4  m-1">
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('store.customDomain')); ?>" class="btn btn-sm btn-light-primary me-2">
                <?php echo e(__('Custom Domain')); ?>

            </a>
        </div>
        <div class="col-auto pe-0">

            <a href="<?php echo e(route('store.grid')); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2" data-bs-toggle="tooltip"
                data-bs-placement="top" title="<?php echo e(__('Grid View')); ?>">
                <i class="ti ti-grid-dots"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('store-resource.index')); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Grid View')); ?>">
                <i class="ti ti-list f-30"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Create ')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Store')); ?>" data-url="<?php echo e(route('store-resource.create')); ?>">
                <i data-feather="plus"></i>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Sub Domain Name')); ?></th>
                                    <th><?php echo e(__('Store Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($store->subdomain); ?>

                                        </td>
                                        <td>
                                            <?php echo e($store->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($store->email); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/subdomain.blade.php ENDPATH**/ ?>