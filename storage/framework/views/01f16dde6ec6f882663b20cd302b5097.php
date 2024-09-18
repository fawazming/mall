<?php
    $plan = Utility::user_plan();
?>
<?php echo e(Form::open(['url' => 'store-resource', 'method' => 'post'])); ?>


<div class="modal-body">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6 text-end">
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <a class="btn btn-sm btn-primary" href="#" data-size="lg" data-ajax-popup-over="true"
                    data-url="<?php echo e(route('generate', ['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Coupon Name')); ?>">
                    <i class="fas fa-robot"></i>
                    <?php echo e(__('Generate With AI')); ?>

                </a>
            <?php else: ?>
                <?php if($plan['enable_chatgpt'] == 'on'): ?>
                    <a class="btn btn-sm btn-primary" href="#" data-size="lg" data-ajax-popup-over="true"
                        data-url="<?php echo e(route('generate', ['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Coupon Name')); ?>">
                        <i class="fas fa-robot"></i>
                        <?php echo e(__('Generate With AI')); ?>

                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="col-12">
            <div class="form-group">
                <h6><?php echo e(__('Store Name')); ?></h6>
                <?php echo e(Form::text('store_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Store Name'), 'required' => 'required'])); ?>

            </div>
        </div>
        <?php if(\Auth::user()->type == 'super admin'): ?>
            <div class="col-12">
                <div class="form-group">
                    <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email'), 'required' => 'required'])); ?>

                </div>
            </div>
            <div class="col-6 form-group">
                <label for="password_switch"><?php echo e(__('Login is enable')); ?></label>
                <div class="form-check form-switch custom-switch-v1 float-end">
                    <input type="checkbox" name="password_switch" class="form-check-input input-primary pointer" value="on" id="password_switch">
                    <label class="form-check-label" for="password_switch"></label>
                </div>
            </div>
            <div class="col-12 ps_div d-none">
                <div class="form-group">
                    <?php echo e(Form::label('password', __('Password'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password')])); ?>

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="invalid-password" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if(\Auth::user()->type != 'super admin'): ?>
        <div class="d-flex mb-3 align-items-center justify-content-between">
            <h6><?php echo e(__('Theme Settings')); ?></h6>
            <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>

            <input type="hidden" id='themefile'>
            
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
                                        <div class="color-inputs">
                                            <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio" id="color1-theme4"
                                                        value="<?php echo e($css); ?>" data-theme="<?php echo e($key); ?>"
                                                        data-imgpath="<?php echo e($val['img_path']); ?>"
                                                        class="colorinput-input color-<?php echo e($loop->index++); ?>"
                                                        <?php echo e(isset($store_settings['store_theme']) && $store_settings['store_theme'] == $css && $store_settings['theme_dir'] == $key ? 'checked' : ''); ?>>
                                                    <span class="border-box">
                                                        <span class="colorinput-color"
                                                            style="background:#<?php echo e($val['color']); ?>"></span>
                                                    </span>
                                                </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Save')); ?></button>
    </div>
    <script>
        $('body').on('click', 'input[name="theme_color"]', function() {
            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });
        $('body').ready(function() {
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
        });
    </script>
</div>


<?php echo e(Form::close()); ?>


    
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
    </script><?php /**PATH C:\xampp\htdocs\store\resources\views/admin_store/create.blade.php ENDPATH**/ ?>