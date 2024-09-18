<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Themes')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Manage Themes')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Themes')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body table-border-style">
        <?php echo e(Form::open(['route' => ['store.changetheme', $store_settings->id], 'method' => 'POST'])); ?>

        <div class="d-flex mb-3 align-items-center justify-content-between">
            <h3><?php echo e(__('Themes')); ?></h3>
            <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>

            <button type="submit" class="btn  btn-primary"> <i data-feather="check-circle"
                    class="me-2"></i><?php echo e(__('Save Changes')); ?></button>

        </div>
        <div class="border border-primary rounded p-3">
            <div class="row gy-4 ">
                <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="theme-card selected border-primary">
                            <div class="theme-card-inner">
                                <div class="theme-image border  rounded">
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.png'))); ?>"
                                        class="color1 img-center pro_max_width pro_max_height <?php echo e($key); ?>_img"
                                        data-id="<?php echo e($key); ?>" alt="">
                                </div>
                                <div class="theme-content mt-3">
                                    <div class="d-flex mt-2 align-items-center" id="<?php echo e($key); ?>">
                                        <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="color-inputs">
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio" id="color1-theme4"
                                                        value="<?php echo e($css); ?>" data-theme="<?php echo e($key); ?>"
                                                        data-imgpath="<?php echo e($val['img_path']); ?>"
                                                        class="colorinput-input color-<?php echo e($loop->index++); ?>"
                                                        <?php echo e(isset($store_settings['store_theme']) && $store_settings['store_theme'] == $css ? 'checked' : ''); ?>>
                                                    <span class="border-box">
                                                        <span class="colorinput-color"
                                                            style="background:#<?php echo e($val['color']); ?>"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', 'input[name="theme_color"]', function() {
            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });
        $(document).ready(function() {
            setTimeout(function(e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);
        });
        $(".color1").click(function() {
            var dataId = $(this).attr("data-id");
            $('#' + dataId).trigger('click');
            var first_check = $('#' + dataId).find('.color-0').trigger("click");
            $(".theme-card").each(function() {
                $(".theme-card").removeClass('selected');
            });
            $('.' + dataId).addClass('selected');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/themes/theme.blade.php ENDPATH**/ ?>