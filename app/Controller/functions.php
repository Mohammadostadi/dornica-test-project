<?php
function securityCheck($data)
{
    return htmlspecialchars(trim($data));
}


function checkExist($data)
{
    return isset($_REQUEST[$data]) ? securityCheck($_REQUEST[$data]) : "";
}



function showDate($data)
{
    return jdate('Y/m/d - h:i', strtotime($data));
}


function status($type, $value)
{
    if ($type == 'active') {
        switch ($value) {
            case 0: ?>
                <span class="badge rounded-pill bg-danger">غیر فعال</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-success">فعال</span>
                <?php break;
        }
    } elseif ($type == 'read') {
        switch ($value) {
            case 0: ?>
                <span class="badge rounded-pill bg-warning">جهت بررسی</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-success">خوانده شده</span>
                <?php break;
            case 2: ?>
                <span class="badge rounded-pill bg-danger">خوانده نشده</span>
                <?php break;
        }
    }
}

function redirect($name, $ok = false)
{
    $check = $ok == false ? '' : "?ok=$ok";
    return header("Location:$name$check");
}


function sortTable($tableName)
{
    global $db;
    $sort = $db->getValue($tableName, 'MAX(sort)');
    return empty($sort) ? 1 : $sort + 1;
}


function checkUpdate($value, $data)
{
    return checkExist($value) == '' ? $data : checkExist($value);
}


function showMessage($value)
{ ?>
    <?php if ($value == 4) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد با موفقیت اضافه شد</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 1) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد حذف گردید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 2) { ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">
            <strong>فیلد با موفقیت آپدیت گردید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 3) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>شما با موفقیت وارد شدید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 5) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>نام کاربری یا رمز عبور اشتباه است</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 6) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>شما اجازه دسترسی به پنل ندارید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 7) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>اجازه دسترسی ندارید لطفا وارد شوید!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 8) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>رمز عبور شما با موفقیت تغییر کرد</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($value == 9) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>اجازه دسترسی برای استفاده را ندارید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }  elseif ($value == 10) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>بازه تاریخ داده شده اشتباه میباشد</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }   elseif ($value == 11) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>لطفا بازه تاریخ را مشخص کنید</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
<?php } ?>

<?php
function separator($id)
{
    ?>
    <script>
        $(document).ready(function () {
            $('<?= $id ?>').number(true, 0);
        }); 
    </script>
    <?php
}

function pageLimit($tableName, $limit, $soft = true, $condition = null)
{
    global $db;
    global $page;
    global $pages;
    if (isset($_GET['page'])) {
        $page = securityCheck($_GET['page']);
        if (is_numeric($page) != 1 or $page < 0) {
            redirect('../../error/error-404.php');
        }
        // if($page > $pages or $page < 0 ){
        //     redirect('../error/error-404.php');
        // }
    }
    $db->pageLimit = $limit;
    if (!empty($condition)) {
        if (!empty($condition)) {
            if (gettype($condition) == 'array') {
                foreach ($condition as $conn) {
                    if (!empty($conn)) {
                        $db->where($conn);
                    }
                }
            } else {
                $db->where($condition);
            }
        }
    }
    $total = $soft ? $db->where("$tableName.deleted_at IS NULL")->getvalue($tableName, 'COUNT(*)') : $db->getvalue($tableName, 'COUNT(*)');
    $pages = ceil($total / $db->pageLimit);

}
function pagination($page, $pages)
{
    if ($page > 0) {
        $queryPrams = $_GET;
        unset($queryPrams['page']);
        $queryString = http_build_query($queryPrams);
    }
    if ($pages == 0) { ?>
        <div class="d-flex justify-content-center align-items-center">
            <p class="text-center py-2 opacity-75 rounded w-75">داده ای یافت نشد</p>
        </div>
    <?php } else { ?>
        <nav class="float-end mt-0" aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= '?page=1' . ($queryString ? '&' . $queryString : "") ?>">اول</a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $page > 1 ? '?page=' . ($page - 1) . ($queryString ? '&' . $queryString : "") : '' ?>">قبلی</a>
                    </li>
                <?php } ?>

                <li class="page-item active" disabled><a class="page-link">صفحه <?= $page ?> از <?= $pages ?></a></li>

                <?php if ($page < $pages) { ?>
                    <li class="page-item"><a class="page-link" <?= ($page >= $pages) ? 'disabled' : '' ?>
                            href="<?= $page < $pages ? '?page=' . ($page + 1) . ($queryString ? '&' . $queryString : "") : '' ?>">بعد</a>
                    </li>
                    <li class="page-item"><a class="page-link"
                            href="<?= '?page=' . $pages . ($queryString ? '&' . $queryString : "") ?>">آخر</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php
    }
}



