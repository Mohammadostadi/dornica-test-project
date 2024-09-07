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

    <style>


h1 {
    font-size: 20px;
    text-align: center;
    margin: 20px 0 20px;
    small {
        display: block;
        font-size: 15px;
        padding-top: 8px;
        color: gray;
    }
}

.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
    .avatar-edit {
        position: absolute;
        right: 8px;
        z-index: 1;
        top: 5px;
        input {
            display: none;
            + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all .2s ease-in-out;
                &:hover {
                    background: #f1f1f1;
                    border-color: #d6d6d6;
                }
                &:after {
                    content: "\eb46";
                    font: normal normal normal 16px/1'LineIcons';
                    color: #757575;
                    position: absolute;
                    top: 10px;
                    left: 0;
                    right: 0;
                    text-align: center;
                    margin: auto;
                }
            }
        }
    }
    .avatar-preview {
        width: 152px;
        height: 145px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    }
}
    </style>
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
    <script>
        function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#fileToUpload").change(function() {
        readURL(this);
    });
    </script>
</body>