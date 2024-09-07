<?php
$prefix = 'pages';
require_once('../../app/loader.php');
sortInTable($prefix, 'pages_list', 'page');
$filter = new Filter('pages', 'page_filter');
$data = [
    'title' => 'like',
    'code' => '=',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'page', 'pages_list.php');
pageLimit('pages', 10, false, $_SESSION['page_filter']['page']);
$filter->loopQuery($db, $_SESSION['page_filter']['page']);
$res = $db
    ->orderBy($sortField, $sortOrder)
    ->paginate('pages', $page);
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

    <title>لیست صفحات</title>

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
                <div class="breadcrumb-title pe-3">صفحات</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">صفحات</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('page_add.php') ? "<a class='btn btn-outline-secondary' href='page_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0">لیست صفحات</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div id="<?= (isset($_SESSION['page_filter']['page']) and !empty($_SESSION['page_filter']['page'])) ? "" : "filter-row" ?>"
                                            class="<?= (isset($_SESSION['page_filter']['page']) and !empty($_SESSION['page_filter']['page'])) ? "" : "d-none" ?>">
                                            <form class=" d-flex justify-content-around align-content-start" id="form"
                                                action="pages_list.php?page=1" method="post">
                                                <div class="row g-3">
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['page_filter']['title']) ? $_SESSION['page_filter']['title'] : "" ?>"
                                                            name="title" placeholder="عنوان"> </div>
                                                    <div class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['page_filter']['code']) ? $_SESSION['page_filter']['code'] : "" ?>"
                                                            name="code" placeholder="کد"> </div>
                                                    <div class="col-lg-2 col-md-4"> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['page_filter']['status']) and $_SESSION['page_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['page_filter']['status']) and $_SESSION['page_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </div>
                                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button></div>
                                                    <div class="col-lg-2 col-md-4 button-filter"> <button type="submit"
                                                            name="unFilter" id="delete_filter"
                                                            class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>
                                                        <a href="<?= sort_link('title') ?>"
                                                            class="sort-table <?= sortActive('title') ?>"></a>
                                                        عنوان
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('setdate') ?>"
                                                            class="sort-table <?= sortActive('setdate') ?>"></a>
                                                        زمان
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('code') ?>"
                                                            class="sort-table <?= sortActive('code') ?>"></a>
                                                        کد
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
                                                <?php foreach ($res as $pageList) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $pageList['title'] ?></td>
                                                        <td dir="ltr">
                                                            <?= showDate($pageList['setdate']) ?>
                                                        </td>
                                                        <td><?= $pageList['code'] ?></td>
                                                        <td>
                                                            <?= status('active', $pageList['status']) ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript:;" class="text-primary"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="" data-bs-original-title="وضعیت جزئیات"
                                                                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                                                <?php if (has_access('page_update.php')) { ?>
                                                                    <a href="page_update.php?id=<?= $pageList['id'] ?>"
                                                                        class="text-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                        data-bs-original-title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <?php }
                                                                if (has_access('page_delete.php')) {
                                                                    ?>
                                                                    <button class="open-confirm btn border-0 text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                        title="حذف" data-bs-original-title="حذف"
                                                                        aria-label="Delete"><i
                                                                            class="bi bi-trash-fill"></i></button>
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
    <script>
        const path = 'page_delete.php'
    </script>
    <?php
    require_once('../../layout/js.php');
    ?>


</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>