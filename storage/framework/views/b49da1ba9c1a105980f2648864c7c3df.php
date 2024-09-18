<?php
    $plan = Utility::user_plan();
?>
<?php echo e(Form::open(['url' => 'product_categorie', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="card-body">
        <div class="row">
            <?php if($plan['enable_chatgpt'] == 'on'): ?>
            <div class="col-6"></div>
                <div class="col-6 text-end">
                    <a class="btn btn-sm btn-primary mb-4" href="#" data-size="lg" data-ajax-popup-over="true"
                        data-url="<?php echo e(route('generate', ['products_category'])); ?>" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="<?php echo e(__('Generate')); ?>"
                        data-title="<?php echo e(__('Generate Category Name')); ?>"> <i class="fas fa-robot"></i>
                        <?php echo e(__('Generate With AI')); ?>

                    </a>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="form-group">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Product Category'), 'required' => 'required'])); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Save')); ?></button>
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\store\resources\views/product_category/create.blade.php ENDPATH**/ ?>