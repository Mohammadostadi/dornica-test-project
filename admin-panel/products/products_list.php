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
        'name'=>'like',
        'brand_id'=>'in',
        'category_id'=>'in',
        'status'=>'=',
        'qty'=>'=',
        'date'=>'date',
        'price'=>'price',
    ];
    $filter->filterCheck($db, $data, 'product', 'products_list.php');
    $col = ['products.id', 'products.name', 'price', 'products.status', 'image', 'date', 'qty', 'category.name AS category', 'brand.name AS brand'];
    pageLimit('products', 3, false, $_SESSION['product_filter']['product']);
    $filter->loopQuery($db, $_SESSION['product_filter']['product']);
    $res = $db->join('category', 'category.id = products.category_id', 'LEFT')
    ->join('brand', 'brand.id = products.brand_id', 'LEFT')
    ->orderBy($sortField, $sortOrder)
    ->paginate(
        'products', $page, $col
    );

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
                    <a class="btn btn-outline-secondary" href="product_add.php"> اضافه کردن داده جدید</a>
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
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product']))?"":"filter-row"?>" class="<?= (isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product']))?"":"d-none"?>">
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="products_list.php?page=1" method="post" >
                                        <div class="row g-3">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('name') ?>" name="name" placeholder="نام کتاب" > </div>
                                    <div class="col-lg-4 col-md-6" >
                                        <div class="d-flex align-items-center">
                                            <label class="mx-2" for="">برند:</label>
                                            <select class="multiple-select" title="هر چیزی را انتخاب کنید" multiple name="brand_id[]">
                                                <?php foreach($brandList as $brand){
                                                            if(isset($_SESSION['product_filter']['brand_id'])){ 
                                                                foreach($_SESSION['product_filter']['brand_id'] as $brandSelect){ 
                                                                    $brand_select = (isset($brandSelect) and $brandSelect == $brand['id'])?"SELECTED":'';
                                                                }
                                                            } ?>
                                                            <option <?= isset($brand_select)? $brand_select:"" ?> value="<?= $brand['id'] ?>"> <?= $brand['name'] ?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                            </div>
                                            <?php 
                                            ?>
                                    <div class="col-lg-4 col-md-6" >
                                        <div class="d-flex align-items-center">
                                            <label class="mx-2" for="">دسته بندی:</label> 
                                        <select class="multiple-select" multiple name="category_id[]">
                                                <?php foreach($categoryList as $category){
                                                            if(isset($_SESSION['product_filter']['category_id'])){ 
                                                                foreach($_SESSION['product_filter']['category_id'] as $categorySelect){ 
                                                                    $category_select = (isset($categorySelect) and $categorySelect == $category['id'])?"SELECTED":"";
                                                                }
                                                            } ?>
                                                            <option <?= isset($category_select)? $category_select:"" ?> value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                            </div>
                                            <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="status" id="status">
                                                <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['product_filter']['status']) and $_SESSION['product_filter']['status']== 1) ? 'selected' : '' ?> value="1">فعال</option>
                                        <option <?= (isset($_SESSION['product_filter']['status']) and $_SESSION['product_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('qty') ?>" name="qty" placeholder="تعداد کتاب" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('price') ?>" name="price" id="price" placeholder="قیمت کتاب" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= $filter->is_exist('date') ?>" name="date" id="date" placeholder="تاریخ تولید" > </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button></div>
                                    <?php if((isset($_SESSION['product_filter']['product']) and !empty($_SESSION['product_filter']['product']))){ ?>
                                        <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
                                    <?php } ?>
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
                            <a href="<?= sort_link('name') ?>" class="sort-table <?= sortActive('name') ?>"></a>
                                نام کتاب</th>
                            <th>
                            <a href="<?= sort_link('category') ?>" class="sort-table <?= sortActive('category') ?>"></a>
                                دسته بندی</th>
                            <th>
                            <a href="<?= sort_link('brand') ?>" class="sort-table <?= sortActive('brand') ?>"></a>
                                برند</th>
                            <th>
                            <a href="<?= sort_link('price') ?>" class="sort-table <?= sortActive('price') ?>"></a>
                                قیمت</th>
                            <th>
                            <a href="<?= sort_link('qty') ?>" class="sort-table <?= sortActive('qty') ?>"></a>
                                تعداد محصول</th>
                            <th>
                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                وضعیت</th>
                            <th>
                            <a href="<?= sort_link('date') ?>" class="sort-table <?= sortActive('date') ?>"></a>
                                تاریخ تولید</th>
                            <th>اقدامات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php  foreach($res as $key=>$value){ ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="productlist">
                                        <a class="d-flex align-items-center gap-2" href="#">
                                            <div class="product-box">
                                                <img src="../../<?= $res[$key]['image'] ?>" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 product-title"><?= $value['name'] ?></h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td><span><?= $value['category'] ?></span></td>
                                    <td><span><?= $value['brand'] ?></span></td>
                                    <td><span><?= number_format($value['price']) ?> تومان</span></td>
                                    <td><span><?= $value['qty'] ?></span></td>
                                    <td>
                                        <?= status('active', $value['status']) ?>
                                    </td>
                                    <td><span><?= changeDate($value['date'], false) ?></span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="product_update.php?id=<?= $value['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <?php
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
                                                if(!empty($productImage) or !empty($wishlist) or !empty($order) or !empty($cart) or !empty($comment)){
                                                    $result = true;
                                                }else{
                                                    $result = false;
                                                }
                                            ?>
                                            <button class="<?= $result?'disabled text-secondary':'open-confirm text-danger'?>  btn border-0" value="<?= $value['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $result?'قابل حذف نیست':'حذف' ?>" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
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
<script>
    const path = 'product_delete.php'
</script>
<?php
        require_once('../../layout/js.php');
        separator('#price');
    ?>
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../../assets/js/form-select2.js"></script>
<script type="text/javascript" src="../assets/datePiker/js/persianDatepicker.min.js"></script>
<script type="text/javascript">
    $("#date").persianDatepicker({formatDate: "YYYY/0M/0D"});
</script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>