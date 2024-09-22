<?php
$prefix = 'members';
require_once('../../app/loader.php');
require_once('../../app/Controller/cities.php');
sortInTable($prefix, 'members_list', 'page');
$provinceList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('province', null, 'id, name');
$col = ['members.id', 'image', 'gender', 'fname', 'lname', 'email', 'phone', 'birthday', 'cities.name AS city', 'province.name AS province', 'setdate', 'members.status'];
$filter = new Filter('members', 'member_filter');
$data = [
    'members.fname' => 'like',
    'members.lname' => 'like',
    'members.province_id' => '=',
    'members.city_id' => '=',
    'members.status' => '=',
    'members.setdate' => 'date',
];
$filter->filterCheck($db, $data, 'member', 'members_list.php');
pageLimit('members', 5, false, $_SESSION['member_filter']['member']);
$filter->loopQuery($db, $_SESSION['member_filter']['member']);
$res = $db->join('province', 'members.province_id = province.id', ' LEFT')
    ->join('cities', 'members.city_id = cities.id', 'LEFT')
    ->orderBy($sortField, $sortOrder)
    ->paginate('members', $page, $col);
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require_once('../../layout/css.php');
    ?>

    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />

    <title>لیست کاربران</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            <?php
            require_once('../../layout/message.php');
            ?>
            <!--breadcrumb-->
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">مشتریان</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">لیست مشتری</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('member_add.php') ? "<a class='btn btn-outline-secondary' href='member_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست کاربران</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>تصویر</th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('fname') ?>"
                                                            class="sort-table <?= sortActive('fname') ?>"></a>
                                                        نام
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('lname') ?>"
                                                            class="sort-table <?= sortActive('lname') ?>"></a>
                                                        نام خانوادگی
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('gender') ?>"
                                                            class="sort-table <?= sortActive('gender') ?>"></a>
                                                        جنسیت
                                                    </th>
                                                    <th>ایمیل</th>
                                                    <th>موبایل</th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('province') ?>"
                                                            class="sort-table <?= sortActive('province') ?>"></a>
                                                        استان
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('city') ?>"
                                                            class="sort-table <?= sortActive('city') ?>"></a>
                                                        شهر
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('setdate') ?>"
                                                            class="sort-table <?= sortActive('setdate') ?>"></a>
                                                        تاریخ
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">

                                                <tr id="<?= (isset($_SESSION['member_filter']['member']) and !empty($_SESSION['member_filter']['member'])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION['member_filter']['member']) and !empty($_SESSION['member_filter']['member'])) ? "" : "d-none" ?>">
                                                    <form class=" d-flex justify-content-around align-content-start"
                                                        id="form" action="members_list.php?page=1" method="post">
                                                        <td></td>
                                                        <td> <input class="col form-control" type="text"
                                                                value="<?= $filter->is_exist('members_fname') ?>"
                                                                name="members_fname" placeholder="نام"> </td>
                                                        <td> <input class="col form-control" type="text"
                                                                value="<?= $filter->is_exist('members_lname') ?>"
                                                                name="members_lname" placeholder="نام خانوادگی"> </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <select id="state" name="members_province_id"
                                                                class="form-select">
                                                                <option value="" selected>استان را انتخاب کنید</option>
                                                                <?php
                                                                foreach ($provinceList as $province) { ?>
                                                                    <option
                                                                        <?= (isset($_SESSION['member_filter']['members_province_id']) and $_SESSION['member_filter']['members_province_id'] == $province['id']) ? "SELECTED" : "" ?> value="<?= $province['id'] ?>">
                                                                        <?= $province['name'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="city" name="members_city_id"
                                                                class="form-select">
                                                                <option value="" selected>ابتدا استان را انتخاب کنید
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td> <input id="date" class="col form-control" type="text"
                                                                value="<?= $filter->is_exist('members_setdate') ?>"
                                                                name="members_setdate" placeholder="تاریخ"> </td>
                                                        <td> <select class="form-select text-secondary"
                                                                name="members_status" id="status">
                                                                <option value="" class="text-secondary">وضعیت</option>
                                                                <option
                                                                    <?= (isset($_SESSION['member_filter']['members_status']) and $_SESSION['member_filter']['members_status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                <option
                                                                    <?= (isset($_SESSION['member_filter']['members_status']) and $_SESSION['member_filter']['members_status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                            </select> </td>
                                                        <td class="text-center button-filter">
                                                            <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success"> اعمال فیلتر</button>
                                                                <?php if ((isset($_SESSION['member_filter']['member']) and !empty($_SESSION['member_filter']['member']))) { ?>
                                                                    <button type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                </div>
                                                            </td>
                                                        <?php } ?>
                                                    </form>
                                                </tr>
                                                <?php foreach ($res as $member) { ?>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                <img class="rounded-circle"
                                                                    src="../../<?= $member['image'] ?>" alt="" width="40px">
                                                            </span>
                                                        </td>
                                                        <td><?= $member['fname'] ?></td>
                                                        <td><?= $member['lname'] ?></td>
                                                        <td><?= $member['gender'] == 0 ? "مرد" : "زن" ?></td>
                                                        <td><?= $member['email'] ?></td>
                                                        <td><?= $member['phone'] ?></td>
                                                        <td><?= $member['province'] ?></td>
                                                        <td><?= $member['city'] ?></td>
                                                        <td dir="ltr">
                                                            <?= showDate($member['setdate']) ?>
                                                        </td>
                                                        <td>
                                                            <?= status('active', $member['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a class="dropdown-toggle dropdown-toggle-nocaret bx bx-dots-horizontal"
                                                                    href="#" data-bs-toggle="dropdown">
                                                                </a>

                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="javascript:;"
                                                                            class="btn border-0 text-primary dropdown-item"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="وضعیت جزئیات" aria-label="Views"><i
                                                                                class="bi bi-eye-fill"></i> نمایش جزئیات</a>
                                                                    </li>
                                                                    <?php if (has_access('member_update.php')) { ?>
                                                                        <li>
                                                                            <a href="member_update.php?id=<?= $member['id'] ?>"
                                                                                class="btn border-0 text-warning dropdown-item"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="bottom"
                                                                                title="ویرایش اطلاعات"
                                                                                data-bs-original-title="ویرایش اطلاعات"
                                                                                aria-label="Edit"><i
                                                                                    class="bi bi-pencil-fill"></i> ویرایش
                                                                                اطلاعات</a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    if (has_access('member_delete.php')) {
                                                                        $payment = $db->where('member_id', $member['id'])
                                                                            ->getValue('payments', 'COUNT(*)');
                                                                        $wishlist = $db->where('member_id', $member['id'])
                                                                            ->getValue('wishlist', 'COUNT(*)');
                                                                        $order = $db->where('member_id', $member['id'])
                                                                            ->getValue('orders', 'COUNT(*)');
                                                                        $cart = $db->where('member_id', $member['id'])
                                                                            ->getValue('cart', 'COUNT(*)');
                                                                        $comment = $db->where('member_id', $member['id'])
                                                                            ->getValue('comment', 'COUNT(*)');
                                                                        if (!empty($payment) or !empty($wishlist) or !empty($order) or !empty($cart) or !empty($comment)) {
                                                                            $result = true;
                                                                        } else {
                                                                            $result = false;
                                                                        }
                                                                    ?>
                                                                        <li>
                                                                            <button
                                                                                class="<?= $result ? 'disabled text-secondary' : 'edit text-danger' ?>  btn border-0 dropdown-item"
                                                                                value="<?= $member['id'] ?>"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="bottom"
                                                                                title="<?= $result ? 'قابل حذف نیست' : 'حذف' ?>"
                                                                                data-bs-original-title="حذف"
                                                                                aria-label="Delete"><i
                                                                                    class="bi bi-trash-fill"></i> حذف
                                                                                فیلد</button>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <li><a class="dropdown-item"
                                                                            href="../payment/payments.php?member=<?= $member['id'] ?>">
                                                                            <i class="fadeIn animated bx bx-money"></i>
                                                                            لیست پرداختی</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="../orders/orders_list.php?member=<?= $member['id'] ?>">
                                                                            <i
                                                                                class="fadeIn animated bx bx-shopping-bag"></i>
                                                                            لیست سفارشات</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="../baskets/baskets_list.php?member=<?= $member['id'] ?>">
                                                                            <i class="lni lni-cart"></i>
                                                                            لیست سبد خرید
                                                                        </a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="../comments/comments_list.php?member=<?= $member['id'] ?>">
                                                                            <i class="lni lni-comments"></i>
                                                                            لیست کامنت ها
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <div class="modal fade" id="exampleModal<?= $member['id'] ?>"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                
                                                                <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">

                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">حذف داده</h5>
                                                                                        <button type="button" class="close"
                                                                                            value="<?= $member['id'] ?>"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="member_delete.php?id=<?= $member['id'] ?>">
                                                                                        <div class="modal-body">
                                                                                            <h5>آیا مطمئن هستید؟</h5>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                value="<?= $member['id'] ?>"
                                                                                                class="btn btn-secondary close"
                                                                                                data-dismiss="modal">لغو</button>
                                                                                            <button type="submit"
                                                                                                name="btn_change_status"
                                                                                                class="btn btn-primary">ذخیره
                                                                                                تنظیمات</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php pagination($page, $pages) ?>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </main>
        <!--end page main-->

        <?php
        require_once('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <?php
    require_once('../../layout/js.php');
    ?>
    <script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
    <script>
        const current_province = $('#state').find('option:selected').val();
        const current_city = "<?= isset($_SESSION['member_filter']['members_city_id']) ? $_SESSION['member_filter']['members_city_id'] : '' ?>";
    </script>
    <script src="assets/js/member_page.js"></script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>