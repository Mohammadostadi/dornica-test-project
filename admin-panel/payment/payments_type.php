<?php
$prefix = 'payment_type';
require_once('../../app/loader.php');
sortInTable($prefix, 'payments_type', 'page');
$filter = new Filter('payment_type', 'payment_type_filter');
$data = [
    'name' => 'like',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'payment_type', 'payments_type.php');
pageLimit('payment_type', 10, false, $_SESSION['payment_type_filter']['payment_type']);
$filter->loopQuery($db, $_SESSION['payment_type_filter']['payment_type']);
$res = $db
    ->orderBy($sortField, $sortOrder)
    ->paginate('payment_type', $page);

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

    <title>مدل پرداخت</title>

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
                <div class="breadcrumb-title pe-3">مدل پرداخت</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">مدل پرداخت</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('payment_type_add.php') ? "<a class='btn btn-outline-secondary' href='payment_type_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0">لیست مدل پرداخت</h6>
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
                                                        <a href="<?= sort_link('name') ?>"
                                                            class="sort-table <?= sortActive('name') ?>"></a>
                                                        نام
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('sort') ?>"
                                                            class="sort-table <?= sortActive('sort') ?>"></a>
                                                        ترتیب
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <?= (has_access('payment_type_delete.php') or has_access('payment_type_update.php')) ? "<th>اقدامات</th>" : "" ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                
                                        <tr id="<?= (isset($_SESSION['payment_type_filter']['payment_type']) and !empty($_SESSION['payment_type_filter']['payment_type'])) ? "" : "filter-row" ?>"
                                            class="<?= (isset($_SESSION['payment_type_filter']['payment_type']) and !empty($_SESSION['payment_type_filter']['payment_type'])) ? "" : "d-none" ?>">
                                            <form class="" id="form" action="payments_type.php?page=1" method="post">
                                                <td></td>
                                                    <td> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['payment_type_filter']['name']) ? $_SESSION['payment_type_filter']['name'] : "" ?>"
                                                            name="name" placeholder="عنوان"> </td>
                                                            <td></td>
                                                    <td> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option
                                                                <?= (isset($_SESSION['payment_type_filter']['status']) and $_SESSION['payment_type_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option
                                                                <?= (isset($_SESSION['payment_type_filter']['status']) and $_SESSION['payment_type_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </td>
                                                    <td class="col-lg-2 col-md-4 text-center button-filter"> 
                                                    <div class="btn-group p-0 m-0">
                                                        <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button>
                                                            <?php if (isset($_SESSION['payment_type_filter']['payment_type']) and !empty($_SESSION['payment_type_filter']['payment_type'])) { ?>
                                                            <button type="submit"
                                                                name="unFilter" id="delete_filter"
                                                                class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                                <?php } ?>
                                                                </div>
                                                        </td>
                                            </form>
                                        </tr>
                                                <?php foreach ($res as $payment) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $payment['name'] ?></td>
                                                        <td><?= $payment['sort'] ?></td>
                                                        <td>
                                                            <?= status('active', $payment['status']); ?>
                                                        </td>
                                                        <?php if (has_access('payment_type_delete.php') or has_access('payment_type_update.php')) { ?>
                                                            <td>
                                                                <div>
                                                                    <?php if(has_access('payment_type_update.php')){ ?>
                                                                    <a href="payment_type_update.php?id=<?= $payment['id'] ?>"
                                                                        class="text-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                        data-bs-original-title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                    <?php
                                                                    }
                                                                    if(has_access('payment_type_delete.php')){
                                                                    $res = $db->where('paymentTypeId', $payment['id'])
                                                                        ->getValue('orders', 'COUNT(*)');
                                                                    ?>
                                                                    <button
                                                                        class="<?= !empty($res) ? "disabled text-secondary" : "open-confirm text-danger" ?> btn border-0"
                                                                        value="<?= $payment['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom"
                                                                        title="<?= !empty($res) ? "قابل حذف نیست" : "حذف" ?>"
                                                                        data-bs-original-title="حذف" aria-label="Delete"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                            <?php } ?>
                                                                </div>
                                                            </td>
                                                        <?php } ?>
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
        const path = 'payment_type_delete.php'
    </script>
    <?php
    require_once('../../layout/js.php');
    ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>