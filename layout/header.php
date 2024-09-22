<?php

$profile = $db->where('id', $_SESSION['user'])->getOne('admin');

?>

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
                <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown"><img src="../../assets/images/county/02.png" width="22" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/01.png" width="20" alt=""><span
                                    class="ms-2">انگلیسی</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/02.png" width="20" alt=""><span
                                    class="ms-2">کاتالان</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/03.png" width="20" alt=""><span
                                    class="ms-2">فرانسوی</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/04.png" width="20" alt=""><span
                                    class="ms-2">بلیز</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/05.png" width="20" alt=""><span
                                    class="ms-2">کلمبیا</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/06.png" width="20" alt=""><span
                                    class="ms-2">اسپانیایی</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/07.png" width="20" alt=""><span
                                    class="ms-2">گرجی</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="../../assets/images/county/08.png" width="20" alt=""><span
                                    class="ms-2">هندی</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dark-mode d-none d-sm-flex">
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
                                <a href="ecommerce-orders.html">
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
                                <a href="ecommerce-products-grid.html">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                                            <i class="bi bi-trophy-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">محصولات</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="component-media-object.html">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                                            <i class="bi bi-collection-play-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">رسانه ها</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="pages-user-profile.html">
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
                                <a href="ecommerce-orders-detail.html">
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
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" id="notifLink" href="#" data-bs-toggle="dropdown">
                        <div class="messages">
                            <?php 
                            $notification = $db->where('is_read', 0)
                            ->getValue('comment', 'COUNT(id)');
                            ?>
                            <span class="notify-badge"><?= $notification ?></span>
                            <i class="bi bi-chat-left-text-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0" id="notifDiv" dat  a-bs-popper="static">
                        <div class="p-2 border-bottom m-2">
                            <h5 class="h5 mb-0">پیام ها</h5>
                        </div>
                        <div class="header-message-list p-2">
                            <?php 
                            $db->pageLimit = 6;
                            $comments = $db->where('is_read', 0)
                            ->join('members', 'members.id = comment.member_id', 'LEFT')
                            ->orderBy('setdate', 'DESC')
                            ->paginate('comment', 1, "comment.id, CONCAT(members.fname, ' ', members.lname) AS name, members.image,subject, comment.setdate, comment.status");
                            
                            if(count($comments) == 0){ ?>
                                    <h6 class="text-center">داده ایی برای نمایش وجود ندارد</h6>
                            <?php }else{
                            foreach($comments as $comment){
                            ?>
                            <a class="dropdown-item" href="../comments/comment_detail.php?id=<?= $comment['id'] ?>">
                                <div class="d-flex align-items-center">
                                    <img src="../../<?= isset($comment['image'])?$comment['image']:"assets/images/admin/placeholder.png" ?>" alt="" class="rounded-circle"
                                        width="50" height="50">
                                    <div class="ms-3 flex-grow-1 fw-bold">
                                        <h6 class="mb-0 dropdown-msg-user fw-bold"><?= $comment['name'] ?><span
                                                class="msg-time float-end fw-bold">
                                                <?= jdate('Y/m/d', strtotime($comment['setdate'])) ?>
                                            </span></h6>
                                        <small
                                            class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"><?= $comment['subject'] ?></small>
                                    </div>
                                </div>
                            </a>
                            <?php } 
                            }
                            ?>
                        </div>
                        <div class="p-2">
                            <div>
                                <hr class="dropdown-divider">
                            </div>
                            <a class="dropdown-item <?= count($comments) == 0?"disabled":"" ?>" href="<?= count($comments) != 0?"../comments/comments_list.php?comment=1":"" ?>">
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
                                    <div class="notification-box bg-light-primary text-primary"><i
                                            class="bi bi-basket2-fill"></i></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6 class="mb-0 dropdown-msg-user">سفارشات جدید <span
                                                class="msg-time float-end text-secondary">1 دقیقه</span></h6>
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
                                                class="msg-time float-end text-secondary">7 دقیقه</span></h6>
                                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5
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
                                                class="msg-time float-end text-secondary">1 دقیقه</span></h6>
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
                                                class="msg-time float-end text-secondary">7 دقیقه</span></h6>
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
                                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">4
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
            <a class="dropdown-toggle dropdown-toggle-nocaret" id="headerDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                <div class="user-setting d-flex align-items-center gap-3">
                <img src="../../<?= empty($profile['image']) ? 'assets/images/admin/default.jpg' : $profile['image']  ?>" alt="" class="user-img" >                
                    <div class="d-none d-sm-block">
                        <p class="user-name mb-0"><?= $profile['first_name'] . ' ' . $profile['last_name'] ?></p>
                        <small class="mb-0 dropdown-user-designation"><?= admin_role($profile['role']) ?></small>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end myShow-menu " data-bs-popper="static">
                <li>
                    <a class="dropdown-item" href="../admins/profile_edit.php">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-person-fill"></i></div>
                            <div class="ms-3"><span>مشخصات</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="../admins/profile_reset_password.php">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-gear-fill"></i></div>
                            <div class="ms-3"><span>تغییر رمز عبور</span></div>
                        </div>
                    </a>
                </li>
                <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="../../auth/logout.php" name="logout">
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