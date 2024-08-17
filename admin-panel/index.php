
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:52:57 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons.css">


    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/light-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>صفحه اصلی</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php
        require_once('layout/header.php'); 
    ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php
        require_once('layout/asidebar.php'); 
    ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>کل سفارشات</p>
                                <h4 class="">8,542</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 16درصد <i class="bi bi-arrow-up"></i></p>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>کل بازدیدها</p>
                                <h4 class="">12.5میلیون</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-danger">- 3.4درصد <i class="bi bi-arrow-down"></i></p>
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>درآمد</p>
                                <h4 class="">32 تومان</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 24درصد <i class="bi bi-arrow-up"></i></p>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>مشتریان</p>
                                <h4 class="">25.8هزار</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 8.2درصد <i class="bi bi-arrow-up"></i></p>
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">درآمد</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">توسط دستگاه</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                            <div class="col-lg-7 col-xl-7 col-xxl-8">
                                <div class="by-device-container">
                                    <div class="piechart-legend">
                                        <h2 class="mb-1">85درصد</h2>
                                        <h6 class="mb-0">کل بازدیدکنندگان</h6>
                                    </div>
                                    <canvas id="chart6"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-5 col-xxl-4">
                                <div class="">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="bi bi-display-fill me-2 text-primary"></i> <span>پی سی - </span> <span>15.2درصد</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="bi bi-phone-fill me-2 text-success"></i> <span>موبایل - </span> <span>62.3درصد</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="bi bi-tablet-landscape-fill me-2 text-orange"></i> <span>تبلت - </span> <span>22.5درصد</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">منبع ترافیک</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart7" class=""></div>
                        <div class="traffic-widget">
                            <div class="progress-wrapper mb-3">
                                <p class="mb-1">اجتماعی <span class="float-end">8,475</span></p>
                                <div class="progress rounded-0" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper mb-3">
                                <p class="mb-1">مستقیم <span class="float-end">7,989</span></p>
                                <div class="progress rounded-0" style="height: 8px;">
                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 65%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper mb-0">
                                <p class="mb-1">جستجو کردن <span class="float-end">6,359</span></p>
                                <div class="progress rounded-0" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="card radius-10 border shadow-none mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-1">پیام ها</p>
                                        <h4 class="mb-0 text-pink">289</h4>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">عمل</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یک اقدام دیگر</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یه چیز دیگه اینجا</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="chart8"></div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-1">مجموع پست ها</p>
                                        <h4 class="mb-0 text-success">489</h4>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">عمل</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یک اقدام دیگر</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یه چیز دیگه اینجا</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="chart9"></div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none mb-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-1">وظایف جدید</p>
                                        <h4 class="mb-0 text-info">149</h4>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">عمل</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یک اقدام دیگر</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">یه چیز دیگه اینجا</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="chart10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">بازدید کنندگان</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart11" class=""></div>
                        <div class="d-flex align-items-center gap-5 justify-content-center mt-3 p-2 radius-10 border">
                            <div class="text-center">
                                <h3 class="mb-2 text-primary">8,546</h3>
                                <p class="mb-0">بازدیدکنندگان جدید</p>
                            </div>
                            <div class="border-end sepration"></div>
                            <div class="text-center">
                                <h3 class="mb-2 text-primary-2">3,723</h3>
                                <p class="mb-0">بازدیدکنندگان قدیمی</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">سفارشات اخیر</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>#شناسه</th>
                                    <th>تولید - محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت</th>
                                    <th>تاریخ</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#89742</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/11.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">تلفن همراه هوشمند</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>214 تومان</td>
                                    <td>8 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#68570</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/07.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">ساعت ورزشی</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>185 تومان</td>
                                    <td>9 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#38567</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/17.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">کفش پاشنه قرمز زنانه</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td>356 تومان</td>
                                    <td>10 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#48572</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/04.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">ژاکت زمستانی زرد</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>149 تومان</td>
                                    <td>11 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#96857</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/10.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">هدفون میکرو نارنجی</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>199 تومان</td>
                                    <td>15 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#96857</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="assets/images/products/12.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">لپ تاپ پرو سامسونگ</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>699 تومان</td>
                                    <td>18 خرداد، 1400</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">فروش بر اساس کشور</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">عمل</a></li>
                                    <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="geographic-map" class="mt-2"></div>
                        <div class="traffic-widget">
                            <div class="progress-wrapper mb-3">
                                <p class="mb-1">ایالات متحده <span class="float-end">2.5 تومان</span></p>
                                <div class="progress rounded-0" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper mb-3">
                                <p class="mb-1">روسیه <span class="float-end">5 تومان</span></p>
                                <div class="progress rounded-0" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%;"></div>
                                </div>
                            </div>
                            <div class="progress-wrapper mb-0">
                                <p class="mb-1">استرالیا <span class="float-end">9 تومان</span></p>
                                <div class="progress rounded-0" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--end row-->



    </main>
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--start footer-->
    <footer class="footer">
        <div class="footer-text">
            حق نشر © 2022. کلیه حقوق محفوظ است.
        </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">سفارشی ساز تم</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <h6 class="mb-0">تنوع تم</h6>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
                    <label class="form-check-label" for="LightTheme">روشن</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                    <label class="form-check-label" for="DarkTheme">تاریک</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
                    <label class="form-check-label" for="SemiDarkTheme">نیمه دارک</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3" checked>
                    <label class="form-check-label" for="MinimalTheme">تم مینیمال</label>
                </div>
                <hr/>
                <h6 class="mb-0">رنگ های سرصفحه</h6>
                <hr/>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator headercolor1" id="headercolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor2" id="headercolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor3" id="headercolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor4" id="headercolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor5" id="headercolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor6" id="headercolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor7" id="headercolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor8" id="headercolor8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/js/pace.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<!--app-->
<script src="assets/js/app.js"></script>
<script src="assets/js/index3.js"></script>
<script>
    new PerfectScrollbar(".best-product")
</script>


</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:53:28 GMT -->
</html>