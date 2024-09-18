<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('WhatsStore')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Store')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Stores')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="row gy-4  m-1">
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('store.subDomain')); ?>" class="btn btn-sm btn-light-primary me-2">
                <?php echo e(__('Sub Domain')); ?>

            </a>
        </div>
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-light-primary me-2" href="<?php echo e(route('store.customDomain')); ?>">
                <?php echo e(__('Custom Domain')); ?>

            </a>
        </div>
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('store.grid')); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Grid View')); ?>">
                <i class="ti ti-grid-dots f-30"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('store.export', $store)); ?> " class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Export')); ?>">
                <i class="ti ti-download"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Create ')); ?>" data-size="md" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Store')); ?>" data-url="<?php echo e(route('store-resource.create')); ?>">
                <i data-feather="plus"></i>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Listing -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('User Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Stores')); ?></th>
                                    <th><?php echo e(__('Plan')); ?></th>
                                    <th><?php echo e(__('Created At')); ?></th>
                                    <th><?php echo e(__('Store Display')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($usr->name); ?></td>
                                        <td><?php echo e($usr->email); ?></td>
                                        <td><?php echo e($usr->stores->count()); ?></td>
                                        <td><?php echo e(!empty($usr->currentPlan->name) ? $usr->currentPlan->name : '-'); ?></td>
                                        <td><?php echo e(\App\Models\Utility::dateFormat($usr->created_at)); ?></td>
                                        <td>
                                                <a href="#" data-size="md" class="form-switch disabled-form-switch"
                                                    data-url="<?php echo e(route('store-resource.edit.display', $usr->id)); ?>"
                                                    data-ajax-popup="true" class="action-item"
                                                    data-title="<?php echo e(__('Are You Sure?')); ?>"
                                                    data-title="<?php echo e($usr->store_display == 1 ? 'Stores disable' : 'Store enable'); ?>">
                                                    <input type="checkbox" class="form-check-input" disabled="disabled"
                                                        name="store_display" id="<?php echo e($usr->id); ?>"
                                                        <?php echo e($usr->store_display == 1 ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="<?php echo e($usr->id); ?>"></label>
                                                </a>
                                        </td>
                                        <td class="Action">
                                            <div class="d-flex">
                                                <?php if(Auth::user()->type == "super admin"): ?>
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="lg"
                                                    data-url="<?php echo e(route('owner.info', $usr->id)); ?>" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Admin Hub')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo e(__('Admin Hub')); ?>">
                                                    <i class="ti ti-atom"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-icon bg-light-secondary me-2"
                                                    href="<?php echo e(route('login.with.owner', $usr->id)); ?>"
                                                        data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo e(__('Login As Owner')); ?>">
                                                    <i class="ti ti-replace"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="lg"
                                                    data-url="<?php echo e(route('store.links', $usr->id)); ?>" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Store Links')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo e(__('Store Links')); ?>">
                                                    <i class="ti ti-adjustments"></i>
                                                    </a>
                                                <?php endif; ?>

                                                
                                                    <?php if($usr->is_enable_login == 1): ?>
                                                        <a href="<?php echo e(route('users.login', \Crypt::encrypt($usr->id))); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2" data-bs-toggle="tooltip"
                                                        title="<?php echo e(__('Login Disable')); ?>">
                                                        <i class="ti ti-road-sign"></i>
                                                        </a>
                                                    <?php elseif($usr->is_enable_login == 0 && $usr->password == null): ?>
                                                        <a class="btn btn-sm btn-icon login_enable bg-light-secondary me-2" data-size="md"
                                                        data-url="<?php echo e(route('user.reset', \Crypt::encrypt($usr->id))); ?>" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('New Password')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-original-title="<?php echo e(__('Login Enable')); ?>">
                                                        <i class="ti ti-road-sign"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('users.login', \Crypt::encrypt($usr->id))); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2 login_enable" data-bs-toggle="tooltip"
                                                        title="<?php echo e(__('Login Enable')); ?>" data-bs-original-title="<?php echo e(__('Login Enable')); ?>">
                                                        <i class="ti ti-road-sign"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Store')): ?>
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="lg"
                                                        data-url="<?php echo e(route('store-resource.edit', $usr->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Store')); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Upgrade Plans')): ?>
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="md"
                                                        data-url="<?php echo e(route('plan.upgrade', $usr->id)); ?>" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Upgrade Plan')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="<?php echo e(__('Upgrade Plan')); ?>">
                                                        <i class="ti ti-trophy f-20"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($usr->id != 2): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Store')): ?>
                                                        <?php echo Form::open(['method' => 'Delete', 'route' => ['store-resource.destroy', $usr->id]]); ?>

                                                        <a class="btn btn-sm btn-icon  bg-light-secondary me-2 show_confirm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Delete')); ?>">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Reset Password')): ?>
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="md"
                                                        data-url="<?php echo e(route('user.reset', \Crypt::encrypt($usr->id))); ?>" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Reset Password')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="<?php echo e(__('Reset Password')); ?>">
                                                        <i class="ti ti-key f-20"></i>
                                                    </a>
                                                <?php endif; ?>
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
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>

    
    <script>
        $(document).on('change', '#password_switch', function() {
            if ($(this).is(':checked')) {
                $('.ps_div').removeClass('d-none');
                $('#password').attr("required", true);

            } else {
                $('.ps_div').addClass('d-none');
                $('#password').val(null);
                $('#password').removeAttr("required");
            }
        });
        $(document).on('click', '.login_enable', function() {
            setTimeout(function() {
                $('.modal-body').append($('<input>', {
                    type: 'hidden',
                    val: 'true',
                    name: 'login_enable'
                }));
            }, 2000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/index.blade.php ENDPATH**/ ?>