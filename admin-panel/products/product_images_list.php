<?php
    $prefix = 'products_image';
    require_once('../app/loader.php');
    sortInTable($prefix, 'product_images_list', 'page');
    $col = ['products_image.id' , 'name', 'title', 'products_image.image', 'products_image.status'];
    $filter = new Filter('products_image', 'product_image_filter');
    $data = [
        'title' => 'like',
        'products.name' => 'like',
        'status' => '=',
    ];
    $query = [
        'SELECT COUNT(*) AS total FROM products_image LEFT JOIN products on products.id = products_image.products_id WHERE',
        'SELECT products_image.id, name, title, products_image.image, products_image.status FROM products_image LEFT JOIN products on products.id = products_image.products_id'
    ];
    $res = $filter->filterCheck($db, $data, 'product_image', 'product_images_list.php', $query, 3, $sortField, $sortOrder);
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../layout/css.php');
    ?>

    <title>لیست تصاویر محصول</title>

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
    <?php
            require_once('../layout/message.php');
        ?>
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">محصولات</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست تصاویر محصول</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-outline-secondary" href="product_image_add.php"> اضافه کردن داده جدید</a>
                    <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">  لیست تصاویر</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['product_image_filter']['product_image']) and !empty($_SESSION['product_image_filter']['product_image']))?"":"filter-row"?>" >
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="product_images_list.php?page=1" method="post" >
                                        <div class="row g-3">
                                            <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('products_name') ?>" name="products_name" placeholder="نام محصول" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('title') ?>" name="title" placeholder="عنوان" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['product_image_filter']['status']) and $_SESSION['product_image_filter']['status']== 1) ? 'selected' : '' ?> value="1">فعال</option>
                                        <option <?= (isset($_SESSION['product_image_filter']['status']) and $_SESSION['product_image_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button></div>
                                    <?php  if((isset($_SESSION['product_image_filter']['product_image']) and !empty($_SESSION['product_image_filter']['product_image']))){ ?>
                                        <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
                                        <?php } ?>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                            <a href="<?= sort_link('name') ?>" class="sort-table <?= sortActive('name') ?>"></a>
                                                محصول</th>
                                            <th>
                                            <a href="<?= sort_link('title') ?>" class="sort-table <?= sortActive('title') ?>"></a>
                                                عنوان</th>
                                            <th>عکس</th>
                                            <th>
                                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                وضعیت</th>
                                            <th>اقدامات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php foreach($res as $key => $pimage) { ?>
                                                <tr>
                                                <td>
                                                <input class="form-check-input" type="checkbox">
                                                </td>
                                                <td><?= $pimage['name'] ?></td>
                                                <td><?= $pimage['title'] ?></td>
                                                <td>
                                                    <img src="../<?= $pimage['image'] ?>" alt="" class="rounded" width="60px">
                                                </td>
                                                <td>
                                                    <?= status('active', $pimage['status']); ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="product_image_update.php?id=<?= $pimage['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                        <button class="open-confirm border-0 btn text-danger" value="<?= $pimage['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
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
        require_once('../layout/footer.php');
    ?>

</div>
<!--end wrapper-->
<script>
    const path = 'product_image_delete.php'
</script>
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


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
</html>