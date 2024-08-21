<?php
    $prefix = 'orders';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'orders_list', 'page');
    $shippingList = $db->where('status', 1)
    ->get('shiping_type', null, 'id, name');
    $paymentList = $db->where('status', 1)
    ->get('payment_type', null, 'id, name');
    $membersList = $db->where('status', 1)
    ->get('members', null, 'id, fname, lname, national_code');
    $col = ['members.fname', 'members.lname', 'products.name', 'orders.qty', 'payment_type.name AS payment', 'orders_code', 'orders.status', 'orders.setdate' , 'orders.price', 'shiping_type.name AS shipping'];
    $filter = new Filter('orders', 'order_filter');
    $data = [
        'orders.member_id'=>'=',
        'products.name'=>'like',
        'orders.ordersCode'=>'=',
        'orders.status'=>'=',
        'orders.setdate'=>'date',
        'orders.shippingTypeId'=>'=',
        'orders.paymentTypeId'=>'=',
    ];
    $query = [
        'SELECT COUNT(*) AS total FROM orders LEFT JOIN members on members.id = orders.member_id LEFT JOIN products on products.id = orders.product_id LEFT JOIN payment_type on payment_type.id = orders.paymentTypeId LEFT JOIN shiping_type on shiping_type.id = orders.shippingTypeId WHERE',
        'SELECT members.fname, members.lname, products.name, orders.qty, payment_type.name AS payment, ordersCode, orders.status, orders.setdate, orders.price, shiping_type.name AS shipping, (orders.qty*orders.price) AS total FROM orders LEFT JOIN members on members.id = orders.member_id LEFT JOIN products on products.id = orders.product_id LEFT JOIN payment_type on payment_type.id = orders.paymentTypeId LEFT JOIN shiping_type on shiping_type.id = orders.shippingTypeId'
    ];
    $res = $filter->filterCheck($db, $data, 'order', 'orders_list.php', $query, 3, $sortField, $sortOrder);
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
                                <div id="<?= (isset($_SESSION['order_filter']['order']) and !empty($_SESSION['order_filter']['order']))?"":"filter-row"?>" class="<?= (isset($_SESSION['order_filter']['order']) and !empty($_SESSION['order_filter']['order']))?"":"d-none"?>">
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="orders_list.php?page=1" method="post" >
                                <div class="row g-3">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['order_filter']['products_name'])?$_SESSION['order_filter']['products_name']:"" ?>" name="products_name" placeholder="نام محصول" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['order_filter']['orders_ordersCode'])?$_SESSION['order_filter']['orders_ordersCode']:"" ?>" name="orders_ordersCode" placeholder="کد سفارش" > </div>
                                    <div class="col-lg-2 col-md-4" > <input id="date" class="col form-control" type="text" value="<?= isset($_SESSION['order_filter']['orders_setdate'])?$_SESSION['order_filter']['orders_setdate']:"" ?>" name="orders_setdate" placeholder="تاریخ" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="orders_status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['order_filter']['orders_status']) and $_SESSION['order_filter']['orders_status']== 0) ? 'selected' : '' ?> value="0">درحال بررسی</option>
                                        <option <?= (isset($_SESSION['order_filter']['orders_status']) and $_SESSION['order_filter']['orders_status'] == 1) ? 'selected' : '' ?> value="1">خوانده شده</option>
                                        <option <?= (isset($_SESSION['order_filter']['orders_status']) and $_SESSION['order_filter']['orders_status'] == 2) ? 'selected' : '' ?> value="2">خوانده نشده</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="orders_shippingTypeId" id="orders_shippingTypeId">
                                        <option value="" class="text-secondary" >لیست کاربران</option>
                                        <?php foreach($membersList as $member){ ?>
                                            <option <?= (isset($_SESSION['order_filter']['orders_member_id']) and $_SESSION['order_filter']['orders_member_id'] == $member['id'])?"SELECTED":"" ?> value="<?= $member['id'] ?>"><?= $member['fname'].' '.$member['lname']." - ".$member['national_code'] ?></option>
                                        <?php } ?>
                                        </select></div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="orders_shippingTypeId" id="orders_shippingTypeId">
                                        <option value="" class="text-secondary" >روش ارسال</option>
                                        <?php foreach($shippingList as $shipping){ ?>
                                            <option <?= (isset($_SESSION['order_filter']['orders_shippingTypeId']) and $_SESSION['order_filter']['orders_shippingTypeId'] == $shipping['id'])?"SELECTED":"" ?> value="<?= $shipping['id'] ?>"><?= $shipping['name'] ?></option>
                                        <?php } ?>
                                        </select></div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="orders_paymentTypeId" id="orders_paymentTypeId">
                                        <option value="" class="text-secondary" >روش پرداخت</option>
                                        <?php foreach($paymentList as $payment){ ?>
                                            <option <?= (isset($_SESSION['order_filter']['orders_paymentTypeId']) and $_SESSION['order_filter']['orders_paymentTypeId'] == $payment['id'])?"SELECTED":"" ?> value="<?= $payment['id'] ?>"><?= $payment['name'] ?></option>
                                        <?php } ?>
                                        </select></div>
                                    <div class="col-12 text-end button-filter"> 
                                        <div class="btn-group p-0 m-0">
                                            <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button>
                                            <?php if(isset($_SESSION['order_filter']['order']) and !empty($_SESSION['order_filter']['order'])){ ?>
                                                <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button>
                                            <?php } ?>
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
                            <a href="<?= sort_link('products.name') ?>" class="sort-table <?= sortActive('products.name') ?>"></a>
                                نام محصول</th>
                            <th>
                            <a href="<?= sort_link('qty') ?>" class="sort-table <?= sortActive('qty') ?>"></a>
                                تعداد</th>
                            <th>
                            <a href="<?= sort_link('setdate') ?>" class="sort-table <?= sortActive('setdate') ?>"></a>
                                زمان ثبت</th>
                            <th>
                            <a href="<?= sort_link('payment') ?>" class="sort-table <?= sortActive('payment') ?>"></a>
                                روش پرداخت</th>
                            <th>
                            <a href="<?= sort_link('shipping') ?>" class="sort-table <?= sortActive('shipping') ?>"></a>
                                روش ارسال</th>
                            <th>
                            <a href="<?= sort_link('price') ?>" class="sort-table <?= sortActive('price') ?>"></a>
                                قیمت</th>
                            <th>
                            <a href="<?= sort_link('total') ?>" class="sort-table <?= sortActive('total') ?>"></a>
                                قیمت کل</th>
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
                        <?php foreach($res as $order) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div> 
                                    </td>
                                    <td><?= $order['fname'].' '.$order['lname'] ?></td>
                                    <td><?= $order['name'] ?></td>
                                    <td><?= $order['qty'] ?></td>
                                    <td dir="ltr" >
                                    <?= showDate($order['setdate']); ?>
                                    </td>
                                    <td><?= $order['payment'] ?></td>
                                    <td><?= $order['shipping'] ?></td>
                                    <td><?= number_format($order['price']) ?></td>
                                    <td><?= number_format($order['total']) ?></td>
                                    <td><?= $order['ordersCode'] ?></td>
                                    <td><?php
                                    status('read', $order['status']);
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
<script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
<script type="text/javascript">
    $("#date").persianDatepicker({formatDate: "YYYY/0M/0D"});
</script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>