<?php
    $profile = \App\Models\Utility::get_file('uploads/profile/');
?>
<div class="modal-body">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-4 text-center">
                            <h6 ><?php echo e('Total Store'); ?></h6>
                            <p class=" text-sm mb-0">
                                <i
                                    class="ti ti-users text-warning card-icon-text-space fs-5 mx-1"></i><span class="total_store fs-5">
                                    <?php echo e($store_data['total_store']); ?></span>
                            </p>
                        </div>
                        <div class="col-4 text-center">
                            <h6 ><?php echo e('Active Store'); ?></h6>
                            <p class=" text-sm mb-0">
                                <i
                                    class="ti ti-users text-primary card-icon-text-space fs-5 mx-1"></i><span class="active_store fs-5"><?php echo e($store_data['active_store']); ?></span>
                            </p>
                        </div>
                        <div class="col-4 text-center">
                            <h6 ><?php echo e('Disable Store'); ?></h6>
                            <p class=" text-sm mb-0">
                                <i
                                    class="ti ti-users text-danger card-icon-text-space fs-5 mx-1"></i><span class="disable_store fs-5"><?php echo e($store_data['disable_store']); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-xxl-12 col-md-12">
                <div class="p-3 card m-0">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $users_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $store = \App\Models\Store::where('id', $user_data['store_id'])->first();
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-capitalize <?php echo e($loop->index == 0 ? 'active' : ''); ?>"
                                    id="pills-<?php echo e(strtolower($store->id)); ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?php echo e(strtolower($store->id)); ?>"
                                    type="button"><?php echo e($store->name); ?></button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="px-0 card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <?php $__currentLoopData = $users_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $users = \App\Models\User::where('created_by', $id)
                                ->where('current_store', $user_data['store_id'])
                                ->get();
                            $store = \App\Models\Store::where('id', $user_data['store_id'])->first();
                        ?>
                            <div class="tab-pane text-capitalize fade show <?php echo e($loop->index == 0 ? 'active' : ''); ?>"
                                id="pills-<?php echo e(strtolower($store->id)); ?>" role="tabpanel"
                                aria-labelledby="pills-<?php echo e(strtolower($store->id)); ?>-tab">

                                <div class="row">
                                    <div class="col-lg-11 col-md-10 col-sm-10 mt-3 text-end">
                                    <small class="text-danger my-3"><?php echo e(__('* Please ensure that if you disable the store, all users within this store are also disabled.')); ?></small>

                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-2 text-end">
                                        <div class="text-end">
                                            <div class="form-check form-switch custom-switch-v1 mt-3">
                                                <input type="checkbox" name="store_disable"
                                                    class="form-check-input input-primary is_store_enabled" value="1"
                                                    data-id="<?php echo e($user_data['store_id']); ?>" data-owner="<?php echo e($id); ?>"
                                                    data-name="<?php echo e(__('store')); ?>"
                                                    <?php echo e($store->is_store_enabled == 1 ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="store_disable"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row store"  data-store-id =<?php echo e($store->id); ?>>
                                        <div class="col-4 text-center">
                                            <p class="text-sm mb-0" data-toggle="tooltip"
                                                data-bs-original-title="<?php echo e(__('Total Users')); ?>"><i
                                                    class="ti ti-users text-warning card-icon-text-space fs-5 mx-1"></i><span class="total_users fs-5"><?php echo e($user_data['total_users']); ?></span>

                                            </p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="text-sm mb-0" data-toggle="tooltip"
                                                data-bs-original-title="<?php echo e(__('Active Users')); ?>"><i
                                                    class="ti ti-users text-primary card-icon-text-space fs-5 mx-1"></i><span class="active_users fs-5"><?php echo e($user_data['active_users']); ?></span>
                                            </p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="text-sm mb-0" data-toggle="tooltip"
                                                data-bs-original-title="<?php echo e(__('Disable Users')); ?>"><i
                                                    class="ti ti-users text-danger card-icon-text-space fs-5 mx-1"></i><span class="disable_users fs-5"><?php echo e($user_data['disable_users']); ?></span>
                                            </p>
                                        </div>
                                </div>
                                <div class="row my-2 " id="user_section_<?php echo e($store->id); ?>">
                                    <?php if(!$users->isEmpty()): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6 my-2 ">
                                                <div
                                                    class="d-flex align-items-center justify-content-between list_colume_notifi pb-2">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h6>
                                                            <img src="<?php echo e(!empty($user->avatar) ? $profile . '/' . $user->avatar : $profile . '/avatar.png'); ?>"
                                                                class=" rounded-circle mx-2" alt="image"
                                                                height="30">
                                                            <label for="user"
                                                                class="form-label"><?php echo e($user->name); ?></label>
                                                        </h6>
                                                    </div>
                                                    <div class="text-end ">
                                                        <div class="form-check form-switch custom-switch-v1 mb-2">
                                                            <input type="checkbox" name="user_disable"
                                                                class="form-check-input input-primary is_store_enabled"
                                                                value="1" data-id='<?php echo e($user->id); ?>' data-owner="<?php echo e($id); ?>"
                                                                data-name="<?php echo e(__('user')); ?>"
                                                                <?php echo e($user->is_active == 1 ? 'checked' : ''); ?> <?php echo e($store->is_store_enabled == 1 ? '' : 'disabled'); ?>>
                                                            <label class="form-check-label" for="user_disable"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="col-md-12 my-2 text-center"><?php echo e(__('User not found.!')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".is_store_enabled", function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var owner_id = $(this).attr('data-owner');
        var is_store_enabled = ($(this).is(':checked')) ? $(this).val() : 0;

        $.ajax({
            url: '<?php echo e(route('user.unable')); ?>',
            type: 'POST',
            data: {
                "is_store_enabled": is_store_enabled,
                "id": id,
                "name": name,
                "owner_id": owner_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(data) {
                if(data.success)
                {
                    if (name == 'store')
                    {
                        var container = document.getElementById('user_section_'+id);
                        var checkboxes = container.querySelectorAll('input[type="checkbox"]');
                        checkboxes.forEach(function(checkbox) {
                            if(is_store_enabled == 0){
                                checkbox.disabled = true;
                                checkbox.checked = false;
                            }else{
                                checkbox.disabled = false;
                            }
                        });

                    }
                    $('.active_store').text(data.store_data.active_store);
                    $('.disable_store').text(data.store_data.disable_store);
                    $('.total_store').text(data.store_data.total_store);
                    $.each(data.users_data, function(storeName, userData)
                    {
                        var $storeElements = $('.store[data-store-id="' + userData.store_id + '"]');
                        // Update total_users, active_users, and disable_users for each store
                        $storeElements.find('.total_users').text(userData.total_users);
                        $storeElements.find('.active_users').text(userData.active_users);
                        $storeElements.find('.disable_users').text(userData.disable_users);
                    });

                    show_toastr('success', data.success, 'success');
                }else{
                    show_toastr('error', data.error, 'error');

                }

            }
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/ownerinfo.blade.php ENDPATH**/ ?>