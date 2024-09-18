<?php echo e(Form::open(['route' => 'plans.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<?php echo csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6 text-end">
            <a class="btn btn-sm btn-primary" href="#" data-size="lg" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['plan'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Plan Name')); ?>">
                <i class="fas fa-robot"></i><?php echo e(__('Generate With AI')); ?>

            </a>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('price', __('Price'), ['class' => 'col-form-label'])); ?>

                <div class="input-group col-md-12">
                    <div class="input-group-text"><?php echo e((!empty($admin_payments_setting['currency_symbol']) ? $admin_payments_setting['currency_symbol'] : '$')); ?></div>
                    <?php echo e(Form::number('price', null, ['class' => 'form-control', 'id' => 'monthly_price', 'min' => '0',
                    'step' => '0.01', 'placeholder' => __('Enter Price'), 'required' => 'required'])); ?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('duration', __('Duration'), ['class' => 'col-form-label'])); ?>

                <?php echo Form::select('duration', $arrDuration, null, [
                    'class' => 'form-control',
                    'data-toggle' => 'select',
                    'required' => 'required',
                    'placeholder' => 'Select Duration',
                ]); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('max_stores', __('Maximum Store'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::number('max_stores', null, ['class' => 'form-control', 'id' => 'max_stores', 'placeholder' => __('Enter Max Store'), 'required' => 'required'])); ?>

                <span><small><?php echo e(__("Note: '-1' for Unlimited")); ?></small></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('max_products', __('Maximum Products Per Store'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::number('max_products', null, ['class' => 'form-control', 'id' => 'max_products', 'placeholder' => __('Enter Max Products'), 'required' => 'required'])); ?>

                <span><small><?php echo e(__("Note: '-1' for Unlimited")); ?></small></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('max_products', __('Maximum Users Per Store'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::number('max_users', null, ['class' => 'form-control', 'id' => 'max_users', 'placeholder' => __('Enter Max Products'), 'required' => 'required'])); ?>

                <span><small><?php echo e(__("Note: '-1' for Unlimited")); ?></small></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('storage_limit', __('Maximum Storage Limit Per Store'), ['class' => 'col-form-label'])); ?>

                <div class="input-group col-md-12">
                    <?php echo e(Form::number('storage_limit', null, ['class' => 'form-control', 'id' => 'storage_limit', 'placeholder' => __('Enter Max Storage Limit'), 'required' => 'required'])); ?>

                    <div class="input-group-text col-md-2"><?php echo e('MB'); ?></div>
                </div>
                <span><small><?php echo e(__("Note: upload size (In MB)")); ?></small></span>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control form-switch pt-5 ">
                <input type="checkbox" class="form-check-input" name="enable_custdomain" id="enable_custdomain">
                <label class="custom-control-label form-check-label"
                    for="enable_custdomain"><?php echo e(__('Enable Domain')); ?></label>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control form-switch pt-2">
                <input type="checkbox" class="form-check-input" name="enable_custsubdomain" id="enable_custsubdomain">
                <label class="custom-control-label form-check-label"
                    for="enable_custsubdomain"><?php echo e(__('Enable Sub Domain')); ?></label>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control form-switch pt-2">
                <input type="checkbox" class="form-check-input" name="shipping_method" id="shipping_method">
                <label class="custom-control-label form-check-label"
                    for="shipping_method"><?php echo e(__('Enable Shipping Method')); ?></label>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control form-switch pt-2">
                <input type="checkbox" class="form-check-input" name="pwa_store" id="pwa_store">
                <label class="custom-control-label form-check-label"
                    for="pwa_store"><?php echo e(__('Enable Progressive Web App ( PWA )')); ?></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control form-switch pt-2">
                <input type="checkbox" class="form-check-input" name="enable_chatgpt" id="enable_chatgpt">
                <label class="custom-control-label form-check-label"
                    for="enable_chatgpt"><?php echo e(__('Enable Chat GPT')); ?></label>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            <div class="custom-control form-switch pt-2">
                <input type="checkbox" class="form-check-input" name="trial" value="1" id="trial">
                <label class="custom-control-label form-check-label"
                    for="trial"><?php echo e(__('Trial is enable(on/off)')); ?></label>
            </div>
        </div>
        <div class="col-md-6 d-none plan_div mt-2">
            <div class="form-group">
                <?php echo e(Form::number('trial_days',null, ['class' => 'form-control', 'id' => 'trial_days' , 'placeholder' => __('Enter Trial days'),'step' => '1','min'=>'1'])); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 2, 'placeholder' => __('Enter Description')])); ?>

            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>
<?php echo e(Form::close()); ?>


<script>
    $(document).on('change', '#trial', function() {
        if ($(this).is(':checked')) {
            $('.plan_div').removeClass('d-none');
            $('#trial').attr("required", true);
            $('#trial_days').attr("required", true);

        } else {
            $('.plan_div').addClass('d-none');
            $('#trial').removeAttr("required");
            $('#trial_days').removeAttr("required");
        }
    });
</script><?php /**PATH C:\xampp\htdocs\store\resources\views/plans/create.blade.php ENDPATH**/ ?>