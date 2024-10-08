<?php $prefix = 'brand';
require_once('../../app/loader.php');
if (isset($_GET['back'])) {
    unset($_SESSION['brand']);
}
sortInTable($prefix, 'brands_list', 'page');
$filter = new Filter('brand', 'brand_filter');
$data = [
    'name' =>
        'like',
    'status' => '=',
];
$filter->filterCheck($db, $data, 'brand', 'brands_list.php');
pageLimit('brand', 10, false, $_SESSION['brand_filter']['brand']);
$filter->loopQuery($db, $_SESSION['brand_filter']['brand']);

$res = $db->orderBy($sortField, $sortOrder)
    ->paginate('brand', $page);
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

    <title>برند ها</title>

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
                <div class="breadcrumb-title pe-3">خصوصیات محصول</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">لیست برندها</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('brand_add.php') ? "<a class='btn btn-outline-secondary' href='brand_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0"> لیست برند</h6>
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
                                                    <th>لوگو</th>
                                                    <th>
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>

                                            <tr id="<?= (isset($_SESSION['brand_filter']['brand']) and !empty($_SESSION['brand_filter']['brand'])) ? "" : "filter-row" ?>"
                                                class="<?= (isset($_SESSION['brand_filter']['brand']) and !empty($_SESSION['brand_filter']['brand'])) ? "" : "d-none" ?>">
                                                <form class="" id="form" action="brands_list.php?page=1" method="post">
                                                    <td></td>
                                                    <td> <input class="col form-control" type="text"
                                                            value="<?= isset($_SESSION['brand_filter']['name']) ? $_SESSION['brand_filter']['name'] : "" ?>"
                                                            name="name" placeholder="نام"> </td>
                                                    <td></td>
                                                    <td> <select class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['brand_filter']['status']) and $_SESSION['brand_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['brand_filter']['status']) and $_SESSION['brand_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </td>
                                                    <td class="text-center button-filter">
                                                        <div class="btn-group p-0 m-0">
                                                            <button type="submit" name="filtered" id="apply_filter"
                                                                class="btn btn-success"> اعمال فیلتر</button>
                                                            <?php if (isset($_SESSION['brand_filter']['brand']) and !empty($_SESSION['brand_filter']['brand'])) { ?>
                                                                <button type="submit" name="unFilter" id="delete_filter"
                                                                    class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </form>
                                            </tr>
                                            <tbody class="text-center">
                                                <?php foreach ($res as $brand) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $brand['name'] ?></td>
                                                        <td>
                                                            <img src="../../<?= $brand['logo'] ?>" alt="" width="60px"
                                                                class="rounded">
                                                        </td>
                                                        <td>
                                                            <?= status('active', $brand['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="../products/products_list.php?brand=<?= $brand['id'] ?>"
                                                                    class="btn border-0 text-primary"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="نمایش لیست محصولات" aria-label="Views"><i
                                                                        class="lni lni-list"></i></a>
                                                                <?php if (has_access('brand_update.php')) { ?>
                                                                    <a href="brand_update.php?id=<?= $brand['id'] ?>"
                                                                        class="text-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                    <?php
                                                                }
                                                                if (has_access('brand_delete.php')) {
                                                                    $res = $db->where("FIND_IN_SET({$brand['id']}, brand_ids)")
                                                                        ->getValue('products', 'COUNT(*)');
                                                                    ?>
                                                                    <button
                                                                        class="<?= !empty($res) ? 'disabled-sort text-secondary' : 'edit text-danger' ?> border-0 btn"
                                                                        value="<?= $brand['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom"
                                                                        title="<?= !empty($res) ? 'قابل حذف نیست' : 'حذف' ?>"
                                                                        aria-label="Delete"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                    <div class="modal fade" id="exampleModal<?= $brand['id'] ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        حذف داده</h5>
                                                                                    <button type="button" class="close"
                                                                                        value="<?= $brand['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="brand_delete.php?id=<?= $brand['id'] ?>"
                                                                                    method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            value="<?= $brand['id'] ?>"
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
        require_once('../../layout/footer.php');
        ?>

    </div>
    <!--end wrapper-->

    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/brand_page.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->

</html>