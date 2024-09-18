<form method="post" action="<?php echo e(route('coupons.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('name',__('Name'),array('class'=>'col-form-label'))); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

            </div>

            <div class="form-group col-md-6">
                <?php echo e(Form::label('discount',__('Discount') ,array('class'=>'col-form-label'))); ?>

                <?php echo e(Form::number('discount',null,array('class'=>'form-control','step'=>'0.01','placeholder'=>__('Enter Discount'),'required'=>'required'))); ?>

                <span class="small"><?php echo e(__('Note: Discount in Percentage')); ?></span>
            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('limit',__('Limit') ,array('class'=>'col-form-label'))); ?>

                <?php echo e(Form::number('limit',null,array('class'=>'form-control','placeholder'=>__('Enter Limit'),'required'=>'required'))); ?>

            </div>
           <div class="form-group col-md-12" id="auto">
                <label for="code"><?php echo e(__('Code')); ?></label>
                <div class="input-group">
                    <input class="form-control" name="code" type="text" id="auto-code" value="">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text" id="code-generate"><i class="fa fa-history pr-1"></i> <?php echo e(__('Generate')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
    </div>
</form>

<?php /**PATH C:\xampp\htdocs\store\resources\views/coupon/create.blade.php ENDPATH**/ ?>