function applyFilters($db, $filters)
{
    if (!isset($_SESSION['filters'])) {
        $_SESSION['filters'] = [];
    }

    if (isset($_POST['filtered'])) {
        $newFilters = [];

        foreach ($filters as $field => $type) {
            if (isset($_POST[$field]) && $_POST[$field] != '') {
                if ($type === 'like') {
                    $newFilters[] = "$field LIKE '%" . $_POST[$field] . "%'";
                } elseif ($type === '=') {
                    $newFilters[] = "$field = '" . $_POST[$field] . "'";
                }
            }
        }

        $_SESSION['filters'] = $newFilters;
    }

    $condition = [];
    if (isset($_SESSION['filters']) && count($_SESSION['filters']) > 0) {
        $condition = $_SESSION['filters'];
    }

    if (!empty($condition)) {
        foreach ($condition as $cond) {
            $db->where($cond);
        }
    }
}



function changeDate($setdate, $type = true)
{
    list($year, $month, $day) = explode("/", $setdate);
    if ($type) {
        $adaptor_date = jalali_to_gregorian($year, $month, $day);
    } else {
        $adaptor_date = gregorian_to_jalali($year, $month, $day);
    }
    $date = implode('/', $adaptor_date);
    $sec = strtotime($date);
    return date('Y/m/d', $sec);

}

function sortInTable($prefix, $loc, $get)
{
    global $sortField;
    global $sortOrder;
    if (isset($_GET['sort'])) {
        $new_sort = $_GET['sort'];

        if ($sortField == $new_sort) {
            $sortOrder = $sortOrder == 'ASC' ? 'DESC' : 'ASC';
        }
        $_SESSION[$prefix . '_sort_field'] = $new_sort;
        $_SESSION[$prefix . '_sort_order'] = $sortOrder;
        $page = isset($_GET[$get]) ? "?$get=" . $_GET[$get] : '';
        header('Location:' . $loc . '.php' . $page);
    }
}
function sortActive($data)
{
    global $prefix;
    return (isset($_SESSION[$prefix . '_sort_field']) and $_SESSION[$prefix . '_sort_field'] == $data) ? "active" : "";
}

function sort_link($field)
{

    return isset($_GET['page']) ? "?page=" . $_GET['page'] . "&sort=$field" : '?sort=' . $field;

}

function admin_role($value)
{
    switch ($value) {
        case 0:
            echo "مدیر";
            break;
        case 1:
            echo "ادمین";
            break;
        case 2:
            echo "سوپر ادمین";
            break;
        case 3:
            echo "اپراتور";
            break;

    }

}


