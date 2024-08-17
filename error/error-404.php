<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/pages-errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

<head>
    <?php require_once('../layout/css.php'); ?>

    <title>صفحه ارور-404</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <?php
        require_once('../layout/header.php');
        ?>
<aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">وان دش</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="../admin-panel/index.php" class="">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i>
                    </div>
                    <div class="menu-title">داشبورد</div>
                </a>
                
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                    </div>
                    <div class="menu-title">مدیران</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/admins/admins_list.php"><i class="bi bi-circle"></i>لیست مدیران</a>
                    </li>
                    
                </ul>
            </li>
            <!-- <li class="menu-label">عناصر رابط کاربری</li> -->
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="menu-title">مشتریان</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/members/members_list.php"><i class="bi bi-circle"></i>لیست مشتریان</a>
                    </li>
                    <li> <a href="../admin-panel/wishlist/wishlists_list.php"><i class="bi bi-circle"></i>لیست علاقه مندی ها</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">محصولات</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/products/products_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی محصولات</a>
                    </li>
                    <li> <a href="../admin-panel/products/product_images_list.php"><i class="bi bi-circle"></i>لیست تصاویر محصولات</a>
                    </li>
                    <li> <a href="../admin-panel/products/products_list.php"><i class="bi bi-circle"></i>لیست محصولات</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">خصوصیات محصول</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/brands/brands_list.php"><i class="bi bi-circle"></i>لیست برندها</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-award-fill"></i>
                    </div>
                    <div class="menu-title">بلاگ ها</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/blogs/blogs_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی بلاگ</a>
                    <li> <a href="../admin-panel/blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست بلاگ</a>
                    </li>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">سفارشات و سبدخرید</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/orders/orders_list.php"><i class="bi bi-circle"></i>لیست سفارشات</a>
                    </li>
                    <li> <a href="../admin-panel/baskets/baskets_list.php"><i class="bi bi-circle"></i>لیست سبدخرید</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">تبلیغات</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/ads/ads_list.php"><i class="bi bi-circle"></i>لیست تبلیغات</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">شهر و استان</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست استان ها</a>
                    </li>
                    <li> <a href="../admin-panel/cities/citys_list.php"><i class="bi bi-circle"></i>لیست شهرها</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">نظرات و پیام ها</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/contacts/contacts_list.php"><i class="bi bi-circle"></i>لیست پیام ها</a>
                    </li>
                    <li> <a href="../admin-panel/comments/comments_list.php"><i class="bi bi-circle"></i>لیست نظرات</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">سوالات متداول</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/FAQs/faqs_list.php"><i class="bi bi-circle"></i>لیست سوالات</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">مدیریت صفحه</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/pages/pages_list.php"><i class="bi bi-circle"></i>لیست صفحات</a>
                    </li>
                    <li> <a href="../admin-panel/teams/teams_list.php"><i class="bi bi-circle"></i>لیست تیم ما</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">روش های ارسال و پرداخت</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/shipping/shippingtypes_list.php"><i class="bi bi-circle"></i>لیست روش ارسال</a>
                    </li>
                    <li> <a href="../admin-panel/payment/payments_type.php"><i class="bi bi-circle"></i>لیست روش پرداخت</a>
                    </li>
                    <li> <a href="../admin-panel/payment/payments.php"><i class="bi bi-circle"></i>لیست پرداخت ها</a>
                    </li>
                </ul>
            </li>



            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">تنظیمات</div>
                </a>
                <ul>
                    <li> <a href="../admin-panel/settings/setting_update.php?id=1"><i class="bi bi-circle"></i>تنظیمات صفحه</a>
                    </li>
                    <li> <a href="../admin-panel/slideshow/slideshows_list.php"><i class="bi bi-circle"></i>لیست اسلایدشو</a>
                    </li>
                    <li> <a href="../admin-panel/counters/counters_list.php"><i class="bi bi-circle"></i>لیست آمار بازدید</a>
                    </li>
                </ul>
            </li>

        </ul>
        <!--end navigation-->
    </aside>
        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">صفحات</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">خطای 404</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="error-404 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="card py-5">
                        <div class="row g-0">
                            <div class="col col-xl-5 text-center">
                                <div class="card-body p-4">
                                    <h1 class="display-1"><span class="text-danger">4</span><span
                                            class="text-primary">0</span><span class="text-success">4</span></h1>
                                    <h2 class="font-weight-bold display-4">گمشده در فضا</h2>
                                    <p>تو به لبه ی هستی رسیده ای.
                                        <br>صفحه مورد نظر شما یافت نشد.
                                        <br>نگران نباشید و به صفحه قبل برگردید.
                                    </p>
                                    <div class="mt-5"> <a href="../admin-panel/index.php"
                                            class="btn btn-primary btn-lg px-md-5 radius-30">صفحه اصلی</a>
                                        <?php $prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../admin-panel/index.php' ?>
                                        <a href="javascript:;" onclick="location.href='<?= $prev_url ?>'"
                                            class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">بازگشت</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <img src="../assets/images/error/404-error.png" class="img-fluid" alt="">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->
        <?php require_once('../layout/footer.php'); ?>

    </div>
    <!--end wrapper-->


    <?php require_once('../layout/js.php'); ?>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/pages-errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

</html>