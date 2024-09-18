<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $users = \Auth::user();
    $currantLang = $users->currentLanguages();
    $languages = \App\Models\Utility::languages();
    $settings = Utility::settings();
    $footer_text = !empty($settings['footer_text']) ? $settings['footer_text'] : '';
    $setting = App\Models\Utility::colorset();
    $SITE_RTL = $settings['SITE_RTL'];

    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

    if(isset($setting['color_flag']) && $setting['color_flag'] == 'true')
    {
        $themeColor = 'custom-color';
    }
    else {
        $themeColor = $color;
    }

    if (\Auth::user()->type == 'Super Admin') {
        $company_logo = Utility::get_superadmin_logo();
    } else {
        $company_logo = Utility::get_company_logo();
    }
    $plan = \Auth::user()->currentPlan;
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">
<?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="<?php echo e($themeColor); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <?php echo $__env->make('partials.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <?php echo $__env->make('partials.admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Main Content ] end -->

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>

    <footer class="dash-footer">
        <div class="footer-wrapper">
            <div class="py-1">
                <span class="text-muted">
                     &copy;
                     <?php echo e(date('Y')); ?>

                    <?php echo e(!empty($settings['footer_text']) ? $settings['footer_text'] : config('app.name', 'Whatsstore SaaS')); ?>

                </span>
            </div>
        </div>
    </footer>
    <?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $(document).ready(function() {
            cust_theme_bg();
            cust_darklayout();
        });



        feather.replace();
        var pctoggle = document.querySelector("#pct-toggler");
        if (pctoggle) {
            pctoggle.addEventListener("click", function() {
                if (
                    !document.querySelector(".pct-customizer").classList.contains("active")
                ) {
                    document.querySelector(".pct-customizer").classList.add("active");
                } else {
                    document.querySelector(".pct-customizer").classList.remove("active");
                }
            });
        }

        var themescolors = document.querySelectorAll(".themes-color > a");
        for (var h = 0; h < themescolors.length; h++) {
            var c = themescolors[h];

            c.addEventListener("click", function(event) {
                var targetElement = event.target;
                if (targetElement.tagName == "SPAN") {
                    targetElement = targetElement.parentNode;
                }
                var temp = targetElement.getAttribute("data-value");
                removeClassByPrefix(document.querySelector("body"), "theme-");
                document.querySelector("body").classList.add(temp);
            });
        }

        function cust_theme_bg() {
            var custthemebg = document.querySelector("#cust-theme-bg");
            // custthemebg.addEventListener("click", function() {

            if (custthemebg.checked) {
                document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.add("transprent-bg");
            } else {
                document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.remove("transprent-bg");
            }
            // });
        }
        var custthemebg = document.querySelector("#cust-theme-bg");
        custthemebg.addEventListener("click", function() {
            if (custthemebg.checked) {
                document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.add("transprent-bg");
            } else {
                document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.remove("transprent-bg");
            }
        });


        function cust_darklayout() {
            var custdarklayout = document.querySelector("#cust-darklayout");
            // custdarklayout.addEventListener("click", function() {
            <?php if(\Auth::user()->type == 'super admin'): ?>
                if (custdarklayout.checked) {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . 'logo-light.png'); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                } else {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . 'logo-dark.png'); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
                }
            <?php else: ?>
                if (custdarklayout.checked) {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . $company_logo); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                } else {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . $company_logo); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
                }
            <?php endif; ?>
        }

        var custdarklayout = document.querySelector("#cust-darklayout");
        custdarklayout.addEventListener("click", function() {
            <?php if(\Auth::user()->type == 'super admin'): ?>
                if (custdarklayout.checked) {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . 'logo-light.png'); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                } else {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . 'logo-dark.png'); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
                }
            <?php else: ?>
                if (custdarklayout.checked) {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . $company_logo); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                } else {
                    document
                        .querySelector(".m-header > .b-brand > .logo-lg")
                        .setAttribute("src", "<?php echo e($logo . '/' . $company_logo); ?>");
                    document
                        .querySelector("#main-style-link")
                        .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
                }
            <?php endif; ?>
        });

        function removeClassByPrefix(node, prefix) {
            for (let i = 0; i < node.classList.length; i++) {
                let value = node.classList[i];
                if (value.startsWith(prefix)) {
                    node.classList.remove(value);
                }
            }
        }
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\store\resources\views/layouts/admin.blade.php ENDPATH**/ ?>