<?php require_once('../app/Controller/functions.php');
require_once('../app/Model/DB.php');
session_start();
if(!isset($_SESSION['user'])){
    redirect('../auth/sign-in.php', 7);
}

?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:52:57 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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

    <title>صفحه اصلی</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                <i class="bi bi-list"></i>
            </div>
            <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="برای جستجو اینجا تایپ کنید">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
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
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown"><img src="../assets/images/county/02.png" width="22" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2">
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/01.png" width="20" alt=""><span class="ms-2">انگلیسی</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/02.png" width="20" alt=""><span class="ms-2">کاتالان</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/03.png" width="20" alt=""><span class="ms-2">فرانسوی</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/04.png" width="20" alt=""><span class="ms-2">بلیز</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/05.png" width="20" alt=""><span class="ms-2">کلمبیا</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/06.png" width="20" alt=""><span class="ms-2">اسپانیایی</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/07.png" width="20" alt=""><span class="ms-2">گرجی</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="../assets/images/county/08.png" width="20" alt=""><span class="ms-2">هندی</span></a>
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
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
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
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
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
                                        <img src="../assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">آملیو جولی <span class="msg-time float-end text-secondary">1 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">آلته کاباردو <span class="msg-time float-end text-secondary">7 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">کاترین پچون <span class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-4.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">پیتر کوستانزو <span class="msg-time float-end text-secondary">3 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-5.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">توماس ویلر <span class="msg-time float-end text-secondary">1 روز</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-6.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">جانی سیتز <span class="msg-time float-end text-secondary">2 ماه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">آملیو جولی <span class="msg-time float-end text-secondary">1 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">آلته کاباردو <span class="msg-time float-end text-secondary">7 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <img src="../assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50" height="50">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">کاترین پچون <span class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">لورم ایپسوم...</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <div><hr class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <div class="text-center">مشاهده همه پیام ها</div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
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
                                        <div class="notification-box bg-light-primary text-primary"><i class="bi bi-basket2-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">سفارشات جدید <span class="msg-time float-end text-secondary">1 دقیقه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">شما سفارشات جدیدی دریافت کرده اید</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">مشتریان جدید <span class="msg-time float-end text-secondary">7 دقیقه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 کاربر جدید ثبت نام کرد</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-success text-success"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">24 فایل پی دی اف <span class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">فایل های پی دی اف تولید شده است</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-orange text-orange"><i class="bi bi-collection-play-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">پاسخ زمان  <span class="msg-time float-end text-secondary">3 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">پاسخ زمان متوسط 5.1 دقیقه</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-info text-info"><i class="bi bi-cursor-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">محصول جدید تایید شده  <span class="msg-time float-end text-secondary">1 د</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">محصول جدید شما تایید شده است</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-pink text-pink"><i class="bi bi-gift-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">نظرات جدید <span class="msg-time float-end text-secondary">2 ماه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">نظرات مشتریان جدید دریافت شد</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-warning text-warning"><i class="bi bi-droplet-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">24 نویسنده جدید<span class="msg-time float-end text-secondary">1 دقیقه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24 نویسنده جدید هفته گذشته به آن پیوستند</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-primary text-primary"><i class="bi bi-mic-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">کالای شما ارسال شده است <span class="msg-time float-end text-secondary">7 دقیقه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">مورد شما با موفقیت ارسال شد</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-success text-success"><i class="bi bi-lightbulb-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">هشدارهای دفاعی <span class="msg-time float-end text-secondary">2 ساعت</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45٪ هشدار کدقیقه 4 هفته طول می کشد</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-info text-info"><i class="bi bi-bookmark-heart-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">4 ثبت نام جدید <span class="msg-time float-end text-secondary">2 ماه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">4 کاربر جدید ثبت نام</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="notification-box bg-light-bronze text-bronze"><i class="bi bi-briefcase-fill"></i></div>
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0 dropdown-msg-user">همه اسناد آپلود شد <span class="msg-time float-end text-secondary">1 ماه</span></h6>
                                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">همه فایل‌ها را با دقت آپلود کرد</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <div><hr class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <div class="text-center">مشاهده همه اعلان ها</div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dropdown dropdown-user-setting">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                    <div class="user-setting d-flex align-items-center gap-3">
                            <?php
                                $name = $db->where('id', $_SESSION['user'])->getOne('admin', "CONCAT(first_name, ' ',last_name) AS name");
                                $role = $db->where('id', $_SESSION['user'])->getValue('admin', "role");
                                $image = $db->where('id', $_SESSION['user'])->getValue('admin', "image");
                            ?>
                        <img src="../../<?= !empty($image)?$image:"assets/images/admin/default.png" ?>" class="user-img" alt="">
                        <div class="  d-sm-block">
                            <p class="user-name mb-0"><?= ($name['name']) ?></p>
                            <small class="mb-0 dropdown-user-designation"><?= admin_role($role) ?></small>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" >
                    <li>
                        <a class="dropdown-item" href="admins/profile_edit.php">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-person-fill"></i></div>
                                <div class="ms-3"><span>مشخصات</span></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="admins/profile_reset_password.php">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-gear-fill"></i></div>
                                <div class="ms-3"><span>تغییر رمز عبور</span></div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
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
    <!--end top header-->

    <!--start sidebar -->
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
                <a href="index.php" class="">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i>
                    </div>
                    <div class="menu-title">داشبورد</div>
                </a>
                
            </li>
            <?php if(has_access('admin_list.php')){ ?>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                    </div>
                    <div class="menu-title">مدیران</div>
                </a>
                <ul>
                    <li> <a href="admins/admins_list.php"><i class="bi bi-circle"></i>لیست مدیران</a>
                    </li>
                    
                </ul>
            </li>
            <?php } 
            
            if(has_access('members_list.php') or has_access('wishlists_list.php')){
            ?>            
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="menu-title">مشتریان</div>
                </a>
                <ul>
                    <?php if(has_access('members_list.php')){ ?>
                    <li> <a href="members/members_list.php"><i class="bi bi-circle"></i>لیست مشتریان</a>
                    </li>
                    <?php } 
                    
                    if(has_access('wishlists_list.php')){
                    ?>
                    <li> <a href="wishlist/wishlists_list.php"><i class="bi bi-circle"></i>لیست علاقه مندی ها</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('products_categories_list.php') or has_access('product_images_list.php') or has_access('products_list.php')){
            ?>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">محصولات</div>
                </a>
                <ul>
                    <?php if(has_access('products_categories_list.php')){ ?>
                    <li> <a href="products/products_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی محصولات</a>
                    </li>
                    <?php } 
                    if(has_access('product_images_list.php')){
                    ?>
                    <li> <a href="products/product_images_list.php"><i class="bi bi-circle"></i>لیست تصاویر محصولات</a>
                    </li>
                    <?php } 
                    if(has_access('products_list.php')){
                    ?>
                    <li> <a href="products/products_list.php"><i class="bi bi-circle"></i>لیست محصولات</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('brands_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">خصوصیات محصول</div>
                </a>
                <ul>
                    <li> <a href="brands/brands_list.php"><i class="bi bi-circle"></i>لیست برندها</a>
                    </li>
                </ul>
            </li>
            <?php }
            if(has_access('blogs_categories_list.php') or has_access('blogs_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-award-fill"></i>
                    </div>
                    <div class="menu-title">بلاگ ها</div>
                </a>
                <ul>
                    <?php if(has_access('blogs_categories_list.php')){ ?>
                    <li> <a href="blogs/blogs_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی بلاگ</a>
                    <?php } 
                    if(has_access('blogs_list.php')){
                    ?>
                    <li> <a href="blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست بلاگ</a>
                    </li>
                    <?php } ?>
                    </li>
                    
                </ul>
            </li>
            <?php } 
            if(has_access('orders_list.php') or has_access('baskets_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">سفارشات و سبدخرید</div>
                </a>
                <ul>
                    <?php if(has_access('orders_list.php')){ ?>
                    <li> <a href="orders/orders_list.php"><i class="bi bi-circle"></i>لیست سفارشات</a>
                    </li>
                    <?php }
                    if(has_access('baskets_list.php')){
                    ?>
                    <li> <a href="baskets/baskets_list.php"><i class="bi bi-circle"></i>لیست سبدخرید</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('ads_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">تبلیغات</div>
                </a>
                <ul>
                    <li> <a href="ads/ads_list.php"><i class="bi bi-circle"></i>لیست تبلیغات</a>
                    </li>
                </ul>
            </li>
            <?php }
            if(has_access('provinces_list.php') or has_access('citys_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">شهر و استان</div>
                </a>
                <ul>
                    <?php if(has_access('provinces_list.php')){ ?>
                    <li> <a href="provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست استان ها</a>
                    </li>
                    <?php }
                    if(has_access('citys_list.php')){
                    ?>
                    <li> <a href="cities/citys_list.php"><i class="bi bi-circle"></i>لیست شهرها</a>
                    </li>
                    <?php }
                    
                    ?>
                </ul>
            </li>
            <?php } 
            if(has_access('contacts_list.php') or has_access('comments_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">نظرات و پیام ها</div>
                </a>
                <ul>
                    <?php if(has_access('contacts_list.php')){ ?>
                    <li> <a href="contacts/contacts_list.php"><i class="bi bi-circle"></i>لیست پیام ها</a>
                    </li>
                    <?php }
                    if(has_access('comments_list.php')){
                    ?>
                    <li> <a href="comments/comments_list.php"><i class="bi bi-circle"></i>لیست نظرات</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('faqs_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">سوالات متداول</div>
                </a>
                <ul>
                    <li> <a href="FAQs/faqs_list.php"><i class="bi bi-circle"></i>لیست سوالات</a>
                    </li>
                </ul>
            </li>
            <?php }
            if(has_access('pages_list.php') or has_access('teams_list.php') or has_access('slideshows_list.php') or has_access('counters_list.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">مدیریت صفحه</div>
                </a>
                <ul>
                    <?php if(has_access('pages_list.php')){ ?>
                    <li> <a href="pages/pages_list.php"><i class="bi bi-circle"></i>لیست صفحات</a>
                    </li>
                    <?php }
                    if(has_access('teams_list.php')){
                    ?>
                    <li> <a href="teams/teams_list.php"><i class="bi bi-circle"></i>لیست تیم ما</a>
                    </li>
                    <?php }
                    if(has_access('slideshows_list.php')){
                    ?>
                    <li> <a href="slideshow/slideshows_list.php"><i class="bi bi-circle"></i>لیست اسلایدشو</a>
                    </li>
                    <?php }
                    if(has_access('counters_list.php')){
                    ?>
                    <li> <a href="counters/counters_list.php"><i class="bi bi-circle"></i>لیست آمار بازدید</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('shippingtypes_list.php') or has_access('payments_list.php') or has_access('payments.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">روش های ارسال و پرداخت</div>
                </a>
                <ul>
                    <?php if(has_access('shippingtypes_list.php')){ ?>
                    <li> <a href="shipping/shippingtypes_list.php"><i class="bi bi-circle"></i>لیست روش ارسال</a>
                    </li>
                    <?php }
                    if(has_access('payments_type.php')){
                    ?>
                    <li> <a href="payment/payments_type.php"><i class="bi bi-circle"></i>لیست روش پرداخت</a>
                    </li>
                    <?php }
                    if(has_access('payments.php')){
                    ?>
                    <li> <a href="payment/payments.php"><i class="bi bi-circle"></i>لیست پرداخت ها</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } 
            if(has_access('settings_update.php')){
            ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                    </div>
                    <div class="menu-title">تنظیمات</div>
                </a>
                <ul>
                    <li> <a href="settings/setting_update.php?id=1"><i class="bi bi-circle"></i>تنظیمات صفحه</a>
                    </li>
                </ul>
            </li>
            
            <?php } ?>
        </ul>
        <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        <?php require_once('../layout/message.php'); ?>
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
                                                <img src="../assets/images/products/11.png" alt="">
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
                                                <img src="../assets/images/products/07.png" alt="">
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
                                                <img src="../assets/images/products/17.png" alt="">
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
                                                <img src="../assets/images/products/04.png" alt="">
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
                                                <img src="../assets/images/products/10.png" alt="">
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
                                                <img src="../assets/images/products/12.png" alt="">
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
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/js/pace.min.js"></script>
<script src="../assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="../assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<!--app-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/index3.js"></script>
<script>
    new PerfectScrollbar(".best-product")
</script>
<script>
    $(document).ready(function() {
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
});
    });
</script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:53:28 GMT -->
</html>