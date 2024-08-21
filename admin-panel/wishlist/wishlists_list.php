<?php
    $prefix = 'wishlist';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'wishlists_list', 'page');
    pageLimit('wishlist', 3, false);
    
    $col = ['members.fname', 'members.lname', 'products.name', 'wishlist.setdate', 'products.image'];
    $res = $db->join('members', 'wishlist.member_id = members.id', ' LEFT')
    ->orderBy($sortField, $sortOrder)
    ->join('products', 'products.id = wishlist.product_id')->paginate('wishlist', $page, $col);


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

    <title>لیست علاقه مندی ها </title>
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
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0 text-uppercase">لیست علاقه مندی ها</h6>
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
                            <th>#</th>
                            <th>
                            <a href="<?= sort_link('name') ?>" class="sort-table <?= sortActive('name') ?>"></a> 
                                نام کتاب</th>
                            <th>نام </th>
                            <th>
                            <a href="<?= sort_link('setdate') ?>" class="sort-table <?= sortActive('setdate') ?>"></a>
                                تاریخ</th>
                            <th>اقدامات</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php foreach($res as $key => $wishlist) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../<?= $wishlist['image'] ?>" alt="" width="60px" class="rounded mx-2">
                                        <span>
                                            <?= $wishlist['name'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?= $wishlist['fname'] ?> <?= $wishlist['lname'] ?>
                                        </span>
                                    </td>
                                    <td dir="ltr" ><?= showDate($wishlist['setdate']) ?></td>
                                    <td>
                                        <div>
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="وضعیت جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                    
                                    <?php } ?>
                        </tbody>
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
            require_once('../../layout/message.php');
        ?>

</div>
<!--end wrapper-->

<?php
        require_once('../../layout/js.php');
?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>