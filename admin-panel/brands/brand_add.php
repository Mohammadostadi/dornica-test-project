<?php

require_once('../../app/loader.php');

$validator = new validator();

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $title = securityCheck($_REQUEST['name']);
    $picture = $validator->imageCheck("../../assets/images/logo/", $_FILES["fileToUpload"], 'fileToUpload');
    if ($validator->count_error() == 0) {
            $db->insert('brand', [
                'name'=>$title,
                'logo'=>$picture,
                'status'=>1
            ]);
            redirect('brands_list.php', 4);
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

    <title>اضافه کردن برند</title>
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
                                    <h6 class="mb-0 text-uppercase">اضافه کردن برند</h6>
                                    <hr/>
                                    <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                            <label class="form-label">عنوان </label>
                                            <input type="text" class="form-control" name="name" value="<?= checkExist('name') ?>" required>
                                            <span class="text-danger"><?= $validator->show('name') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">تصویر</label>
                                            <input type="file" class="form-control" aria-label="file example"  name="fileToUpload" required>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد تصویر نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="brands_list.php" class="btn btn-danger">برگشت</a>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary" name="_insert">ثبت</button>
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
    <script src="assets/js/brand_edit.js"></script>
</body>



