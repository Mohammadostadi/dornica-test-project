<?php
$prefix = 'ads';
require_once ('../app/loader.php');
sortInTable($prefix, 'ads_list', 'page');
$filter = new Filter('ads', 'ads_filter');
$data = [
    'title' => 'like',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'ads', 'ads_list.php');
pageLimit('ads', 3, false);
$filter->loopQuery($db, $_SESSION['ads_filter']['ads']);
$res = $db->orderBy($sortField, $sortOrder)
    ->paginate('ads', $page);
?>

<!doctype html>
<html lang="en" dir="rtl">

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require_once ('../layout/css.php');
    ?>

    <title>لیست تبلیغات</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once ('../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once ('../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <?php
            require_once ('../layout/message.php');
            ?>
            <!--breadcrumb-->
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">تبلیغات</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">لیست تبلیغ</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary" href="ads_add.php"> اضافه کردن داده جدید</a>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست تبلیغات</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div
                                            id="<?= (isset($_SESSION['ads_filter']['ads']) and !empty($_SESSION['ads_filter']['ads'])) ? "" : "filter-row" ?>">
                                            <form class="" id="form" action="ads_list.php?page=1" method="post">
                                                <div class="row g-3">
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['ads_filter']['title']) ? $_SESSION['ads_filter']['title'] : "" ?>"
                                                            name="title" placeholder="عنوان"> </div>
                                                    <div class="col-lg-2 col-md-4"> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['ads_filter']['status']) and $_SESSION['ads_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['ads_filter']['status']) and $_SESSION['ads_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </div>
                                                    <div class="col-lg-2 col-md-4 text-center "> <button type="submit"
                                                            name="filtered" id="apply_filter" class="btn btn-success">
                                                            اعمال فیلتر</button></div>
                                                    <?php if (isset($_SESSION['ads_filter']['ads']) and !empty($_SESSION['ads_filter']['ads'])) { ?>
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
                                                    <th> <a href="<?= sort_link('title') ?>"
                                                            class="sort-table <?= sortActive('title') ?>"></a>
                                                        عنوان</th>
                                                    <th>عکس</th>
                                                    <th><a href="<?= sort_link('sort') ?>" class="sort-table <?= sortActive('sort') ?>"></a>
                                                    ترتیب</th>
                                                    <th><a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                        
                                                    </th>
                                                    <th class="text-start">اقدامات</th>

                                                </tr>
                                            <tbody class="text-center">
                                                <?php foreach ($res as $ad) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $ad['title'] ?></td>
                                                        <td class="text-center">
                                                            <img src="../<?= $ad['image'] ?>" alt="" width="40px"
                                                                class="rounded text-center">
                                                        </td>
                                                        <td><?= $ad['sort'] ?></td>
                                                        <td class="text-center">
                                                            <?= status('active', $ad['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                                <a href="ads_update.php?id=<?= $ad['id'] ?>"
                                                                    class="text-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                    data-bs-original-title="ویرایش اطلاعات"
                                                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <button class="open-confirm btn border-0 text-danger"
                                                                    value="<?= $ad['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="حذف"
                                                                    data-bs-original-title="حذف" aria-label="Delete"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                            </div>
                                                        </td>
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
        require_once ('../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <script>
        const path = 'ads_delete.php'
    </script>

    <?php

    require_once ('../layout/js.php');
    ?>
    <script>
        $(document).ready(function () {
            $("#filter-row").hide();
            $('#_filter').click(function () {
                $('#filter-row').toggle(400);
            });
        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>