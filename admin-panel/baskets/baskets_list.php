<?php
    $prefix = 'cart';
    require_once('../app/loader.php');
    sortInTable($prefix, 'baskets_list', 'page');
    $col = ['members.fname', 'members.lname', 'products.name', 'products.price', 'cart.qty', 'cart.setdate'];
    $filter = new Filter('cart', 'basket_filter');
    $data =[
        'members.fname'=>'like',
        'members.lname'=>'like',
        'products.name'=>'like',
        'products.price'=>'=',
    ];
    $query = [
        'SELECT COUNT(*) AS total FROM cart LEFT JOIN members on members.id = cart.member_id LEFT JOIN products on products.id = cart.product_id WHERE',
        'SELECT members.fname, members.lname, products.name, products.price, cart.qty, cart.setdate, (cart.qty*products.price) as total FROM cart LEFT JOIN members on members.id = cart.member_id LEFT JOIN products on products.id = cart.product_id'
    ];
    $res = $filter->filterCheck($db, $data, 'basket', 'baskets_list.php', $query, 3, $sortField, $sortOrder);
    // var_dump($db->getLastQuery());die;
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php

        require_once('../layout/css.php');

    ?>

    

    <title>لیست سبد خرید</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php
        require_once('../layout/header.php'); 
    ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php
        require_once('../layout/asidebar.php'); 
    ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">سبدخرید</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست سبدخرید</li>
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
        
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0 text-uppercase">لیست کارت ها</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['basket_filter']['basket']) and !empty($_SESSION['basket_filter']['basket']))?"":"filter-row"?>" >
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="baskets_list.php?page=1" method="post" >
                                        <div class="row g-2">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['basket_filter']['members_fname'])?$_SESSION['basket_filter']['members_fname']:"" ?>" name="members_fname" placeholder="نام" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['basket_filter']['members_lname'])?$_SESSION['basket_filter']['members_lname']:"" ?>" name="members_lname" placeholder="نام خانوادگی" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['basket_filter']['products_name'])?$_SESSION['basket_filter']['products_name']:"" ?>" name="products_name" placeholder="نام محصول" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['basket_filter']['products_price'])?$_SESSION['basket_filter']['products_price']:"" ?>" name="products_price" placeholder="قیمت" > </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success button-filter" > اعمال فیلتر</button></div>
                                    <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
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
                            <a href="<?= sort_link('fname OR lname') ?>" class="sort-table <?= sortActive('fname OR lname') ?>"></a>
                                نام و نام خانوادگی</th>
                            <th>
                            <a href="<?= sort_link('products.name') ?>" class="sort-table <?= sortActive('products.name') ?>"></a>
                                نام محصول</th>
                            <th>
                            <a href="<?= sort_link('qty') ?>" class="sort-table <?= sortActive('qty') ?>"></a>
                                تعداد</th>
                            <th>
                                <a href="<?= sort_link('total') ?>" class="sort-table <?= sortActive('total') ?>"></a>
                                قیمت</th>
                            <th>
                            <a href="<?= sort_link('setdate') ?>" class="sort-table <?= sortActive('setdate') ?>"></a>
                                تاریخ ثبت</th>
                            <th class="text-start">اقدامات</th>
                        </tr>
                        <tbody class="text-center">
                        <?php foreach($res as $key => $basket) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td><?= $basket['fname'].' '.$basket['lname'] ?></td>
                                    <td><?= $basket['name'] ?></td>
                                    <td><?= $basket['qty'] ?></td>
                                    <td><?= number_format($basket['qty'] * $basket['price']) ?></td>
                                    <td dir="ltr" ><?= showDate($basket['setdate']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="وضعیت جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
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
            require_once('../layout/footer.php');
        ?>

</div>
<!--end wrapper-->


<?php 

    require_once('../layout/js.php');

?>
<script>
    $(document).ready(function() {
    $("#filter-row").hide();
    $('#_filter').click(function(){
                $('#filter-row').toggle(400);
            });
    });
</script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>