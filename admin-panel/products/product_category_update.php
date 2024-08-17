<?php
require_once('../../app/loader.php');
$list = $db->where('parent_id', 0)
->orderBy('name', 'ASC')
->where('status', 1)
->get('category', null, 'name, id');
$validator = new validator();
$id = securityCheck($_REQUEST['id']);
$categories = $db->where('id', $id)
->getOne('category');
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_REQUEST['_insert'])){
        $name = securityCheck($_REQUEST['categoryName']);
        $sort = securityCheck($_REQUEST['sort']);
        if(isset($_POST['check'])){
            $check = $_POST['check'];
        }
        $validator->empty($name, 'name', 'فیلد عنوان نمیتواند خالی باشد');
        $validator->empty($sort, 'sort', 'فیلد ترتیب  نمیتواند خالی باشد');
        if($validator->count_error() == 0){
            $db->where('id', $id)
            ->update('category', [
                'name'=>$name,
                'parent_id'=>securityCheck($_REQUEST['parent']),
                'status'=>isset($check)?1:0,
                'sort'=>$sort,
            ]);
            redirect('products_categories_list.php', 2);
        }
    }

?>



<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../../layout/css.php');
    ?>

    <title>آپدیت کردن دسته بندی محصول</title>
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
                                <h6 class="mb-0 text-uppercase">آپدیت کردن دسته بندی محصول</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                <div class="col-6">
                                            <label class="form-label">نام</label>
                                            <input type="text" class="form-control" name="categoryName" value="<?= checkUpdate('categoryName', $categories['name']) ?>" required>
                                            <span class="text-danger"><?= $validator->show('name') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                </div>
                                <div class="col-6">
                                            <label class="form-label">ترتیب</label>
                                            <input type="text" class="form-control text-end" name="sort" value="<?= checkUpdate('sort', $categories['sort']) ?>" oninput="number(this)" required>
                                            <span class="text-danger"><?= $validator->show('sort') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد ترتیب نباید خالی باشد
                                        </div>
                                </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label">دسته بندی والد </label>
                                            <select name="parent" class="form-control">
                                                <option value="0">(اختیاری)</option>
                                                <?php 
                                                    foreach($list as $parent){ ?>
                                                        <option <?= $categories['parent_id'] == $parent['id']?"SELECTED":"" ?> value="<?= $parent['id'] ?>"><?= $parent['name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                            <span class="text-danger"><?= $validator->show('province') ?></span>
                                        </div>
                                        <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $categories['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="products_categories_list.php" class="btn btn-danger">برگشت</a>
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
    ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>