<?php
$prefix = 'products_image';
require_once('../../app/loader.php');
sortInTable($prefix, 'product_images_list', 'page');
$col = ['products_image.id', 'name', 'title', 'products_image.image', 'products_image.status'];
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
$res = $filter->filterCheck($db, $data, 'product_image', 'product_images_list.php', $query, 10, $sortField, $sortOrder);
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

    <title>لیست تصاویر محصول</title>

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
                        <?= has_access('product_image_add.php') ? "<a class='btn btn-outline-secondary' href='product_image_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0"> لیست تصاویر</h6>
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
                                                        محصول
                                                    </th>
                                                    <th>
                                                        <a href="<?= sort_link('title') ?>"
                                                            class="sort-table <?= sortActive('title') ?>"></a>
                                                        عنوان
                                                    </th>
                                                    <th>عکس</th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <?= (has_access('product_image_update.php') or has_access('product_image_delete.php')) ? "<th>اقدامات</th>" : "" ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">

                                                <tr id="<?= (isset($_SESSION['product_image_filter']['product_image']) and !empty($_SESSION['product_image_filter']['product_image'])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION['product_image_filter']['product_image']) and !empty($_SESSION['product_image_filter']['product_image'])) ? "" : "d-none" ?>">
                                                    <form class=" d-flex justify-content-around align-content-start"
                                                        id="form" action="product_images_list.php?page=1" method="post">
                                                        <td></td>
                                                        <td class="col-lg-2 col-md-4"> <input class="col form-control"
                                                                type="text"
                                                                value="<?= $filter->is_exist('products_name') ?>"
                                                                name="products_name" placeholder="نام محصول"> </td>
                                                        <td class="col-lg-2 col-md-4"> <input class="col form-control"
                                                                type="text" value="<?= $filter->is_exist('title') ?>"
                                                                name="title" placeholder="عنوان"> </td>
                                                        <td></td>
                                                        <td class="col-lg-2 col-md-4"> <select
                                                                class="form-select text-secondary" name="status"
                                                                id="status">
                                                                <option value="" class="text-secondary">وضعیت</option>
                                                                <option
                                                                    <?= (isset($_SESSION['product_image_filter']['status']) and $_SESSION['product_image_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                <option
                                                                    <?= (isset($_SESSION['product_image_filter']['status']) and $_SESSION['product_image_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                            </select> </td>
                                                        <td class="col-lg-2 col-md-4 text-center button-filter">
                                                            <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success"> اعمال فیلتر</button>
                                                                <?php if ((isset($_SESSION['product_image_filter']['product_image']) and !empty($_SESSION['product_image_filter']['product_image']))) { ?>
                                                                    <button type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <?php foreach ($res as $key => $pimage) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $pimage['name'] ?></td>
                                                        <td><?= $pimage['title'] ?></td>
                                                        <td>
                                                            <img src="../../<?= $pimage['image'] ?>" alt="" class="rounded"
                                                                width="60px">
                                                        </td>
                                                        <td>
                                                            <?= status('active', $pimage['status']); ?>
                                                        </td>
                                                        <?php if (has_access('product_image_update') or has_access('product_image_delete')) { ?>
                                                            <td>
                                                                <?php if (has_access('product_image_update.php')) { ?>
                                                                    <div>
                                                                        <a href="product_image_update.php?id=<?= $pimage['id'] ?>"
                                                                            class="text-warning" data-bs-toggle="tooltip"
                                                                            data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                            data-bs-original-title="ویرایش اطلاعات"
                                                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                        <?php
                                                                }
                                                                if (has_access('product_image_delete.php')) {
                                                                    ?>
                                                                        <button class="open-confirm border-0 btn text-danger"
                                                                            value="<?= $pimage['id'] ?>" data-bs-toggle="tooltip"
                                                                            data-bs-placement="bottom" title="حذف"
                                                                            data-bs-original-title="حذف" aria-label="Delete"><i
                                                                                class="bi bi-trash-fill"></i></button>
                                                                        <div class="modal fade"
                                                                            id="exampleModal<?= $pimage['id'] ?>" tabindex="-1"
                                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">

                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">حذف داده</h5>
                                                                                        <button type="button" class="close"
                                                                                            value="<?= $pimage['id'] ?>"
                                                                                            data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="product_image_delete.php?id=<?= $pimage['id'] ?>"
                                                                                        method="post">
                                                                                        <div class="modal-body">
                                                                                            <h5>آیا مطمئن هستید؟</h5>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                value="<?= $pimage['id'] ?>"
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
    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/product_page.js"></script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>