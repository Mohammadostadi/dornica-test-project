<?php
session_start();
require_once('../app/Model/DB.php');
require_once('../app/Controller/functions.php');
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="../assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/bootstrap-icons.css">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="../assets/css/dark-theme.css" rel="stylesheet" />
    <link href="../assets/css/light-theme.css" rel="stylesheet" />
    <link href="../assets/css/semi-dark.css" rel="stylesheet" />
    <link href="../assets/css/header-colors.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="wrapper">

        <!--start content-->
        <main class="page-content">
            <header class="top-header">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                        <i class="bi bi-list"></i>
                    </div>
                    <form class="searchbar">
                        <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                                class="bi bi-search"></i></div>
                        <input class="form-control" type="text" placeholder="برای جستجو اینجا تایپ کنید">
                        <div class="position-absolute top-50 translate-middle-y search-close-icon"><i
                                class="bi bi-x-lg"></i></div>
                    </form>
                    <div class="top-navbar-right ms-auto">
                        <ul class="navbar-nav align-items-center gap-1">
                            <li class="nav-item search-toggle-icon d-flex d-lg-none">
                                <a class="nav-link" href="javascript:;">
                                    <div class="">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-laungauge   d-sm-flex">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                    data-bs-toggle="dropdown"><img src="../../assets/images/county/02.png" width="22"
                                        alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-2">
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/01.png" width="20" alt=""><span
                                                class="ms-2">انگلیسی</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/02.png" width="20" alt=""><span
                                                class="ms-2">کاتالان</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/03.png" width="20" alt=""><span
                                                class="ms-2">فرانسوی</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/04.png" width="20" alt=""><span
                                                class="ms-2">بلیز</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/05.png" width="20" alt=""><span
                                                class="ms-2">کلمبیا</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/06.png" width="20" alt=""><span
                                                class="ms-2">اسپانیایی</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../assets/images/county/07.png" width="20" alt=""><span
                                                class="ms-2">گرجی</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                                src="../../assets/images/county/08.png" width="20" alt=""><span
                                                class="ms-2">هندی</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dark-mode   d-sm-flex">
                                <a class="nav-link dark-mode-icon" href="javascript:;">
                                    <div class="">
                                        <i class="bi bi-moon-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="projects">
                                        <i class="bi bi-grid-3x3-gap-fill"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="row row-cols-3 gx-2">
                                        <div class="col">
                                            <a href="ecommerce-orders.php">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                                                        <i class="bi bi-basket2-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">سفارشات</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">کاربران</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="ecommerce-products-grid.php">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                                                        <i class="bi bi-trophy-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">محصولات</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="component-media-object.php">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                                                        <i class="bi bi-collection-play-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">رسانه ها</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="pages-user-profile.php">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-warning">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">حساب</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-voilet">
                                                        <i class="bi bi-file-earmark-text-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">اسناد</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="ecommerce-orders-detail.php">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-branding">
                                                        <i class="bi bi-credit-card-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">پرداخت</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-desert">
                                                        <i class="bi bi-calendar-check-fill"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">مناسبت ها</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="apps p-2 radius-10 text-center">
                                                    <div class="apps-icon-box mb-1 text-white bg-gradient-amour">
                                                        <i class="bi bi-book-half"></i>
                                                    </div>
                                                    <p class="mb-0 apps-name">داستان</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="messages">
                                        <span class="notify-badge">5</span>
                                        <i class="bi bi-chat-left-text-fill"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="p-2 border-bottom m-2">
                                        <h5 class="h5 mb-0">پیام ها</h5>
                                    </div>
                                    <div class="header-message-list p-2">
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-1.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">آملیو جولی <span
                                                            class="msg-time float-end text-secondary">1 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-2.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">آلته کاباردو <span
                                                            class="msg-time float-end text-secondary">7 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-3.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">کاترین پچون <span
                                                            class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-4.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">پیتر کوستانزو <span
                                                            class="msg-time float-end text-secondary">3 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-5.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">توماس ویلر <span
                                                            class="msg-time float-end text-secondary">1 روز</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-6.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">جانی سیتز <span
                                                            class="msg-time float-end text-secondary">2 ماه</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-1.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">آملیو جولی <span
                                                            class="msg-time float-end text-secondary">1 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-2.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">آلته کاباردو <span
                                                            class="msg-time float-end text-secondary">7 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/avatars/avatar-3.png" alt=""
                                                    class="rounded-circle" width="50" height="50">
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">کاترین پچون <span
                                                            class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم
                                                        ایپسوم...</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <div>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <a class="dropdown-item" href="#">
                                            <div class="text-center">مشاهده همه پیام ها</div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="notifications">
                                        <span class="notify-badge">8</span>
                                        <i class="bi bi-bell-fill"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="p-2 border-bottom m-2">
                                        <h5 class="h5 mb-0">اطلاعیه</h5>
                                    </div>
                                    <div class="header-notifications-list p-2">
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-primary text-primary"><i
                                                        class="bi bi-basket2-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">سفارشات جدید <span
                                                            class="msg-time float-end text-secondary">1 دقیقه</span>
                                                    </h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">شما
                                                        سفارشات جدیدی دریافت کرده اید</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-purple text-purple"><i
                                                        class="bi bi-people-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">مشتریان جدید <span
                                                            class="msg-time float-end text-secondary">7 دقیقه</span>
                                                    </h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5
                                                        کاربر جدید ثبت نام کرد</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-success text-success"><i
                                                        class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">24 فایل پی دی اف <span
                                                            class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">فایل
                                                        های پی دی اف تولید شده است</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-orange text-orange"><i
                                                        class="bi bi-collection-play-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">پاسخ زمان <span
                                                            class="msg-time float-end text-secondary">3 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">پاسخ
                                                        زمان متوسط 5.1 دقیقه</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-info text-info"><i
                                                        class="bi bi-cursor-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">محصول جدید تایید شده <span
                                                            class="msg-time float-end text-secondary">1 د</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">محصول
                                                        جدید شما تایید شده است</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-pink text-pink"><i
                                                        class="bi bi-gift-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">نظرات جدید <span
                                                            class="msg-time float-end text-secondary">2 ماه</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">نظرات
                                                        مشتریان جدید دریافت شد</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-warning text-warning"><i
                                                        class="bi bi-droplet-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">24 نویسنده جدید<span
                                                            class="msg-time float-end text-secondary">1 دقیقه</span>
                                                    </h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24
                                                        نویسنده جدید هفته گذشته به آن پیوستند</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-primary text-primary"><i
                                                        class="bi bi-mic-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">کالای شما ارسال شده است <span
                                                            class="msg-time float-end text-secondary">7 دقیقه</span>
                                                    </h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">مورد
                                                        شما با موفقیت ارسال شد</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-success text-success"><i
                                                        class="bi bi-lightbulb-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">هشدارهای دفاعی <span
                                                            class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45٪
                                                        هشدار کدقیقه 4 هفته طول می کشد</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-info text-info"><i
                                                        class="bi bi-bookmark-heart-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">4 ثبت نام جدید <span
                                                            class="msg-time float-end text-secondary">2 ماه</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">4
                                                        کاربر جدید ثبت نام</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notification-box bg-light-bronze text-bronze"><i
                                                        class="bi bi-briefcase-fill"></i></div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-0 dropdown-msg-user">همه اسناد آپلود شد <span
                                                            class="msg-time float-end text-secondary">1 ماه</span></h6>
                                                    <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">همه
                                                        فایل‌ها را با دقت آپلود کرد</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <div>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <a class="dropdown-item" href="#">
                                            <div class="text-center">مشاهده همه اعلان ها</div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown dropdown-user-setting">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" id="headerDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <div class="user-setting d-flex align-items-center gap-3">
                                <?php
                                $image = $db->where('id', $_SESSION['user'])->getValue('admin', "image");
                                $name = $db->where('id', $_SESSION['user'])->getOne('admin', "CONCAT(first_name, ' ',last_name) AS name");
                                $role = $db->where('id', $_SESSION['user'])->getValue('admin', "role");
                                ?>
                                <img src="../<?= !empty($image) ? $image : "assets/images/admin/default.png" ?>"
                                    class="user-img" alt="">
                                <div class="  d-sm-block">
                                    <p class="user-name mb-0"><?= $name['name'] ?></p>
                                    <small class="mb-0 dropdown-user-designation"><?= admin_role($role) ?></small>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end myShow-menu" data-bs-popper="static">
                            <li>
                                <a class="dropdown-item" href="../admin-panel/admins/profile_edit.php">
                                    <div class="d-flex align-items-center">
                                        <div class=""><i class="bi bi-person-fill"></i></div>
                                        <div class="ms-3"><span>مشخصات</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../admin-panel/admins/profile_reset_password.php">
                                    <div class="d-flex align-items-center">
                                        <div class=""><i class="bi bi-gear-fill"></i></div>
                                        <div class="ms-3"><span>تغییر رمز عبور</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="../auth/logout.php">
                                    <div class="d-flex align-items-center">
                                        <div class=""><i class="bi bi-lock-fill"></i></div>
                                        <div class="ms-3"><span>خروج</span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
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
                        <a href="../index.php" class="">
                            <div class="parent-icon"><i class="bi bi-house-fill"></i>
                            </div>
                            <div class="menu-title">داشبورد</div>
                        </a>

                    </li>
                    <?php if (has_access('admins_list.php')) { ?>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                                </div>
                                <div class="menu-title">مدیران</div>
                            </a>
                            <ul>
                                <li> <a href="../admin-panel/admins/admins_list.php"><i class="bi bi-circle"></i>لیست
                                        مدیران</a>
                                </li>

                            </ul>
                        </li>
                    <?php }

                    if (has_access('members_list.php') or has_access('wishlists_list.php')) {
                        ?>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                                </div>
                                <div class="menu-title">مشتریان</div>
                            </a>
                            <ul>
                                <?php if (has_access('members_list.php')) { ?>
                                    <li> <a href="../admin-panel/members/members_list.php"><i class="bi bi-circle"></i>لیست
                                            مشتریان</a>
                                    </li>
                                <?php }

                                if (has_access('wishlists_list.php')) {
                                    ?>
                                    <li> <a href="../admin-panel/wishlist/wishlists_list.php"><i class="bi bi-circle"></i>لیست
                                            علاقه مندی ها</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }
                    if (has_access('products_categories_list.php') or has_access('product_images_list.php') or has_access('products_list.php')) {
                        ?>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                                </div>
                                <div class="menu-title">محصولات</div>
                            </a>
                            <ul>
                                <?php if (has_access('products_categories_list.php')) { ?>
                                    <li> <a href="products/products_categories_list.php"><i class="bi bi-circle"></i>لیست دسته
                                            بندی محصولات</a>
                                    </li>
                                <?php }
                                if (has_access('product_images_list.php')) {
                                    ?>
                                    <li> <a href="../admin-panel/products/product_images_list.php"><i
                                                class="bi bi-circle"></i>لیست تصاویر محصولات</a>
                                    </li>
                                <?php }
                                if (has_access('products_list.php')) {
                                    ?>
                                    <li> <a href="../admin-panel/products/products_list.php"><i class="bi bi-circle"></i>لیست
                                            محصولات</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }
                    if (has_access('brands_list.php')) {
                        ?>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                                </div>
                                <div class="menu-title">خصوصیات محصول</div>
                            </a>
                            <ul>
                                <li> <a href="../admin-panel/brands/brands_list.php"><i class="bi bi-circle"></i>لیست
                                        برندها</a>
                                </li>
                            </ul>
                        </li>
                    <?php }
                    if (has_access('blogs_categories_list.php') or has_access('blogs_list.php')) {
                        ?>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bi bi-award-fill"></i>
                                </div>
                                <div class="menu-title">بلاگ ها</div>
                            </a>
                            <ul>
                                <?php if (has_access('blogs_categories_list.php')) { ?>
                                    <li> <a href="blogs/blogs_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی
                                            بلاگ</a>
                                    <?php }
                                if (has_access('blogs_list.php')) {
                                    ?>
                                    <li> <a href="../admin-panel/blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست بلاگ</a>
                                    </li>
                                <?php } ?>
                        </li>

                    </ul>
                    </li>
                <?php }
                    if (has_access('orders_list.php') or has_access('baskets_list.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">سفارشات و سبدخرید</div>
                        </a>
                        <ul>
                            <?php if (has_access('orders_list.php')) { ?>
                                <li> <a href="../admin-panel/orders/orders_list.php"><i class="bi bi-circle"></i>لیست
                                        سفارشات</a>
                                </li>
                            <?php }
                            if (has_access('baskets_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/baskets/baskets_list.php"><i class="bi bi-circle"></i>لیست
                                        سبدخرید</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }
                    if (has_access('ads_list.php')) {
                        ?>
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
                <?php }
                    if (has_access('provinces_list.php') or has_access('citys_list.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">شهر و استان</div>
                        </a>
                        <ul>
                            <?php if (has_access('provinces_list.php')) { ?>
                                <li> <a href="../admin-panel/provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست
                                        استان ها</a>
                                </li>
                            <?php }
                            if (has_access('citys_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/cities/citys_list.php"><i class="bi bi-circle"></i>لیست شهرها</a>
                                </li>
                            <?php }

                            ?>
                        </ul>
                    </li>
                <?php }
                    if (has_access('contacts_list.php') or has_access('comments_list.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">نظرات و پیام ها</div>
                        </a>
                        <ul>
                            <?php if (has_access('contacts_list.php')) { ?>
                                <li> <a href="../admin-panel/contacts/contacts_list.php"><i class="bi bi-circle"></i>لیست پیام
                                        ها</a>
                                </li>
                            <?php }
                            if (has_access('comments_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/comments/comments_list.php"><i class="bi bi-circle"></i>لیست
                                        نظرات</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }
                    if (has_access('faqs_list.php')) {
                        ?>
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
                <?php }
                    if (has_access('pages_list.php') or has_access('teams_list.php') or has_access('slideshows_list.php') or has_access('counters_list.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">مدیریت صفحه</div>
                        </a>
                        <ul>
                            <?php if (has_access('pages_list.php')) { ?>
                                <li> <a href="../admin-panel/pages/pages_list.php"><i class="bi bi-circle"></i>لیست صفحات</a>
                                </li>
                            <?php }
                            if (has_access('teams_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/teams/teams_list.php"><i class="bi bi-circle"></i>لیست تیم ما</a>
                                </li>
                            <?php }
                            if (has_access('slideshows_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/slideshow/slideshows_list.php"><i class="bi bi-circle"></i>لیست
                                        اسلایدشو</a>
                                </li>
                            <?php }
                            if (has_access('counters_list.php')) {
                                ?>
                                <li> <a href="../admin-panel/counters/counters_list.php"><i class="bi bi-circle"></i>لیست آمار
                                        بازدید</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }
                    if (has_access('shippingtypes_list.php') or has_access('payments_list.php') or has_access('payments.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">روش های ارسال و پرداخت</div>
                        </a>
                        <ul>
                            <?php if (has_access('shippingtypes_list.php')) { ?>
                                <li> <a href="../admin-panel/shipping/shippingtypes_list.php"><i class="bi bi-circle"></i>لیست
                                        روش ارسال</a>
                                </li>
                            <?php }
                            if (has_access('payments_type.php')) {
                                ?>
                                <li> <a href="../admin-panel/payment/payments_type.php"><i class="bi bi-circle"></i>لیست روش
                                        پرداخت</a>
                                </li>
                            <?php }
                            if (has_access('payments.php')) {
                                ?>
                                <li> <a href="../admin-panel/payment/payments.php"><i class="bi bi-circle"></i>لیست پرداخت
                                        ها</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }
                    if (has_access('settings_update.php')) {
                        ?>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                            </div>
                            <div class="menu-title">تنظیمات</div>
                        </a>
                        <ul>
                            <li> <a href="../admin-panel/settings/setting_update.php?id=1"><i
                                        class="bi bi-circle"></i>تنظیمات صفحه</a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
                </ul>
                <!--end navigation-->
            </aside>
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">صفحات</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">خطای 403</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="error-404 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="card py-5">
                        <div class="row g-0">
                            <div class="col-xl-5">
                                <div class="card-body p-4">
                                    <h1 class="display-1"><span class="text-warning">4</span><span
                                            class="text-danger">0</span><span class="text-primary">3</span></h1>
                                    <h2 class="font-weight-bold display-4">با عرض پوزش، خطای غیرمنتظره</h2>
                                    <p>انگار گم شدی!
                                        <br>شاید شما به اینترنت متصل نیستید!
                                    </p>
                                    <div class="mt-5"> <a href="../admin-panel/index.php"
                                            class="btn btn-lg btn-primary px-md-5 radius-30">صفحه اصلی</a>
                                        <a href="javascript:;"
                                            class="btn btn-lg btn-outline-dark ms-3 px-md-5 radius-30">بازگشت</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <img src="../assets/images/error/403-error.png" class="img-fluid" alt="">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->

    </div>



    <!-- Bootstrap bundle JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/js/pace.min.js"></script>
    <!--app-->
    <script src="../assets/js/app.js"></script>

</body>

</html>