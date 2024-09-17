<?php

require_once('../../app/loader.php');
$validator = new validator();

$id = securityCheck($_REQUEST['id']);
$products = $db->where('id', $id)
->getOne('products');

$categoryList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('category', null,'name, id');
$brandList = $db->where('status', 1)
->get('brand', null, 'id, name');

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $product = securityCheck($_REQUEST['product']);
    $description = securityCheck($_REQUEST['description']);
    $price = intval(str_replace(',', '', (securityCheck($_REQUEST['price']))));
    $date = securityCheck($_REQUEST['date']);
    $brand = securityCheck(implode(",", $_POST['brand_ids']));
    $endTime = securityCheck($_REQUEST['endTime']);
    $special = intval(str_replace(',', '', (securityCheck($_REQUEST['special']))));
    $qty = intval(str_replace(',', '', (securityCheck($_REQUEST['qty']))));
    $picture = $validator->imageUpdate("../../assets/images/products/", $_FILES["fileToUpload"], 'fileToUpload', $products['image']);
    if($special != 0 and !empty($price) and $special != $products['special']){
        $oldPrice = $price;
        $price = $price -  ($price*($special/100));
        if(empty($endTime)){
            $validator->set('endTime', 'فیلد اتمام  تاریخ تخفیف نمیتواند خالی باشد');
        }elseif(strlen($endTime) != 10){
            $validator->set('endTime', 'فیلد تاریخ شما نامعتبر میباشد');
        }
    }
    if(isset($_POST['check'])){
        $checkList = $_POST['check'];
    }
    $validator->empty($product, 'product', 'فیلد محصول شما نباید خالی باشد');
    $validator->empty($price, 'price', 'فیلد قیمت شما نباید خالی باشد');
    $validator->empty($date, 'date', 'فیلد تاریخ شما نباید خالی باشد');
    $validator->empty($brand, 'brand_ids', 'فیلد برند شما نباید خالی باشد');
    $validator->empty($qty, 'qty', 'فیلد تعداد محصول شما نباید خالی باشد');
    if(10 < strlen($date) or strlen($date) < 8){
        $validator->set('date', 'فیلد تاریخ شما نامعتبر میباشد');
    }
    if(!empty($date)){
        $date = changeDate($date);
    }
    if(!isset($_POST['category'])){
        $validator->set('category', 'فیلد دسته بندی شما نباید خالی باشد');
    }
    if ($validator->count_error() == 0) {
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if (isset($picture)) {
            $db->where('id', $id)
            ->update('products', [
                'name'=>$product,
                'oldprice'=>isset($oldPrice)?$oldPrice:$price,
                'price'=>$price,
                'description'=>$description,
                'category_id'=>(int)$_POST['category'],
                'brand_ids'=>$brand,
                'date'=>$date,
                'qty'=>$qty,
                'image'=>$picture,
                'special'=>$special,
                'end_time'=>$special==0?'0':$endTime,
                'status'=>isset($checkList)?1:0,
            ]);
            redirect('products_list.php', 2);
        }
        $db->where('id', $id)
        ->update('products', [
            'name'=>$product,
            'oldprice'=>isset($oldPrice)?$oldPrice:$price,
            'price'=>$price,
            'description'=>$description,
            'category_id'=>(int)$_POST['category'],
            'brand_ids'=>$brand,
            'date'=>$date,
            'qty'=>$qty,
            'special'=>$special,
            'end_time'=>$special==0?'0':$endTime,
            'status'=>isset($checkList)?1:0,
        ]);
        redirect('products_list.php', 2);
    }
}

?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php
        require_once('../../layout/css.php');
    ?>
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    
    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />

    <title>آپدیت کردن محصول</title>
</head>

<body>

