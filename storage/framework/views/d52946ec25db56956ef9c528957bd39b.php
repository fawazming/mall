<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('WhatsStore')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Store')); ?>

<?php $__env->stopSection(); ?>
<?php
    $profile = \App\Models\Utility::get_file('uploads/profile/');
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('User')); ?></li>
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
            <a href="<?php echo e(route('store-resource.index')); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('List View')); ?>">
                <i class="ti ti-list f-30"></i>
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
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(\Auth::user()->type = 'super admin'): ?>
        <div class="row">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-xxl-3">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a href="#" data-size="md" data-url="<?php echo e(route('user.edit', $user->id)); ?>"
                                            data-ajax-popup="true" data-title="<?php echo e(__('Edit User')); ?>"
                                            class="dropdown-item"><i class="ti ti-edit"></i>
                                            <span><?php echo e(__('Edit')); ?></span></a>

                                        <a href="#" data-size="md" data-url="<?php echo e(route('plan.upgrade', $user->id)); ?>"
                                            data-ajax-popup="true" data-title="<?php echo e(__('Upgrade Plan')); ?>"
                                            class="dropdown-item"><i class="ti ti-trophy"></i>
                                            <span><?php echo e(__('Upgrade Plan')); ?></span></a>

                                        <?php if(Auth::user()->type == "super admin"): ?>
                                            <a href="<?php echo e(route('login.with.owner',$user->id)); ?>" class="dropdown-item"
                                                data-bs-original-title="<?php echo e(__('Login As Owner')); ?>">
                                                <i class="ti ti-replace"></i>
                                                <span> <?php echo e(__('Login As Owner')); ?></span>
                                            </a>
                                            <a href="#" data-size="lg" data-url="<?php echo e(route('store.links', $user->id)); ?>"
                                                data-ajax-popup="true" data-title="<?php echo e(__('Store Links')); ?>"
                                                class="dropdown-item"><i class="ti ti-adjustments"></i>
                                                <span><?php echo e(__('Store Links')); ?></span></a>
                                        <?php endif; ?>

                                        <a href="#" data-size="md" data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                            data-ajax-popup="true" data-title="<?php echo e(__('Reset Password')); ?>"
                                            class="dropdown-item"><i class="ti ti-key"></i>
                                            <span><?php echo e(__('Reset Password')); ?></span>
                                        </a>


                                        <?php if($user->id != 2): ?>
                                            <?php echo e(Form::open(['route' => ['store-resource.destroy', $user->id], 'class' => 'm-0'])); ?>

                                                <?php echo method_field('DELETE'); ?>
                                                <a href="#!" class="dropdown-item bs-pass-para show_confirm" aria-label="Delete"
                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="delete-form-<?php echo e($user->id); ?>">
                                                    <i class="ti ti-trash"></i>
                                                    <span><?php echo e(__('Delete')); ?></span>
                                                </a>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>

                                        
                                            <?php if($user->is_enable_login == 1): ?>
                                                <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                                    class="dropdown-item">
                                                    <i class="ti ti-road-sign"></i>
                                                    <span class="text-danger"> <?php echo e(__('Login Disable')); ?></span>
                                                </a>
                                            <?php elseif($user->is_enable_login == 0 && $user->password == null): ?>
                                                <a href="#" data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                                    data-ajax-popup="true" data-size="md" class="dropdown-item login_enable"
                                                    data-title="<?php echo e(__('New Password')); ?>">
                                                    <i class="ti ti-road-sign"></i>
                                                    <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                                    class="dropdown-item login_enable">
                                                    <i class="ti ti-road-sign"></i>
                                                    <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                </a>
                                            <?php endif; ?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="avatar-parent-child">
                                <img alt=""
                                    src="<?php echo e(!empty($user->avatar) ? $profile . '/' . $user->avatar : $profile . '/avatar.png'); ?>"class="img-fluid rounded-circle card-avatar">
                            </div>

                            <h5 class="h6 mt-4 mb-0"> <?php echo e($user->name); ?></h5>
                            <a href="#" class="d-block text-sm text-muted my-4"> <?php echo e($user->email); ?></a>
                            <div class="card mb-0 mt-3">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-0"><?php echo e($user->countProducts($user->id)); ?></h6>
                                            <p class="text-muted text-sm mb-0"><?php echo e(__('Products')); ?></p>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="mb-0"><?php echo e($user->countStores($user->id)); ?></h6>
                                            <p class="text-muted text-sm mb-0"><?php echo e(__('Stores')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col-6 pe-0">
                                <div class="actions d-flex justify-content-between">
                                    <span class="d-block text-sm text-muted"> <?php echo e(__('Plan')); ?> :
                                        <?php echo e($user->currentPlan->name); ?></span>
                                </div>
                                <div class="actions d-flex justify-content-between mt-1">
                                    <span class="d-block text-sm text-muted"><?php echo e(__('Plan Expired')); ?> :
                                        <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date) : 'Lifetime'); ?></span>
                                </div>
                            </div>
                            <div class="col-6 text-center Id ">
                                <a href="#" data-url="<?php echo e(route('owner.info', $user->id)); ?>" data-size="lg" data-ajax-popup="true" class="btn btn-outline-primary" data-title="<?php echo e(__('Owner Info')); ?>"><?php echo e(__('Admin Hub')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-xxl-3">
                
                <a href="#" class="btn-addnew-project" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="<?php echo e(__('Create New Store')); ?>" data-size="lg" data-ajax-popup="true"
                    data-title="<?php echo e(__('Create New Store')); ?>" data-url="<?php echo e(route('store-resource.create')); ?>">
                    <div class="bg-primary proj-add-icon">
                        <i class="ti ti-plus"></i>
                    </div>
                    <h6 class="mt-4 mb-2"><?php echo e(__('New Store')); ?></h6>
                    <p class="text-muted text-center"><?php echo e(__('Click here to add New Store')); ?></p>
                </a>
                <div class="card-body text-center">
                </div>
                <div class="card-footer">
                    <div class="actions d-flex justify-content-between">
                    </div>
                    <div class="actions d-flex justify-content-between mt-1">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/user/grid.blade.php ENDPATH**/ ?>