<aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
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
            <?php if(has_access('admin_list.php')){ ?>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                    </div>
                    <div class="menu-title">مدیران</div>
                </a>
                <ul>
                    <li> <a href="../admins/admins_list.php"><i class="bi bi-circle"></i>لیست مدیران</a>
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
                    <li> <a href="../members/members_list.php"><i class="bi bi-circle"></i>لیست مشتریان</a>
                    </li>
                    <?php } 
                    
                    if(has_access('wishlists_list.php')){
                    ?>
                    <li> <a href="../wishlist/wishlists_list.php"><i class="bi bi-circle"></i>لیست علاقه مندی ها</a>
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
                    <li> <a href="../products/products_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی محصولات</a>
                    </li>
                    <?php } 
                    if(has_access('product_images_list.php')){
                    ?>
                    <li> <a href="../products/product_images_list.php"><i class="bi bi-circle"></i>لیست تصاویر محصولات</a>
                    </li>
                    <?php } 
                    if(has_access('products_list.php')){
                    ?>
                    <li> <a href="../products/products_list.php"><i class="bi bi-circle"></i>لیست محصولات</a>
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
                    <li> <a href="../brands/brands_list.php"><i class="bi bi-circle"></i>لیست برندها</a>
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
                    <li> <a href="../blogs/blogs_categories_list.php"><i class="bi bi-circle"></i>لیست دسته بندی بلاگ</a>
                    <?php } 
                    if(has_access('blogs_list.php')){
                    ?>
                    <li> <a href="../blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست بلاگ</a>
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
                    <li> <a href="../orders/orders_list.php"><i class="bi bi-circle"></i>لیست سفارشات</a>
                    </li>
                    <?php }
                    if(has_access('baskets_list.php')){
                    ?>
                    <li> <a href="../baskets/baskets_list.php"><i class="bi bi-circle"></i>لیست سبدخرید</a>
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
                    <li> <a href="../ads/ads_list.php"><i class="bi bi-circle"></i>لیست تبلیغات</a>
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
                    <li> <a href="../provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست استان ها</a>
                    </li>
                    <?php }
                    if(has_access('citys_list.php')){
                    ?>
                    <li> <a href="../cities/citys_list.php"><i class="bi bi-circle"></i>لیست شهرها</a>
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
                    <li> <a href="../contacts/contacts_list.php"><i class="bi bi-circle"></i>لیست پیام ها</a>
                    </li>
                    <?php }
                    if(has_access('comments_list.php')){
                    ?>
                    <li> <a href="../comments/comments_list.php"><i class="bi bi-circle"></i>لیست نظرات</a>
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
                    <li> <a href="../FAQs/faqs_list.php"><i class="bi bi-circle"></i>لیست سوالات</a>
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
                    <li> <a href="../pages/pages_list.php"><i class="bi bi-circle"></i>لیست صفحات</a>
                    </li>
                    <?php }
                    if(has_access('teams_list.php')){
                    ?>
                    <li> <a href="../teams/teams_list.php"><i class="bi bi-circle"></i>لیست تیم ما</a>
                    </li>
                    <?php }
                    if(has_access('slideshows_list.php')){
                    ?>
                    <li> <a href="../slideshow/slideshows_list.php"><i class="bi bi-circle"></i>لیست اسلایدشو</a>
                    </li>
                    <?php }
                    if(has_access('counters_list.php')){
                    ?>
                    <li> <a href="../counters/counters_list.php"><i class="bi bi-circle"></i>لیست آمار بازدید</a>
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
                    <li> <a href="../shipping/shippingtypes_list.php"><i class="bi bi-circle"></i>لیست روش ارسال</a>
                    </li>
                    <?php }
                    if(has_access('payments_type.php')){
                    ?>
                    <li> <a href="../payment/payments_type.php"><i class="bi bi-circle"></i>لیست روش پرداخت</a>
                    </li>
                    <?php }
                    if(has_access('payments.php')){
                    ?>
                    <li> <a href="../payment/payments.php"><i class="bi bi-circle"></i>لیست پرداخت ها</a>
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
                    <li> <a href="../settings/setting_update.php?id=1"><i class="bi bi-circle"></i>تنظیمات صفحه</a>
                    </li>
                </ul>
            </li>
            
            <?php } ?>
        </ul>
        <!--end navigation-->
    </aside>