<?php
    $prefix = 'payments';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'payments', 'page');
    $paymentList = $db->where('status', 1)
    ->get('payment_type', null, 'id, name');
    $filter = new Filter('payments', 'payments_filter');
    $data = [
        'members.fname'=>'like',
        'members.lname'=>'like',
        'orders.ordersCode'=>'=',
        'payments.status'=>'=',
        'payments.payment_type_id'=>'=',
    ];
    $query = [
        'SELECT COUNT(*) AS total FROM payments LEFT JOIN members on members.id = payments.member_id LEFT JOIN orders on orders.id = payments.orders_code LEFT JOIN payment_type on payment_type.id = payments.payment_type_id WHERE',
        'SELECT members.fname, members.lname, orders.ordersCode, payments.amount, payment_type.name AS payment, payments.status, payments.paydate, payments.paycode FROM payments LEFT JOIN members on members.id = payments.member_id LEFT JOIN orders on orders.ordersCode = payments.orders_code LEFT JOIN payment_type on payment_type.id = payments.payment_type_id'
    ];
    $res = $filter->filterCheck($db, $data, 'payments', 'payments.php', $query, 3, $sortField, $sortOrder);
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

    <title>لیست سفارشات</title>
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
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">سفارشات و سبدخرید</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست سفارشات</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <!-- <h6 class="mb-0 text-uppercase">واردات جدول داده</h6> -->
        <hr/>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">لیست سفارشات </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['payments_filter']['payments']) and !empty($_SESSION['payments_filter']['payments']))?"":"filter-row"?>" class="<?= (isset($_SESSION['payments_filter']['payments']) and !empty($_SESSION['payments_filter']['payments']))?"":"d-none"?>">
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="payments.php?page=1" method="post" >
                                        <div class="row g-3">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['payments_filter']['members_fname'])?$_SESSION['payments_filter']['members_fname']:"" ?>" name="members_fname" placeholder="نام" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['payments_filter']['members_lname'])?$_SESSION['payments_filter']['members_lname']:"" ?>" name="members_lname" placeholder="نام خانوادگی" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['payments_filter']['orders_ordersCode'])?$_SESSION['payments_filter']['orders_ordersCode']:"" ?>" name="orders_ordersCode" placeholder="کد سفارش" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="payments_status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['payments_filter']['payments_status']) and $_SESSION['payments_filter']['payments_status']== 0) ? 'selected' : '' ?> value="0">درحال بررسی</option>
                                        <option <?= (isset($_SESSION['payments_filter']['payments_status']) and $_SESSION['payments_filter']['payments_status'] == 1) ? 'selected' : '' ?> value="1">خوانده شده</option>
                                        <option <?= (isset($_SESSION['payments_filter']['payments_status']) and $_SESSION['payments_filter']['payments_status'] == 2) ? 'selected' : '' ?> value="2">خوانده نشده</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="payments_payment_type_id" id="payments_payment_type_id">
                                        <option value="" class="text-secondary" >روش پرداخت</option>
                                        <?php foreach($paymentList as $paymentType){ ?>
                                            <option <?= (isset($_SESSION['payments_filter']['payments_payment_type_id']) and $_SESSION['payments_filter']['payments_payment_type_id'] == $paymentType['id'])?"SELECTED":"" ?> value="<?= $paymentType['id'] ?>"><?= $paymentType['name'] ?></option>
                                        <?php } ?>
                                        </select></div>
                                    <div class="col-12 text-end button-filter"> 
                                        <div class="btn-group p-0 m-0">
                                            <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button>
                                            <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button>
                                        </div>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>
                            <a href="<?= sort_link('fname OR lname') ?>" class="sort-table <?= sortActive('fname OR lname') ?>"></a>
                                نام مشتری</th>
                            <th>
                            <a href="<?= sort_link('paycode') ?>" class="sort-table <?= sortActive('paycode') ?>"></a>
                                کد پرداخت</th>
                            <th>
                            <a href="<?= sort_link('paydate') ?>" class="sort-table <?= sortActive('paydate') ?>"></a>
                                زمان ثبت</th>
                            <th>
                            <a href="<?= sort_link('payment') ?>" class="sort-table <?= sortActive('payment') ?>"></a>
                                روش پرداخت</th>
                            <th>
                            <a href="<?= sort_link('price') ?>" class="sort-table <?= sortActive('price') ?>"></a>
                                قیمت</th>
                            <th>
                            <a href="<?= sort_link('ordersCode') ?>" class="sort-table <?= sortActive('ordersCode') ?>"></a>
                                کد سفارش</th>
                            <th>
                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                وضعیت</th>
                            <th>اقدامات</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php foreach($res as $payment) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div> 
                                    </td>
                                    <td><?= $payment['fname'].' '.$payment['lname'] ?></td>
                                    <td><?= $payment['paycode'] ?></td>
                                    <td dir="ltr" >
                                    <?= showDate($payment['paydate']); ?>
                                    </td>
                                    <td><?= $payment['payment'] ?></td>
                                    <td><?= number_format($payment['amount']) ?></td>
                                    <td><?= $payment['ordersCode'] ?></td>
                                    <td><?php
                                    status('read', $payment['status']);
                                    ?></td>
                                    <td>
                                        <div>
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="وضعیت جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
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
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>