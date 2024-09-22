<?php

require_once('../../app/loader.php');

$validator = new validator();
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])) {
    $title = securityCheck($_REQUEST['name']);
    $picture = $validator->imageCheck("../../assets/images/ads/", $_FILES["fileToUpload"], 'fileToUpload');
    $validator->empty($title, 'name', 'فیلد عنوان شما نباید خالی باشد');
    if ($validator->count_error() == 0) {
        $db->insert('ads', [
            'title' => $title,
            'image' => $picture,
            'sort' => sortTable('ads'),
            'status' => 1
        ]);
        redirect('ads_list.php', 4);
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
    <link rel="stylesheet" href="assets/style/ads_page.css">
    <title>افزودن تبلیغات</title>
</head>

<body>
    <div class="wrapper container my-5">
    <main class="page-content">
        <?php
        require_once('../../layout/header.php');
        require_once('../../layout/asidebar.php');
        ?>

            <!--start content-->
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">اضافه کردن تبلیغات</h6>
                        <hr />
                        <form class="row g-3 needs-validation" novalidate action="" method="post"
                            enctype="multipart/form-data">
                            <div class="container">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="fileToUpload" name="fileToUpload" accept=".png, .jpg, .jpeg" required />
                                        <label for="fileToUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(../../assets/images/ads/default.png);">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                    <div class="invalid-feedback">
                                        فیلد تصویر نباید خالی باشد
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">عنوان </label>
                                <input type="text" class="form-control" name="name" value="<?= checkExist('name') ?>"
                                    required>
                                <span class="text-danger"><?= $validator->show('name') ?></span>
                                <div class="invalid-feedback">
                                    فیلد عنوان نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="ads_list.php">برگشت</a>
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


        </main>
    </div>
    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/ads_add_page.js"></script>
</body>