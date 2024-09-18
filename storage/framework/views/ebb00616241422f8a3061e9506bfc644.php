<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Referral Program')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Referral Program')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Referral Program')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-page'); ?>
<script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>

    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 200,
        })

        $('.tab-link').on('click', function () {
        var tabId = $(this).data('tab');
        $('.tab-content').addClass('d-none');
        $('#' + tabId).removeClass('d-none');
        
        $('.tab-link').removeClass('active');
        $(this).addClass('active');
    });

    if ($('.is_enable').is(':checked')) {

        $('.referral-settings').removeClass('disabledCookie');
    } else {

        $('.referral-settings').addClass('disabledCookie');
    }

    $('.is_enable').on('change', function() {
        if ($('.is_enable').is(':checked')) {

            $('.referral-settings').removeClass('disabledCookie');
        } else {

            $('.referral-settings').addClass('disabledCookie');
        }
    });

    </script>
<?php $__env->stopPush(); ?>

<?php
    $settings = Utility::getAdminPaymentSetting();
    $currency = isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$';
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#transaction"
                                class="list-group-item list-group-item-action border-0 tab-link active" data-tab="transaction"><?php echo e(__('Transaction')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#payout-request"
                                class="list-group-item list-group-item-action border-0 tab-link" data-tab="payout-request"><?php echo e(__('Payout Request')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#settings" class="list-group-item list-group-item-action border-0 tab-link" data-tab="settings"><?php echo e(__('Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    

                    <!--Site Settings-->
                    <div id="transaction" class="card tab-content">
                        <div class="card-header">
                            <h5><?php echo e(__('Transaction')); ?></h5>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table pc-dt-simple" id="transaction">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('#')); ?></th>
                                            <th><?php echo e(__('Owner Name')); ?></th>
                                            <th><?php echo e(__('Referral Owner')); ?></th>
                                            <th><?php echo e(__('Plan Name')); ?></th>
                                            <th><?php echo e(__('Plan Price')); ?></th>
                                            <th><?php echo e(__('Commission (%)')); ?></th>
                                            <th><?php echo e(__('Commission Amount')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <?php echo e(++$key); ?> </td>
                                                <?php
                                                   $owner = \App\Models\User::where('type','Owner')->where('referral_code',$transaction->referral_code)->first();
                                                ?>
                                                <td><?php echo e(!empty($owner->name) ? $owner->name : '-'); ?></td>
                                                <td><?php echo e(!empty($transaction->getUser) ? $transaction->getUser->name : '-'); ?>

                                                </td>
                                                <td><?php echo e(!empty($transaction->getPlan) ? $transaction->getPlan->name : '-'); ?>

                                                </td>
                                                <td><?php echo e($currency . $transaction->plan_price); ?></td>
                                                <td><?php echo e($transaction->commission ? $transaction->commission : ''); ?></td>
                                                <td><?php echo e($currency . ($transaction->plan_price * $transaction->commission) / 100); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="payout-request" class="card tab-content d-none">
                        <div class="card-header">
                            <h5><?php echo e(__('Payout Request')); ?></h5>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table pc-dt-simple" id="payout-request">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('#')); ?></th>
                                            <th><?php echo e(__('Owner Name')); ?></th>
                                            <th><?php echo e(__('Requested Date')); ?></th>
                                            <th><?php echo e(__('Requested Amount')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $payRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <?php echo e(( ++ $key)); ?> </td>
                                                <td><?php echo e(!empty( $transaction->getOwner) ? $transaction->getOwner->name : '-'); ?></td>
                                                <td><?php echo e($transaction->date); ?></td>
                                                <td><?php echo e($currency . $transaction->req_amount); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('amount.request',[$transaction->id,1])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-check f-20"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('amount.request',[$transaction->id,0])); ?>"
                                                        class="btn btn-sm btn-icon  bg-light-secondary me-2">
                                                        <i class="ti ti-x f-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="settings" class="card tab-content d-none">
                        <?php echo e(Form::open(['route' => 'referral-program.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header flex-column flex-lg-row d-flex align-items-lg-center gap-2 justify-content-between">
                            <h5><?php echo e(__('Settings')); ?></h5>
                            <div class="form-check form-switch custom-switch-v1">
                                <input type="checkbox" name="is_enable" class="form-check-input input-primary is_enable"
                                       id="is_enable" <?php echo e(isset($setting) && $setting->is_enable == '1' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_enable"><?php echo e(__('Enable')); ?></label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="row referral-settings">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('percentage', __('Commission Percentage (%)'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::number('percentage', isset($setting) ? $setting->percentage : '', ['class' => 'form-control', 'placeholder' => __('Enter Commission Percentage')])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('minimum_threshold_amount', __('Minimum Threshold Amount'), ['class' => 'form-label'])); ?>

                                            <div class="input-group">
                                                <span class="input-group-prepend"><span
                                                    class="input-group-text"><?php echo e($currency); ?></span></span>
                                            <?php echo e(Form::number('minimum_threshold_amount', isset($setting) ? $setting->minimum_threshold_amount : '', ['class' => 'form-control', 'placeholder' => __('Enter Minimum Payout')])); ?>

                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <?php echo e(Form::label('guideline', __('GuideLines'), ['class' => 'form-label text-dark'])); ?>

                                        <textarea name="guideline" class="summernote"><?php echo e(isset($setting) ? $setting->guideline : ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button class="btn-submit btn btn-primary" type="submit">
                                        <?php echo e(__('Save Changes')); ?>

                                    </button>
                                </div>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/referral-program/index.blade.php ENDPATH**/ ?>