function access($type, $after = '', $name = '')
{
    $urls = $_SERVER['PHP_SELF'];
    $urls = explode('/', $urls);
    $res = true;
    foreach ($urls as $url) {
        if ((!empty($url)) and ($url == 'admins_list.php')) {
            $res = false;
        }
    }

    if ($type == 'btn_listed') {
        if (($_SESSION['user_role']) != 3) {
            ?>
            <a class="btn btn-outline-secondary" href="<?= $after ?>.php">اضافه کردن داده جدید</a>
            <?php
        }
    }
    if ($type == 'actions') {
        if ($_SESSION['user_role'] != 3) {
            ?>
            <td>
                <?php
                if ((!$res)) {
                    if ((($_SESSION['user_role']) == 0) or (($_SESSION['user_role']) == 2 and ($name['role'] != 0 and $name['role'] != 2))) {
                        ?>
                        <a href="admins_edit.php? id=<?= ($name['id']) ?>" name="_update" class="text-warning" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i
                                class="bi bi-pencil-fill"></i></a>
                        <?php
                    }
                    if (($_SESSION['user_role']) == 0) {
                        ?>
                        <button class="open-confirm btn text-danger  p-0 " value="<?= $name['id'] ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="حذف" data-bs-original-title="حذف" aria-label="Delete"
                            style="cursor: pointer;"><i class="bi bi-trash-fill"></i></button>

                        <?php
                    }

                } elseif ((($_SESSION['user_role']) == 0) or (($_SESSION['user_role']) == 1) or (($_SESSION['user_role']) == 2)) {
                    global $result;
                    ?>
                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نمایش جزئیات"
                        data-bs-original-title="نمایش جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                    <a href="<?= $after ?>.php? id=<?= ($name['id']) ?>" class="text-warning" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i
                            class="bi bi-pencil-fill"></i></a>
                    <?php if ((($_SESSION['user_role']) != 1)) { ?>

                        <button
                            class="<?= (isset($result) and (empty($result) or $result)) ? 'disabled text-secondary' : ' open-confirm text-danger' ?>  btn border-0 p-0"
                            value="<?= $name['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="<?= (isset($result) and (empty($result) or $result)) ? ' قابل حذف نیست' : 'حذف'; ?>"
                            data-bs-original-title="حذف" aria-label="Delete" style="cursor: pointer;"><i
                                class="bi bi-trash-fill"></i></button>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        }
    }

}

function accessRedirect($loc)
{

    $urls = $_SERVER['PHP_SELF'];
    $urls = explode('/', $urls);
    $res = true;
    foreach ($urls as $url) {
        if ((!empty($url)) and ($url == 'admins_list.php')) {
            $res = false;
        }
    }
    if (!$res) {


        if (isset($_SESSION["user_role"]) and ($_SESSION["user_role"] == 1 or $_SESSION["user_role"] == 3)) {

            redirect($loc, 9);

        }
    } elseif (isset($_SESSION["user_role"]) and ($_SESSION["user_role"] == 3)) {
        redirect($loc, 9);
    }

}


function has_access($current_loc = '')
{
    if (empty($current_loc)) {
        $current_loc = $_SERVER['PHP_SELF'];
        $current_loc = basename($current_loc);
    }
    $permission = [

        1 => [
            'profile_edit.php',
            'profile_reset_password.php',
            'ads_list.php',
            'ads_add.php',
            'ads_update.php',
            'baskets_list.php',
            'blog_add.php',
            'blog_category_add.php',
            'blog_category_update.php',
            'blog_delete.php',
            'blog_update.php',
            'blogs_categories_list.php',
            'blogs_list.php',
            'brand_add.php',
            'brand_update.php',
            'brands_list.php',
            'city_add.php',
            'city_update.php',
            'citys_list.php',
            'comments_list.php',
            'comment_status_update',
            'contacts_list.php',
            'counters_list.php',
            'faq_add.php',
            'faq_update.php',
            'faqs_list.php',
            'member_add.php',
            'member_update.php',
            'members_list.php',
            'orders_list.php',
            'page_add.php',
            'page_update.php',
            'pages_list.php',
            'payment_type_add.php',
            'payment_type_update.php',
            'payment_type.php',
            'payments.php',
            'product_add.php',
            'product_update.php',
            'products_list.php',
            'product_category_add.php',
            'product_category_delete.php',
            'product_image_add',
            'product_image_delete',
            'products_categories_list.php',
            'product_image_update',
            'product_images_list.php',
            'province_add.php',
            'province_update',
            'provinces_list.php',
            'shippingtype_add.php',
            'shippingtype_update.php',
            'shippingtypes_list.php',
            'slideshow_add.php',
            'slideshow_update.php',
            'slideshows_list.php',
            'team_add.php',
            'team_update.php',
            'teams_list.php',
            'wishlists_list.php'
        ],
        2 => [
            'admins_list.php',
            'admin_update.php',
            'admins_list.php',
            'admin_delete.php',
            'profile_edit.php',
            'profile_reset_password.php',
            'ads_list.php',
            'ads_add.php',
            'ads_update.php',
            'ads_delete.php',
            'baskets_list.php',
            'blog_add.php',
            'blog_category_add.php',
            'blog_category_delete.php',
            'blog_category_update.php',
            'blog_delete.php',
            'blog_update.php',
            'blogs_categories_list.php',
            'blogs_list.php',
            'brand_add.php',
            'brand_delete.php',
            'brand_update.php',
            'brands_list.php',
            'city_add.php',
            'city_delete.php',
            'city_update.php',
            'citys_list.php',
            'comments_list.php',
            'comment_status_update',
            'contacts_list.php',
            'counters_list.php',
            'faq_add.php',
            'faq_delete.php',
            'faq_update.php',
            'faqs_list.php',
            'member_add.php',
            'member_delete.php',
            'member_update.php',
            'members_list.php',
            'orders_list.php',
            'page_add.php',
            'page_delete.php',
            'page_update.php',
            'pages_list.php',
            'payment_type_add.php',
            'payment_type_delete.php',
            'payment_type_update.php',
            'payment_type.php',
            'payments.php',
            'product_add.php',
            'product_delete.php',
            'product_update.php',
            'products_list.php',
            'product_category_add.php',
            'product_category_delete',
            'product_category_delete.php',
            'products_categories_list.php',
            'product_image_add',
            'product_image_delete',
            'product_image_update',
            'product_images_list.php',
            'province_add.php',
            'province_delete.php',
            'province_update.phppa',
            'provinces_list.php',
            'setting_update.php',
            'shippingtype_add.php',
            'shippingtypr_delete.php',
            'shippingtype_update.php',
            'shippingtypes_list.php',
            'slideshow_add.php',
            'slideshow_delete.php',
            'slideshow_update.php',
            'slideshows_list.php',
            'team_add.php',
            'team_delete.php',
            'team_update.php',
            'teams_list.php',
            'wishlists_list.php'
        ],
        3 => [
            'profile_edit.php',
            'profile_reset_password.php',
            'ads_list.php',
            'baskets_list.php',
            'blogs_list.php',
            'brands_list.php',
            'citys_list.php',
            'comments_list.php',
            'contacts_list.php',
            'counters_list.php',
            'members_list.php',
            'orders_list.php',
            'payments.php',
            'products_list.php',
            'products_categories_list.php',
            'product_images_list.php',
            'provinces_list.php',
        ]
    ];
    if ((isset($permission[$_SESSION['user_role']]) and (in_array($current_loc, $permission[$_SESSION['user_role']]))) or $_SESSION['user_role'] == 0) {
        return true;
    }
    return false;
}




function reportCheck($db, $table, $data)
{

    if (isset($_POST['report'])) {
        foreach ($data as $field => $type) {
            if ($type == 'date') {
                list($start_date, $end_date, $field) = explode('/', $field);
                if ((isset($_POST[$start_date]) && ($_POST[$start_date] != '')) or (isset($_POST[$end_date]) && ($_POST[$end_date] != ''))) {
                    $newFilters = "DATE" . "(" . $table . '.' . $field . ")" . " BETWEEN " . '"' . changeDate($_POST[$start_date]) . '"' . " AND " . '"' . changeDate($_POST[$end_date]) . '"';
                    $db->where($newFilters);
                }
                continue;
            }
            if ((isset($_POST[$field]) && ($_POST[$field] != ''))) {
                if ($type === 'like') {
                    $newFilters = $table . "." . $field . " LIKE '%" . securityCheck($_POST[$field]) . "%'";
                    $db->where($newFilters);
                } elseif ($type === '=') {
                    $newFilters = $table . "." . $field . " = '" . securityCheck($_POST[$field]) . "'";
                    $db->where($newFilters);
                } elseif ($type === 'find_in_set') {
                    $data = securityCheck($_POST[$field]);
                    $newFilters = "find_in_set( '$data', $field)";
                    $db->where($newFilters);
                } elseif ($type === 'in') {
                    if (!in_array(0 ,$_POST[$field]) and !in_array('' ,$_POST[$field])) {
                        $data = implode(',', $_POST[$field]);
                        $newFilters = $table.".".$field." IN ($data)";
                        $db->where($newFilters);
                    }
                } elseif ($type === 'price') {
                    $data = intval(str_replace(',', '', securityCheck($_POST[$field])));
                    $newFilters = $table . "." . $field . " = '" . $data . "'";
                    $db->where($newFilters);
                }

            }
        }
    }

}