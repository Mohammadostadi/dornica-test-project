<?php
$prefix = 'cities';
require_once('../../app/loader.php');
sortInTable($prefix, 'citys_list', 'page');
if (!isset($_SESSION['province'])) {
    $_SESSION['province'] = '';
}
if (isset($_GET['province'])) {
    $province_city = 'cities.province_id = ' . securityCheck($_GET['province']);
}
$filter = new Filter('cities', 'city_filter');
$data = [
    'province.name' => 'like',
    'cities.name' => 'like',
    'cities.status' => '=',
];
$query = [
    'SELECT COUNT(*) AS total FROM cities LEFT JOIN province on province.id = cities.province_id WHERE ' . (!empty($province_city) ? $province_city : ""),
    'SELECT province.name AS province, cities.name AS city, cities.id, cities.province_id, cities.status FROM cities LEFT JOIN province on province.id = cities.province_id ' . (!empty($province_city) ? ' WHERE ' . $province_city : "")
];
$res = $filter->filterCheck($db, $data, 'cities', 'citys_list.php', $query, 10, $sortField, $sortOrder, isset($province_city) ? $province_city : "");
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require_once('../../layout/css.php');
    ?>
    <link rel="stylesheet" href="../../assets/css/sort.css">
    <style>
        .active::after {
            color:
                <?= (isset($_SESSION[$prefix . '_sort_order']) and $_SESSION[$prefix . '_sort_order'] == 'DESC') ? '#000' : '#ccc' ?>
            ;
        }

        .active::before {
            color:
                <?= (isset($_SESSION[$prefix . '_sort_order']) and $_SESSION[$prefix . '_sort_order'] == 'ASC') ? '#000' : '#ccc' ?>
            ;
        }
    </style>
    <title>لیست شهر</title>

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
                <div class="breadcrumb-title pe-3">شهر و استان</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">لیست شهر</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?php if (isset($province_city) and !empty($province_city)) { ?>
                            <a class="btn btn-outline-secondary" href="../provinces/provinces_list.php">برگشت به لیست استان
                                ها</a>
                        <?php } ?>
                        <?= has_access('city_add.php') ? "<a class='btn btn-outline-secondary' href='city_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0"> لیست شهر</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>
                                                        <a href="<?= sort_link('province') ?>"
                                                            class="sort-table <?= sortActive('province') ?>"></a>
                                                        استان
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('city') ?>"
                                                            class="sort-table <?= sortActive('city') ?>"></a>
                                                        شهر
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <?= (has_access('city_update.php') or has_access('city_delete.php')) ? "<th>اقدامات</th>" : "" ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">

                                                <tr id="<?= (isset($_SESSION['city_filter']['cities']) and !empty($_SESSION['city_filter']['cities'])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION['city_filter']['cities']) and !empty($_SESSION['city_filter']['cities'])) ? "" : "d-none" ?>">
                                                    <form class="" id="form" action="citys_list.php?page=1"
                                                        method="post">
                                                        <td></td>
                                                        <td> <input class="col form-control" type="text"
                                                                value="<?= isset($_SESSION['city_filter']['province_name']) ? $_SESSION['city_filter']['province_name'] : "" ?>"
                                                                name="province_name" placeholder="استان"> </td>
                                                        <td> <input class="col form-control" type="text"
                                                                value="<?= isset($_SESSION['city_filter']['cities_name']) ? $_SESSION['city_filter']['cities_name'] : "" ?>"
                                                                name="cities_name" placeholder="شهر"> </td>
                                                        <td> <select class="form-select text-secondary"
                                                                name="cities_status" id="status">
                                                                <option value="" class="text-secondary">وضعیت</option>
                                                                <option
                                                                    <?= (isset($_SESSION['city_filter']['cities_status']) and $_SESSION['city_filter']['cities_status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                <option
                                                                    <?= (isset($_SESSION['city_filter']['cities_status']) and $_SESSION['city_filter']['cities_status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                            </select> </td>
                                                        <td class="text-center button-filter">
                                                            <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success"> اعمال فیلتر</button>
                                                                <?php if (isset($_SESSION['city_filter']['cities']) and !empty($_SESSION['city_filter']['cities'])) { ?>
                                                                    <button type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <?php foreach ($res as $key => $city) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $city['province'] ?></td>
                                                        <td><?= $city['city'] ?></td>
                                                        <td>
                                                            <?= status('active', $city['status']); ?>
                                                        </td>
                                                        <?php if (has_access('city_update.php') or has_access('city_delete.php')) { ?>
                                                            <td>
                                                                <div>
                                                                    <?php if (has_access('city_update.php')) { ?>
                                                                        <a href="city_update.php?id=<?= $city['id'] ?>"
                                                                            class="text-warning" data-bs-toggle="tooltip"
                                                                            data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                            data-bs-original-title="ویرایش اطلاعات"
                                                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                        <?php
                                                                    }
                                                                    if (has_access('city_delete.php')) {
                                                                        $res = $db->where('city_id', $city['id'])
                                                                            ->getOne('members');
                                                                        ?>
                                                                        <button
                                                                            class="<?= is_countable($res) ? "disabled-sort text-secondary" : 'edit text-danger' ?>  btn border-0"
                                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                            title="<?= is_countable($res) ? 'قابل حذف نیست' : 'حذف' ?>"
                                                                            data-bs-original-title="حذف" aria-label="Delete"><i
                                                                                class="bi bi-trash-fill"></i></button>

                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                                        حذف داده</h5>
                                                                                    <button type="button" class="close"
                                                                                        value="<?= $city['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="city_delete.php?id=<?= $city['id'] ?>">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            value="<?= $city['id'] ?>"
                                                                                            class="btn btn-secondary close"
                                                                                            data-dismiss="modal">لغو</button>
                                                                                        <button type="submit"
                                                                                            name="btn_change_status"
                                                                                            class="btn btn-primary">حذف</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php pagination($page, $pages); ?>
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
    <script src="assets/js/city_page.js"></script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>