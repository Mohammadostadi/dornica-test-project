<?php
$prefix = 'admin';
require_once ('../../app/loader.php');
$filter = new Filter('admin', 'admin_filter');
sortInTable($prefix, 'admins_list', 'page');
$data = [
    'first_name' => 'like',
    'last_name' => 'like',
    'username' => 'like',
    'role' => 'like',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'admin', 'admins_list.php');
pageLimit('admin', 3, false, $_SESSION['admin_filter']['admin']);
$filter->loopQuery($db, $_SESSION['admin_filter']['admin']);
$res = $db->orderBy($sortField, $sortOrder)
    ->paginate('admin', $page);
    // var_dump($db->getLastQuery());die
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once ('../../layout/css.php');
    ?>


    <title>ادمین</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once ('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once ('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->

        <main class="page-content">
            <!--breadcrumb-->

            <?php
            require_once ('../../layout/message.php');
            ?>
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">جداول</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">جدول داده</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary" href="admin_add.php">اضافه کردن داده جدید</a>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست ادمین</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div
                                            id="<?= (isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin'])) ? "" : "filter-row" ?>" class="<?= (isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin'])) ? "" : "d-none" ?>">
                                            <form class=" d-flex justify-content-around align-content-start" id="form"
                                                action="admins_list.php?page=1" method="post">
                                                <div class="row g-3">
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('first_name') ?>"
                                                            name="first_name" placeholder="نام"> </div>
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('last_name') ?>"
                                                            name="last_name" placeholder="نام خانوادگی"> </div>
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('username') ?>"
                                                            name="username" placeholder="نام کاربری"> </div>
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('role') ?>"
                                                            name="role" placeholder="نقش"> </div>
                                                    <div class="col-lg-2 col-md-4"> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['status']) and $_SESSION['admin_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['status']) and $_SESSION['admin_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </div>
                                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button></div>
                                                    <?php if ((isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin']))) { ?>
                                                        <div class="col-lg-2 col-md-4 button-filter"> <button type="submit"
                                                                name="unFilter" id="delete_filter"
                                                                class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>
                                                        <a href="<?= sort_link('first_name') ?>" class="sort-table <?= sortActive('first_name') ?>"></a>
                                                        نام
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('last_name') ?>" class="sort-table <?= sortActive('last_name') ?>"></a>
                                                        نام خانوادگی
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('username') ?>" class="sort-table <?= sortActive('username') ?>"></a>
                                                        نام کاربری
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('role') ?>" class="sort-table <?= sortActive('role') ?>"></a>
                                                        نقش مدیر
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($res as $admin) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $admin['first_name'] ?></td>
                                                        <td><?= $admin['last_name'] ?></td>
                                                        <td><?= $admin['username'] ?></td>
                                                        <td><?= $admin['role'] ?></td>
                                                        <td>
                                                            <?= status('active', $admin['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="d-flex align-items-center justify-content-center gap-3 fs-6">
                                                                <a href="admin_update.php?id=<?= $admin['id'] ?>"
                                                                    class="text-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                    data-bs-original-title="ویرایش اطلاعات"
                                                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                                                <button class="open-confirm btn border-0 text-danger"
                                                                    value="<?= $admin['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="حذف"
                                                                    data-bs-original-title="حذف" aria-label="Delete"
                                                                    style="cursor: pointer;"><i
                                                                        class="bi bi-trash-fill"></i></button>
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
        require_once ('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <script>
        const path = 'admin_delete.php'
    </script>
    <?php require_once ('../../layout/js.php'); ?>
    
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>