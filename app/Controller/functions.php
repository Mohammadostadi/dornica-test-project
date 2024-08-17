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
                <span class="badge rounded-pill bg-danger">جهت بررسی</span>
                <?php break;
            case 1: ?>
                <span class="badge rounded-pill bg-success">خوانده شده</span>
                <?php break;
            case 2: ?>
                <span class="badge rounded-pill bg-warning">خوانده نشده</span>
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
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>فیلد مورد نظر قابل حذف نیست</strong>
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
        // $page = 1;
        foreach ($condition as $cond) {
            if (!empty($cond)) {
                $db->where($cond);
            }
        }
    }
    $total = $soft ? $db->where("$tableName.deleted_at IS NULL")->getvalue($tableName, 'COUNT(*)') : $db->getvalue($tableName, 'COUNT(*)');
    $pages = ceil($total / $db->pageLimit);

}
function pagination($page, $pages)
{

    if ($pages == 0) { ?>
        <div class="d-flex justify-content-center align-items-center">
            <p class="text-center bg-secondary text-light py-2 opacity-75 rounded w-75">داده ای یافت نشد</p>
        </div>
    <?php } else { ?>
        <nav class="float-end mt-0" aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li class="page-item"><a class="page-link" href="<?= '?page=1' ?>">اول</a></li>
                    <li class="page-item"><a class="page-link" href="<?= $page > 1 ? '?page=' . ($page - 1) : '' ?>">قبلی</a></li>
                <?php } ?>

                <li class="page-item active" disabled><a class="page-link">صفحه <?= $page ?> از <?= $pages ?></a></li>

                <?php if ($page < $pages) { ?>
                    <li class="page-item"><a class="page-link" <?= ($page >= $pages) ? 'disabled' : '' ?>
                            href="<?= $page < $pages ? '?page=' . ($page + 1) : '' ?>">بعد</a></li>
                    <li class="page-item"><a class="page-link" href="<?= '?page=' . $pages ?>">آخر</a></li>
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
            var_dump($_POST[$field]);
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

function sortInTable($prefix, $loc, $get){
    global $sortField;
    global $sortOrder;
    if (isset($_GET['sort'])) {
        $new_sort = $_GET['sort'];

        if ($sortField == $new_sort) {
            $sortOrder = $sortOrder == 'ASC' ? 'DESC' : 'ASC';
        }
        $_SESSION[$prefix . '_sort_field'] = $new_sort;
        $_SESSION[$prefix . '_sort_order'] = $sortOrder;
        $page = isset($_GET[$get])?"?$get=".$_GET[$get]:'';
        header('Location:'.$loc.'.php'.$page);
    }
}
function sortActive($data){
    global $prefix;
    return (isset($_SESSION[$prefix.'_sort_field']) and $_SESSION[$prefix.'_sort_field'] == $data)?"active":"";
}

function sort_link($field) {
    
    return isset($_GET['page']) ? "?page=" . $_GET['page'] . "&sort=$field" : '?sort='.$field;

}