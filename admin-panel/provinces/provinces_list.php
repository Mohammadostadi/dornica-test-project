<?php
$prefix = 'province';
require_once('../../app/loader.php');
if (isset($_GET['province'])) {
    unset($_SESSION['province']);
}
sortInTable($prefix, 'provinces_list', 'page');
$filter = new Filter('province', 'province_filter');
$data = [
    'name' => 'like',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'province', 'provinces_list.php');
pageLimit('province', 10, false, $_SESSION['province_filter']['province']);
$filter->loopQuery($db, $_SESSION['province_filter']['province']);
$res = $db->orderBy($sortField, $sortOrder)
    ->paginate('province', $page);
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
    <title>لیست استان ها</title>

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
                <div class="breadcrumb-title pe-3">استان ها</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">استان ها </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('province_add.php') ? "<a class='btn btn-outline-secondary' href='province_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0">لیست استان ها</h6>
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
                                                    <th>
                                                        <a href="<?= sort_link('name') ?>"
                                                            class="sort-table <?= sortActive('name') ?>"></a>
                                                        نام
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr id="<?= (isset($_SESSION['province_filter']['province']) and !empty($_SESSION['province_filter']['province'])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION['province_filter']['province']) and !empty($_SESSION['province_filter']['province'])) ? "" : "d-none" ?>">
                                                    <form class="d-flex justify-content-around align-content-start"
                                                        id="form" action="provinces_list.php?page=1" method="post">
                                                        <td class="col-lg-2 col-md-4"> <input class="col form-control"
                                                                type="text"
                                                                value="<?= isset($_SESSION['province_filter']['name']) ? $_SESSION['province_filter']['name'] : "" ?>"
                                                                name="name" placeholder="عنوان"> </td>
                                                        <td class="col-lg-2 col-md-4"> <select
                                                                class="form-select text-secondary" name="status"
                                                                id="status">
                                                                <option value="" class="text-secondary">وضعیت
                                                                </option>
                                                                <option
                                                                    <?= (isset($_SESSION['province_filter']['status']) and $_SESSION['province_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                <option
                                                                    <?= (isset($_SESSION['province_filter']['status']) and $_SESSION['province_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                            </select> </td>
                                                        <td class="col-lg-2 col-md-4 text-center button-filter">
                                                            <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success button-filter"> اعمال
                                                                    فیلتر</button>
                                                                <?php if (isset($_SESSION['province_filter']['province']) and !empty($_SESSION['province_filter']['province'])) { ?>
                                                                    <button type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <?php foreach ($res as $key => $province) { ?>
                                                    <tr>
                                                        <td><?= $province['name'] ?></td>
                                                        <td>
                                                            <?= status('active', $province['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="../cities/citys_list.php?province=<?= $province['id'] ?>"
                                                                    class="btn border-0 text-primary"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="نمایش لیست شهرها" aria-label="Views"><i
                                                                        class="lni lni-list"></i></a>
                                                                <?php if (has_access('province_update.php')) { ?>
                                                                    <a href="province_update.php?id=<?= $province['id'] ?>"
                                                                        class="text-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                        data-bs-original-title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                    <?php
                                                                }
                                                                if (has_access('province_delete.php')) {
                                                                    $res = $db->where('province_id', $province['id'])
                                                                        ->getValue('cities', 'COUNT(*)');
                                                                    ?>
                                                                    <button
                                                                        class="<?= !empty($res) ? "disabled-sort text-secondary" : 'open-confirm text-danger' ?> btn border-0"
                                                                        value="<?= $province['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom"
                                                                        title="<?= !empty($res) ? "قابل حذف نیست" : "حذف" ?>"
                                                                        data-bs-original-title="حذف" aria-label="Delete">
                                                                        <i class="bi bi-trash-fill"></i></button>
                                                                    <div class="modal fade"
                                                                        id="exampleModal<?= $province['id'] ?>" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close"
                                                                                        value="<?= $province['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="province_delete.php?id=<?= $province['id'] ?>"
                                                                                    method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            value="<?= $province['id'] ?>"
                                                                                            class="btn btn-secondary close"
                                                                                            data-dismiss="modal">لغو</button>
                                                                                        <button type="submit"
                                                                                            name="btn_change_status"
                                                                                            class="btn btn-primary">حذف</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
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
    <script src="assets/js/province.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>