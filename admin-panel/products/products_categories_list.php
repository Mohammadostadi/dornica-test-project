<?php
$prefix = 'cat2';
require_once('../../app/loader.php');
sortInTable($prefix, 'products_categories_list', 'page');
$parents = $db->where('parent_id', 0)->get('category', null, 'id, name');
$filter = new Filter('cat2', 'category_filter');
$data = [
    'cat2.name' => 'like',
    'cat2.parent_id' => '=',
    'cat2.status' => '=',
];
$filter->filterCheck($db, $data, 'category', 'products_categories_list.php');
pageLimit('category AS cat2', 10, false, $_SESSION['category_filter']['category']);
$filter->loopQuery($db, $_SESSION['category_filter']['category']);
$col = ['cat2.id', 'cat2.name', 'cat2.status', 'cat1.name AS parent', 'cat2.sort', 'cat2.parent_id'];
$res = $db->join('category AS cat1', 'cat1.id = cat2.parent_id', 'LEFT')
    ->orderBy($sortField, $sortOrder)
    ->paginate('category AS cat2', $page, $col);
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
                    <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'DESC') ? '#000' : '#ccc' ?>
                ;
            }
    
            .active::before {
                color:
                    <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'ASC') ? '#000' : '#ccc' ?>
                ;
            }
</style>

    <title>لیست دسته بندی محصول</title>

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
                            <li class="breadcrumb-item active" aria-current="page">دسته بندی های محصول</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('product_category_add.php') ? "<a class='btn btn-outline-secondary' href='product_category_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0"> لیست دسته محصول</h6>
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
                                                        <a href="<?= sort_link('parent') ?>"
                                                            class="sort-table <?= sortActive('parent') ?>"></a>
                                                        والد
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
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">

                                                <tr id="<?= (isset($_SESSION['category_filter']['category']) and !empty($_SESSION['category_filter']['category'])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION['category_filter']['category']) and !empty($_SESSION['category_filter']['category'])) ? "" : "d-none" ?>">
                                                    <form class="" id="form"
                                                        action="products_categories_list.php?page=1" method="post">
                                                        <td></td>
                                                            <td> <input
                                                                    class="col form-control" type="text"
                                                                    value="<?= $filter->is_exist('cat2_name') ?>" name="cat2_name"
                                                                    placeholder="عنوان"> </td>
                                                            <td> <select
                                                                    class="form-select text-secondary" name="cat2_parent_id"
                                                                    id="parent_id">
                                                                    <option value="" class="text-secondary">والد
                                                                    </option>
                                                                    <?php foreach ($parents as $parent) { ?>
                                                                        <option
                                                                            <?= (isset($_SESSION['category_filter']['cat2_parent_id']) and $_SESSION['category_filter']['cat2_parent_id'] == $parent['id']) ? 'selected' : '' ?>
                                                                            value="<?= $parent['id'] ?>">
                                                                            <?= $parent['name'] ?></option>
                                                                    <?php } ?>
                                                                </select> </td>
                                                                <td></td>
                                                            <td> <select
                                                                    class="form-select text-secondary" name="cat2_status"
                                                                    id="status">
                                                                    <option value="" class="text-secondary">وضعیت
                                                                    </option>
                                                                    <option
                                                                        <?= (isset($_SESSION['category_filter']['cat2_status']) and $_SESSION['category_filter']['cat2_status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                    <option
                                                                        <?= (isset($_SESSION['category_filter']['cat2_status']) and $_SESSION['category_filter']['cat2_status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                                </select> </td>
                                                            <td class="col-lg-2 col-md-4 text-center button-filter">
                                                                <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success"> اعمال فیلتر</button>
                                                                    <?php if ((isset($_SESSION['category_filter']['category']) and !empty($_SESSION['category_filter']['category']))) { ?>
                                                                    <button
                                                                        type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                        <?php } ?>
                                                                        </div>
                                                                </td>
                                                    </form>
                                                </tr>
                                                <?php foreach ($res as $key => $pcategory) { ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td><?= $pcategory['name'] ?></td>
                                                        <td><?= $pcategory['parent'] ?></td>
                                                        <td><?= $pcategory['sort'] ?></td>
                                                        <td>
                                                            <?= status('active', $pcategory['status']) ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="products_list.php?category=<?= $pcategory['id'] ?>"
                                                                    class="btn border-0 text-primary"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="نمایش لیست محصولات" aria-label="Views"><i
                                                                        class="lni lni-list"></i></a>
                                                                <?php if (has_access('product_category_update.php')) { ?>
                                                                    <a href="product_category_update.php?id=<?= $pcategory['id'] ?>"
                                                                        class="text-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                        data-bs-original-title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                    <?php
                                                                }
                                                                if (has_access('product_category_delete.php')) {
                                                                    $res = $db->where('category_id', $pcategory['id'])
                                                                        ->getValue('products', 'COUNT(*)');
                                                                    $parent = $db->where('parent_id', $pcategory['id'])
                                                                        ->getValue('category', 'COUNT(*)');
                                                                    if (!empty($parent) or !empty($res)) {
                                                                        $result = true;
                                                                    } else {
                                                                        $result = false;
                                                                    }
                                                                    ?>
                                                                    <button
                                                                        class="<?= $result ? 'disabled text-secondary' : 'open-confirm text-danger' ?>  btn border-0"
                                                                        value="<?= $pcategory['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom"
                                                                        title="<?= $result ? 'قابل حذف نیست' : ' حذف ' ?>"
                                                                        data-bs-original-title="حذف" aria-label="Delete"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                            <div class="modal fade"
                                                                id="exampleModal<?= $pcategory['id'] ?>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">

                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">حذف داده</h5>
                                                                            <button type="button" class="close"
                                                                                value="<?= $pcategory['id'] ?>"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="product_category_delete.php?id=<?= $pcategory['id'] ?>" method="post">
                                                                            <div class="modal-body">
                                                                                <h5>آیا مطمئن هستید؟</h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    value="<?= $pcategory['id'] ?>"
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