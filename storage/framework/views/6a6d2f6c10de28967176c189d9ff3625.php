<?php
    // $logo=asset(Storage::url('uploads/logo/'));
    // $favicon=\App\Models\Utility::getValByName('company_favicon');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = \App\Models\Utility::GetLogo();
    $settings = Utility::settings();

?>

<head>
    <meta charset="utf-8" dir="<?php echo e($settings['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=  ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Online Whatsapp Store Builder">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>
        <?php echo e(\App\Models\Utility::getValByName('header_text') ? \App\Models\Utility::getValByName('header_text') : config('app.name', 'WhatsStore')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>
    <link rel="icon"
        href="<?php echo e($logo . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') . '?timestamp='. time()); ?>"
        type="image" sizes="16x16">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/datepicker-bs5.min.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel='stylesheet' href='<?php echo e(asset('assets/css/cookieconsent.css')); ?>' media="screen" />
    <link rel="stylesheet" href="<?php echo e(asset('public/css/svgMap.min.css')); ?>" />

    <!-- vendor css -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">

    <?php if($settings['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-rtl.css')); ?>">
    <?php endif; ?>

    <?php if($settings['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($settings['cust_darklayout'] != 'on' && $settings['SITE_RTL'] != 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php else: ?>
        <link rel="stylesheet" href="" id="main-style-link">
    <?php endif; ?>
    <style>
        :root {
            --color-customColor: <?= $color ?>;    
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>
<?php /**PATH C:\xampp\htdocs\store\resources\views/partials/admin/head.blade.php ENDPATH**/ ?>