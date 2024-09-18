<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $settings = Utility::settings(); ?>
    <script>
        var timezone = '<?php echo e(!empty($settings['timezone']) ? $settings['timezone'] : 'Asia/Kolkata'); ?>';

        let today = new Date(new Date().toLocaleString("en-US", {
            timeZone: timezone
        }));
        var curHr = today.getHours()
        var target = document.getElementById("greetings");

        if (curHr < 12) {
            target.innerHTML = "Good Morning,";
        } else if (curHr < 17) {
            target.innerHTML = "Good Afternoon,";
        } else {
            target.innerHTML = "Good Evening,";
        }
        // var today = new Date()
        // var curHr = today.getHours()
        // var target = document.getElementById("greetings")

        // if (curHr < 12) {
        //     target.innerHTML = "<?php echo e(__('Good Morning,')); ?>";
        // } else if (curHr < 17) {
        //     target.innerHTML = "<?php echo e(__('Good Afternoon,')); ?>";
        // } else {
        //     target.innerHTML = "<?php echo e(__('Good Evening,')); ?>";
        // }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $logo = \App\Models\Utility::get_file('uploads/logo/');
        $company_logo = \App\Models\Utility::getValByName('company_logo');
        $profile = \App\Models\Utility::get_file('uploads/profile/');
        $logo1 = \App\Models\Utility::get_file('uploads/is_cover_image/');
        $users = Auth::user();
    ?>
    <!-- [ Main Content ] start -->
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-primary">
                                            <i class="fas fa-cube"></i>
                                        </div>
                                        <h6 class="mb-3 mt-4 "><?php echo e(__('Total Store')); ?></h6>
                                        <h3 class="mb-0"><?php echo e($user->total_user); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-warning">
                                            <i class="fas fa-cart-plus"></i>
                                        </div>
                                        <h6 class="mb-3 mt-4 "><?php echo e(__('Total Orders')); ?></h6>
                                        <h3 class="mb-0"><?php echo e($user->total_orders); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-danger">
                                            <i class="fas fa-shopping-bag"></i>
                                        </div>
                                        <h6 class="mb-3 mt-4 "><?php echo e(__('Total Plans')); ?></h6>
                                        <h3 class="mb-0"><?php echo e($user['total_plan']); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Recent Order')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div id="plan_order" data-color="primary" data-height="230"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
    <?php else: ?>
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="row mb-5 gy-4">
                    <div class="col-lg-4">
                        <div class="welcome-card border bg-light-primary p-3 border-primary rounded text-dark h-100">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-2">
                                    <img src="<?php echo e(!empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . 'avatar.png'); ?>"
                                        alt="" class="theme-avtar">
                                </div>
                                <div>
                                    <h5 class="mb-0 f-w-600 text-primary">
                                        <span class="d-block" id="greetings"></span>
                                        <b class="f-w-700"><?php echo e(__(Auth::user()->name)); ?></b>
                                    </h5>
                                </div>
                            </div>
                            <p class="mb-0 f-w-500 text-primary"><b
                                    class="f-w-700"><?php echo e(__('Have a nice day!')); ?></b><?php echo e(__(' Did you know that you can quickly add your favorite product or category to the store?')); ?>

                            </p>
                            <div class="btn-group mt-4">
                                <button class="btn  btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="plus" class="me-2"></i>
                                    <?php echo e(__('Quick add')); ?></button>
                                <div class="dropdown-menu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Products')): ?>
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('product.create')); ?>"><?php echo e(__('Add new product')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Product Tax')): ?>
                                        <a class="dropdown-item" href="#!" data-size="md"
                                            data-url="<?php echo e(route('product_tax.create')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Create New Product Tax')); ?>"><?php echo e(__('Add new product tax')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Product category')): ?>
                                        <a class="dropdown-item" href="#!" data-size="md"
                                            data-url="<?php echo e(route('product_categorie.create')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Create New Product Category')); ?>"><?php echo e(__('Add new product category')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Product Coupan')): ?>
                                        <a class="dropdown-item" href="#!" data-size="md"
                                            data-url="<?php echo e(route('product-coupon.create')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Create New Product Coupon')); ?>"><?php echo e(__('Add new product coupon')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gy-4">
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body border rounded  p-3">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0"><?php echo e($store_id->name); ?></h6>
                                            <span>
                                                <i data-feather="arrow-up-right"></i>
                                            </span>
                                        </div>
                                        <div class="mb-4" style="text-align: center">
                                            <?php echo QrCode::generate($store_id['store_url']); ?>

                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <a href="#!" class="btn btn-light-primary w-100 cp_link"
                                                data-link="<?php echo e($store_id['store_url']); ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                data-bs-original-title="<?php echo e(__('Click to copy link')); ?>"><?php echo e(__('Store Link')); ?><i
                                                class="ms-3" data-feather="copy"></i></a>
                                            <a href="#" id="socialShareButton"
                                                class="socialShareButton btn btn-sm btn-primary ms-1 share-btn" style=" padding-top: 8px; padding-bottom: 8px; ">
                                                <i class="ti ti-share"></i>
                                            </a>
                                            <div id="sharingButtonsContainer" class="sharingButtonsContainer"
                                                style="display: none;">
                                                <div class="Demo1 d-flex align-items-center justify-content-center hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body border rounded  p-3">
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0"><?php echo e(__('Total Products')); ?></h6>
                                            <span>
                                                <i data-feather="arrow-up-right"></i>
                                            </span>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <span class="f-30 f-w-600"><?php echo e($newproduct); ?></span>
                                            
                                        </div>
                                        <div class="chart-wrapper">
                                            <div id="TotalProducts" class="remove-min"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body border rounded  p-3">
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0"><?php echo e(__('Total Sales')); ?></h6>
                                            <span>
                                                <i data-feather="arrow-up-right"></i>
                                            </span>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <span
                                                class="f-30 f-w-600"><?php echo e(\App\Models\Utility::priceFormat($totle_sale)); ?></span>
                                            
                                        </div>
                                        <div class="chart-wrapper">
                                            <div id="TotalSales" class="remove-min"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body border rounded  p-3">
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0"><?php echo e(__('Total Orders')); ?></h6>
                                            <span>
                                                <i data-feather="arrow-up-right"></i>
                                            </span>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <span class="f-30 f-w-600"><?php echo e($totle_order); ?></span>
                                            
                                        </div>
                                        <div class="chart-wrapper">
                                            <div id="TotalOrders" class="remove-min"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4><?php echo e(__('Storage Status')); ?> <small>(<?php echo e($users->storage_limit . 'MB'); ?> /
                                <?php echo e($plan->storage_limit.'MB'); ?>)</small></h4>
                        <div class="card shadow-none mb-0">
                            <div class="card-body border rounded  p-3">
                                <div id="device-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h4><?php echo e(__('Order')); ?></h4>
                        <div class="card shadow-none mb-0">
                            <div class="card-body p-3 rounded border">
                                <div id="apex-dashborad"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="f-w-900 m-3"><?php echo e(__('Top Products')); ?></h3>
                        <div class="card mb-0 shadow-none">
                            <div class="card-body border border-bottom-0 overflow-hidden rounded pb-0 table-border-style">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="bg-transparent" colspan="4"><?php echo e(__('Product')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Product Name')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Quantity')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Price')); ?></th>
                                                <th class="bg-transparent"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $item_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($product->id == $item): ?>
                                                    <tr>
                                                        <?php if(!empty($product->is_cover)): ?>
                                                            <td colspan="4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="theme-avtar me-2">
                                                                        <img src="<?php echo e($logo1 . (isset($product->is_cover) && !empty($product->is_cover) ? $product->is_cover : 'default_img.png')); ?>"
                                                                            alt="" class="wid-30">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <?php else: ?>
                                                            <td colspan="4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="theme-avtar me-2">
                                                                        <img src="<?php echo e($logo1 . (isset($product->is_cover) && !empty($product->is_cover) ? $product->is_cover : 'default_img.png')); ?>"
                                                                            alt="" class="wid-30">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <?php endif; ?>
                                                        <td><a href="<?php echo e($logo1 . (isset($product->is_cover) && !empty($product->is_cover) ? $product->is_cover : 'default_img.png')); ?>"
                                                            class=" text-dark f-w-600"
                                                            target="_blank"><?php echo e($product->name); ?></a></td>
                                                        <td><?php echo e($product->quantity); ?></td>
                                                        <td><span
                                                                class="f-w-700"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                                                        </td>
                                                        <td><span
                                                                class="badge rounded p-2 f-10 bg-light-primary"><?php echo e($totle_qty[$k]); ?>

                                                                <?php echo e(__('Sold')); ?></span>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3 class="f-w-900 m-3"><?php echo e(__('Recent Orders')); ?></h3>
                    </div>
                    <div class="col-12">
                        <div class="card mb-0 shadow-none">
                            <div class="card-body border border-bottom-0 overflow-hidden rounded pb-0 table-border-style">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="bg-transparent"><?php echo e(__('Orders')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Date')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Name')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Value')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Payment Type')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Status')); ?></th>
                                                <th class="bg-transparent"><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($new_orders)): ?>
                                                <?php $__currentLoopData = $new_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($order->status != 'Cancel Order'): ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?php echo e(route('orders.show', \Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>"
                                                                    class="btn  btn-outline-primary cp_link"
                                                                    data-link="<?php echo e($store_id['store_url']); ?>"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="<?php echo e(__('Details')); ?>"><?php echo e($order->order_id); ?></a>
                                                            </td>
                                                            <td> <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                            </td>
                                                            <td><?php echo e($order->name); ?></td>
                                                            <td><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></td>
                                                            <td><?php echo e($order->payment_type); ?></td>
                                                            <td>
                                                                <?php if($order->status == 'pending'): ?>
                                                                    <span
                                                                        class="badge me-2 rounded p-2 bg-light-primary"><?php echo e(__('Paid')); ?></span>
                                                                    <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                                <?php else: ?>
                                                                    <span
                                                                        class="badge me-2 rounded p-2 bg-light-secondary"><?php echo e(__('Delivered')); ?></span>
                                                                    <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(route('orders.show', \Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>"
                                                                    class="btn btn-sm  btn-icon btn-secondary"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="<?php echo e(__('Details')); ?>"><i
                                                                        data-feather="eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
    <?php endif; ?>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#code-generate', function() {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <script>
            (function() {
                var options = {
                    chart: {
                        height: 250,
                        type: 'area',
                        toolbar: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2,
                        curve: 'smooth'
                    },


                    series: [{
                        name: "Order",
                        data: <?php echo json_encode($chartData['data']); ?>

                        // data: [10,20,30,40,50,60,70,40,20,50,60,20,50,70]
                    }],

                    xaxis: {
                        axisBorder: {
                            show: !1
                        },
                        type: "MMM",
                        categories: <?php echo json_encode($chartData['label']); ?>,
                        title: {
                            text: '<?php echo e(__('Days')); ?>'
                        }
                    },
                    colors: ['#e83e8c'],

                    grid: {
                        strokeDashArray: 4,
                    },
                    legend: {
                        show: false,
                    },
                    // markers: {
                    //     size: 4,
                    //     colors: ['#FFA21D'],
                    //     opacity: 0.9,
                    //     strokeWidth: 2,
                    //     hover: {
                    //         size: 7,
                    //     }
                    // },
                    yaxis: {
                        tickAmount: 3,
                    }
                };
                var chart = new ApexCharts(document.querySelector("#plan_order"), options);
                chart.render();
            })();
        </script>
    <?php else: ?>
        <script>
            $(document).ready(function() {
                $('.cp_link').on('click', function() {
                    var value = $(this).attr('data-link');
                    var $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val(value).select();
                    document.execCommand("copy");
                    $temp.remove();
                    show_toastr('Success', '<?php echo e(__('Link copied')); ?>', 'success')
                });
            });

            (function() {
                var options = {
                    chart: {
                        height: 250,
                        type: 'area',
                        toolbar: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2,
                        curve: 'smooth'
                    },


                    series: [{
                        name: "Order",
                        data: <?php echo json_encode($chartData['data']); ?>

                        // data: [10,20,30,40,50,60,70,40,20,50,60,20,50,70]
                    }],

                    xaxis: {
                        axisBorder: {
                            show: !1
                        },
                        type: "MMM",
                        categories: <?php echo json_encode($chartData['label']); ?>,
                        title: {
                            text: '<?php echo e(__('Days')); ?>'
                        }
                    },
                    colors: ['#6fd943'],

                    grid: {
                        strokeDashArray: 4,
                    },
                    legend: {
                        show: false,
                    },
                    // markers: {
                    //     size: 4,
                    //     colors: ['#FFA21D'],
                    //     opacity: 0.9,
                    //     strokeWidth: 2,
                    //     hover: {
                    //         size: 7,
                    //     }
                    // },
                    yaxis: {
                        tickAmount: 3,
                    }
                };
                var chart = new ApexCharts(document.querySelector("#apex-dashborad"), options);
                chart.render();
            })();
            var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                target: '#useradd-sidenav',
                offset: 300
            })
        </script>
        <script>
            $(document).on('click', '#code-generate', function() {
                var length = 10;
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                $('#auto-code').val(result);
            });
        </script>
        <script>
            (function() {
                var options = {
                    series: [<?php echo e($storage_limit); ?>],
                    chart: {
                        height: 550,
                        type: 'radialBar',
                        offsetY: -20,
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90,
                            endAngle: 90,
                            track: {
                                background: "#e7e7e7",
                                strokeWidth: '100%',
                                margin: 5, // margin is in pixels
                            },
                            dataLabels: {
                                name: {
                                    show: true
                                },
                                value: {
                                    offsetY: -50,
                                    fontSize: '20px'
                                }
                            }
                        }
                    },
                    grid: {
                        padding: {
                            top: -10
                        }
                    },
                    colors: ["#6FD943"],
                    labels: ['Used'],
                };
                var chart = new ApexCharts(document.querySelector("#device-chart"), options);
                chart.render();
            })();
        </script>

        <script>
            //social sharing
            $(document).ready(function() {
                var customURL = <?php echo json_encode(url('/store/' . $store_id->slug)); ?>;
                $('.Demo1').socialSharingPlugin({
                    url: customURL,
                    title: $('meta[property="og:title"]').attr('content'),
                    description: $('meta[property="og:description"]').attr('content'),
                    img: $('meta[property="og:image"]').attr('content'),
                    enable: ['whatsapp', 'facebook', 'twitter', 'pinterest', 'linkedin']
                });

                $('.socialShareButton').click(function(e) {
                    e.preventDefault();
                    $('.sharingButtonsContainer').toggle();
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store\resources\views/home.blade.php ENDPATH**/ ?>