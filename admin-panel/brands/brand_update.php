<?php

require_once('../../app/loader.php');

$validator = new validator();
$id = $_REQUEST['id'];
$brand = $db->where('id', $id)
->getOne('brand');

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $title = securityCheck($_REQUEST['name']);
    
    if(isset($_POST['check'])){
        $check = $_POST['check'];
    }
    $checkImage = $_FILES['fileToUpload']['name'];
    $picture = $validator->imageUpdate("../../assets/images/logo/", $_FILES["fileToUpload"], 'fileToUpload', $brand['logo']);
    $validator->empty($title, 'name', 'فیلد عنوان نمیتواند خالی باشد');
    if ($validator->count_error() == 0) {
        if ($validator->count_error() == 0) {
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if(!empty($checkImage)){
            $db->where('id', $id)
                ->update('brand', [
                'name'=>$title,
                'logo'=>$picture,
                'status'=>isset($check)?1:0
            ]);
            redirect('brands_list.php', 2);
        }
        
            $db->where('id', $id)
                ->update('brand', [
                'name'=>$title,
                'status'=>isset($check)?1:0
            ]);
            redirect('brands_list.php', 2);
    }
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

    <title>آپدیت کردن برند</title>
</head>

<body>
<main class="page-content">
<?php
        require_once('../../layout/header.php');
        require_once('../../layout/asidebar.php');
    ?>
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">آپدیت کردن برند</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <label class="form-label">عنوان </label>
                                        <input type="text" class="form-control" name="name" value="<?= checkUpdate('name', $brand['name']) ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('name')? $validator->show('name'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">تصویر</label>
                                        <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../../<?= $brand['logo']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                        <span class="text-danger"><?= $validator->is_exist('fileToUpload')? $validator->show('fileToUpload'):'' ?></span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $brand['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="brands_list.php" class="btn btn-danger">برگشت</a>
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
</main>
<?php
        require_once('../../layout/js.php');
    ?>
    <?php require_once('../../layout/update_image.php') ?>
</body>



