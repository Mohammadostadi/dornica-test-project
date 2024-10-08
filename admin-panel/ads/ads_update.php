<?php

require_once('../../app/loader.php');
accessRedirect('ads_list.php');

$validator = new validator();
$id = securityCheck($_REQUEST['id']);
$ad = $db->where('id', $id)
    ->getOne('ads');

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])) {
    $title = securityCheck($_REQUEST['name']);
    $sort = securityCheck($_REQUEST['sort']);
    if (isset($_POST['check'])) {
        $checkList = $_POST['check'];
    }
    $validator->empty($title, 'name', 'فیلد عنوان شما نباید خالی باشد');
    $checkImage = $_FILES['fileToUpload']['name'];
    $picture = $validator->imageUpdate("../../assets/images/ads/", $_FILES["fileToUpload"], 'fileToUpload', $ad['image']);
    $validator->empty($sort, 'sort', 'فیلد ترتیب شما نباید خالی باشد');

    // Check if $uploadOk is set to 0 by an validator
    if ($validator->count_error() == 0) {
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if (!empty($checkImage)) {
            $db->where('id', $id)
                ->update('ads', [
                    'title' => $title,
                    'image' => $picture,
                    'sort' => $sort,
                    'status' => isset($checkList) ? 1 : 0
                ]);
            redirect('ads_list.php', 2);
        }
        $db->where('id', $id)
            ->update('ads', [
                'title' => $title,
                'sort' => $sort,
                'status' => isset($checkList) ? 1 : 0
            ]);
        redirect('ads_list.php', 2);
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
    <title>آپدیت تبلیغات</title>
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
                        <h6 class="mb-0 text-uppercase">آپدبت کردن تبلیغات</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data"
                            novalidate>
                            <div class="container">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <!-- <img src="../../assets/images/ads/08.png" alt=""> -->
                                        <input type='file' id="fileToUpload" name="fileToUpload" accept=".png, .jpg, .jpeg" required />
                                        <label for="fileToUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(<?= "../../".(isset($ad['image'])?$ad['image']:"assets/images/ads/default.png") ?>);">
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
                                <input type="text" class="form-control" name="name"
                                    value="<?= checkUpdate('name', $ad['title']) ?>" required>
                                <span class="text-danger"><?= $validator->show('name') ?></span>
                                <div class="invalid-feedback">
                                    فیلد عنوان نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">ترتیب</label>
                                <input type="text" class="form-control text-end" name="sort"
                                    value="<?= checkUpdate('sort', $ad['sort']) ?>" oninput='number(this)' required>
                                <span class="text-danger"><?= $validator->show('sort') ?></span>
                                <div class="invalid-feedback">
                                    فیلد ترتیب نباید خالی باشد
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                <div class="d-flex">
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="check"
                                            id="flexSwitchCheckChecked" <?= $ad['status'] == 1 ? 'checked' : ''; ?>>
                                    </div>
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="ads_list.php">برگشت</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"
                                                name="_insert">بروزرسانی</button>
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