<main class="page-content">
<?php
        require_once('../../layout/header.php');
        require_once('../../layout/asidebar.php');
    ?>
    <!--start wrapper-->
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">آپدبت کردن محصول</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <label for="category" class="form-label">دسته بندی</label>
                                        <select id="category" name="category"   class="form-control" required>
                                            <?php
                                            foreach($categoryList as $category){ ?>
                                                            <option <?= ((isset($_POST['category']) and $_POST['category'] == $category['id']) OR $products['category_id'] == $category['id']) ?"SELECTED":"" ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="text-danger"><?= $validator->show('category') ?></span>
                                                        <div class="invalid-feedback">
                                            فیلد دسته بندی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                                        <label for="brand" class="form-label">برند</label>
                                                        <select class="multiple-select"
                                                                title="هر چیزی را انتخاب کنید" multiple
                                                                name="brand_ids[]">
                                                                <?php foreach ($brandList as $brand) { ?>
                                                                    <option <?= ((isset($_POST['brand_ids']) and in_array($brand['id'], $_POST['brand_ids'])) or (in_array($brand['id'], explode(',', $products['brand_ids']))))?"selected":"" ?>
                                                                        value="<?= $brand['id'] ?>"> <?= $brand['name'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                            <span class="text-danger"><?= $validator->show('brand_ids') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد برند نباید خالی باشد
                                        </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">نام محصول</label>
                                        <input type="text" class="form-control" name="product" value="<?= checkUpdate('product', $products['name']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('product') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">قیمت</label>
                                        <input class="form-control text-end" name="price" id="price" value="<?= checkUpdate('price', $products['price']) ?>" oninput="number(this)" required>
                                        <span class="text-danger"><?= $validator->show('price') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد قیمت نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">تعداد محصول</label>
                                        <input type="text" class="form-control text-end" name="qty" id="qty" value="<?= checkUpdate('qty', $products['qty'])?>" oninput="number(this)" required>
                                        <span class="text-danger"><?= $validator->show('qty') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد تعداد نباید خالی باشد
                                        </div>
                                    </div>
                                    
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">تاریخ تولید</label>
                                                <input name="date" class="form-control datepicker text-end"  id="date" value="<?= checkUpdate('date', changeDate($products['date'], false)) ?>" required/>
                                                <span class="text-danger"><?= $validator->show('date') ?></span>
                                                <div class="invalid-feedback">
                                            فیلد تاریح تولید نباید خالی باشد
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">تخفیف</label>
                                        <input type="text" class="form-control text-end" name="special" id="special" value="<?= checkUpdate('special', $products['special']) ?>">
                                        <span class="text-danger"><?= $validator->show('special') ?></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">تاریخ اتمام تخفیف</label>
                                        <input class="form-control text-end" name="endTime" id="endTime" value="<?= checkUpdate('endTime', $products['end_time']) ?>">
                                        <span class="text-danger"><?= $validator->show('endTime') ?></span>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" id="editor1" rows="3" placeholder="توضیحات" name="description"><?= checkUpdate('description', $products['description']) ?></textarea>
                                    </div>
                                        <div class="col-12">
                                            <label class="form-label">تصویر</label>
                                            <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../../<?= $products['image']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                        </div>
                                        <div class="col-lg-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $products['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="products_list.php" class="btn btn-danger">برگشت</a>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" name="_insert">بروزرسانی</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <!--end page main-->
    
    </div>
    <!--end wrapper-->
</main>


<?php
        require_once('../../layout/js.php');
        separator('#price');
        separator('#qty');
        separator('#special');;
    ?>

<script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
<script src="../../assets/plugins/select2/js/select2.min.js"></script>
<script src="../../assets/js/form-select2.js"></script>
<script type="text/javascript">
    $("#date").persianDatepicker({formatDate: "YYYY/0M/0D"});
    $("#endTime").persianDatepicker({formatDate: "YYYY/0M/0D"});
</script>
<script src="../../assets/ckeditor/ckeditor.js"></script>
<script src="../../assets/ckeditor/adapters/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#editor1').ckeditor();
    });
</script>
<?php require_once('../../layout/update_image.php') ?>
</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>