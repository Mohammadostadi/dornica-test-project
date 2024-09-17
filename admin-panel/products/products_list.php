<?php
$prefix = 'products';
require_once('../../app/loader.php');
sortInTable($prefix, 'products_list', 'page');
$categoryList = $db->where('status', 1)
    ->get('category', null, 'id, name');
$brandList = $db->where('status', 1)
    ->get('brand', null, 'id, name');
$filter = new Filter('products', 'product_filter');
$data = [
    'products.name' => 'like',
    'brand_ids' => 'find_in_set',
    'category_id' => 'in',
    'status' => '=',
    'qty' => '=',
    'date' => 'date',
    'price' => 'price',
];
$product_category = isset($_GET['category'])?"products.category_id = " . securityCheck($_GET['category']):"";
$product_brand = isset($_GET['brand']) ? "products.brand_ids = " . securityCheck($_GET['brand']) : "";
$query = [
        'SELECT  COUNT(*) AS total FROM products LEFT JOIN category on category.id = products.category_id LEFT JOIN brand on brand.id = products.brand_ids WHERE'.(!empty($product_brand)?$product_brand:"").((!empty($product_brand) and !empty($product_category))?" AND ":"").((!empty($product_category))?$product_category:""),
        'SELECT products.id, products.name, price, products.status, image, date, qty, category.name AS category, products.brand_ids FROM products LEFT JOIN category on category.id = products.category_id LEFT JOIN brand on brand.id = products.brand_ids'.(!empty($product_brand)?' WHERE '.$product_brand:"").((!empty($product_brand) and !empty($product_category))?" AND ":"").((empty($product_brand) and !empty($product_category))?" WHERE ":"").((!empty($product_category))?$product_category:"")
    ];
    $con = $product_category.(!empty($product_category)?" AND ":"").$product_brand;
    $res = $filter->filterCheck($db, $data, 'product', 'products_list.php', $query, 7, $sortField, $sortOrder, $con);
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
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <title>لیست محصولات</title>
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
                <div class="ms-auto">
                    <div class="btn-group">
                        <?php if (isset($product_category) and !empty($product_category)) { ?>
                            <a class="btn btn-outline-secondary" href="products_categories_list.php">برگشت به دسته
                                بندی</a>
                        <?php } ?>
                        <?php if (isset($product_brand) and !empty($product_brand)) { ?>
                            <a class="btn btn-outline-secondary" href="../brands/brands_list.php">برگشت به لیست
                                برند</a>
                        <?php } ?>
                        <?= has_access('product_add.php') ?"<a class='btn btn-outline-secondary' href='product_add.php'> اضافه کردن داده جدید</a>":"" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست محصولات</h6>
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
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('name') ?>"
                                                            class="sort-table <?= sortActive('name') ?>"></a>
                                                        نام کتاب
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('category') ?>"
                                                            class="sort-table <?= sortActive('category') ?>"></a>
                                                        دسته بندی
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('brand') ?>"
                                                            class="sort-table <?= sortActive('brand') ?>"></a>
                                                        برند
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('price') ?>"
                                                            class="sort-table <?= sortActive('price') ?>"></a>
                                                        قیمت
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('qty') ?>"
                                                            class="sort-table <?= sortActive('qty') ?>"></a>
                                                        تعداد محصول
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('date') ?>"
                                                            class="sort-table <?= sortActive('date') ?>"></a>
                                                        تاریخ تولید
                                                    </th>
                                                    <?= (has_access('product_update.php') or has_access('product_delete.php')) ?"<th>اقدامات</th>":"" ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr id="<?= (isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product'])) ? "" : "filter-row" ?>"
                                            class="<?= (isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product'])) ? "" : "d-none" ?>">
                                            <form class=" d-flex justify-content-around align-content-start" id="form"
                                                action="products_list.php?page=1" method="post">
                                                <td></td>
                                                    <td class="col-lg-2 col-md-4"> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('products_name') ?>"
                                                            name="products_name" placeholder="نام کتاب"> </td>
                                                    <td>
                                                            <select class="multiple-select"
                                                                title="هر چیزی را انتخاب کنید" multiple
                                                                name="brand_ids[]">
                                                                <?php foreach ($brandList as $brand) { ?>
                                                                    
                                                                    <option <?= (isset($_SESSION['product_filter']['brand_ids']) and in_array($brand['id'], $_SESSION['product_filter']['brand_ids']))?"selected":"" ?>
                                                                        value="<?= $brand['id'] ?>"> <?= $brand['name'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                    </td>
                                                    <?php
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <select class="multiple-select" multiple
                                                                name="category_id[]">
                                                                <?php foreach ($categoryList as $category) { ?>
                                                                    <option <?= (isset($_SESSION['product_filter']['category_id']) and in_array($category['id'], $_SESSION['product_filter']['category_id']))?"selected":"" ?> value="<?= $category['id'] ?>">
                                                                        <?= $category['name'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('price') ?>"
                                                            name="price" id="price" placeholder="قیمت کتاب"> </td>
                                                    <td> <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('qty') ?>"
                                                            name="qty" placeholder="تعداد کتاب"> </td>
                                                            <td> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['product_filter']['status']) and $_SESSION['product_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['product_filter']['status']) and $_SESSION['product_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </td>
                                                    <td> <input dir="ltr" class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('date') ?>"
                                                            name="date" id="date" placeholder="تاریخ تولید"> </td>
                                                    <td class="text-center button-filter"> 
                                                    <div class="btn-group p-0 m-0">    
                                                    <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button>
                                                            <?php if ((isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product']))) { ?>
                                                            <button type="submit"
                                                                name="unFilter" id="delete_filter"
                                                                class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                                <?php } ?>
                                                                </div>
                                                        </td>
                                            </form>
                                        </tr>
                                                <?php foreach ($res as $key => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td class="productlist">
                                                            <a class="d-flex align-items-center gap-2" href="#">
                                                                <div class="product-box">
                                                                    <img src="../../<?= $value['image'] ?>" alt="">
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0 product-title"><?= $value['name'] ?>
                                                                    </h6>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td><span><?= $value['category'] ?></span></td>
                                                        <td><span>
                                                            <?php
                                                            $brand = $db->where("id IN ({$value['brand_ids']})")
                                                            ->getOne('brand', 'GROUP_CONCAT(name) AS brand');
                                                            echo $brand['brand'];
                                                            ?>
                                                        </span></td>
                                                        <td><span><?= number_format($value['price']) ?> تومان</span></td>
                                                        <td><span><?= $value['qty'] ?></span></td>
                                                        <td>
                                                            <?= status('active', $value['status']) ?>
                                                        </td>
                                                        <td><span><?= changeDate($value['date'], false) ?></span></td>
                                                        <?php if(has_access('product_update.php') or has_access('product_delete.php')){ ?>
                                                        <td>
                                                            <div>
                                                                <?php if(has_access('product_update.php')){ ?>
                                                                <a href="product_update.php?id=<?= $value['id'] ?>"
                                                                    class="text-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="ویرایش اطلاعات"
                                                                    data-bs-original-title="ویرایش اطلاعات"
                                                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <?php
                                                                }
                                                                if(has_access('product_delete.php')){
                                                                $productImage = $db->where('products_id', $value['id'])
                                                                    ->getValue('products_image', 'COUNT(*)');
                                                                $wishlist = $db->where('product_id', $value['id'])
                                                                    ->getValue('wishlist', 'COUNT(*)');
                                                                $order = $db->where('product_id', $value['id'])
                                                                    ->getValue('orders', 'COUNT(*)');
                                                                $cart = $db->where('product_id', $value['id'])
                                                                    ->getValue('cart', 'COUNT(*)');
                                                                $comment = $db->where('product_id', $value['id'])
                                                                    ->getValue('comment', 'COUNT(*)');
                                                                if (!empty($productImage) or !empty($wishlist) or !empty($order) or !empty($cart) or !empty($comment)) {
                                                                    $result = true;
                                                                } else {
                                                                    $result = false;
                                                                }
                                                                ?>
                                                                <button
                                                                    class="<?= $result ? 'disabled text-secondary' : 'open-confirm text-danger' ?>  btn border-0"
                                                                    value="<?= $value['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom"
                                                                    title="<?= $result ? 'قابل حذف نیست' : 'حذف' ?>"
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
        const path = 'product_delete.php'
    </script>
    <?php
    require_once('../../layout/js.php');
    separator('#price');
    ?>
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../../assets/js/form-select2.js"></script>
    <script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
    
            <!-- formatDate: "YYYY/0M/0D 0h:0m:0s" , -->
    <script type="text/javascript">
        $("#date").persianDatepicker({ 
        
            formatDate: "YYYY/0M/0D" ,
            "timePicker.enabled": true,
            "timePicker.step": 2

        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>