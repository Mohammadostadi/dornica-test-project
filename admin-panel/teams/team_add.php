<?php

require_once('../../app/loader.php');
$validator = new validator();


if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $email = securityCheck($_REQUEST['email']);
    $title = securityCheck($_REQUEST['title']);
    $instagram = securityCheck($_REQUEST['instagram']);
    $whatsapp = securityCheck($_REQUEST['whatsapp']);
    $telegram = securityCheck($_REQUEST['telegram']);
    $picture = $validator->imageCheck("../../assets/images/team/", $_FILES["fileToUpload"], "fileToUpload");
    $validator->empty($fname, 'fname', 'فیلد نام شما نباید خالی باشد');
    $validator->empty($lname, 'lname', 'فیلد نام خانوادگی شما نباید خالی باشد');
    $validator->empty($title, 'title', 'فیلد سمت شما نباید خالی باشد');
    $validator->empty($email, 'email', 'فیلد ایمیل شما نباید خالی باشد');
    $validator->existValue('teams', 'email', $email, 'ایمیل شما قبلا وارد شده است');

    if ($validator->count_error() == 0) {
            $db->insert('teams', [
                'first_name'=>$fname,
                'last_name'=>$lname,
                'title'=>$title,
                'email'=>$email,
                'image'=>$picture,
                'telegram'=>$telegram,
                'instagram'=>$instagram,
                'whatsapp'=>$whatsapp,
                'status'=>1,
                'sort'=>sortTable('teams'),
            ]);
            redirect('teams_list.php', 4);
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

    <title>اضافه کردن تیم</title>
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
                                <h6 class="mb-0 text-uppercase">اضافه کردن تیم</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <label class="form-label">نام</label>
                                        <input type="text" class="form-control" name="fname" value="<?= checkExist('fname') ?>" required>
                                        <span class="text-danger"><?= $validator->show('fname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="lname" value="<?= checkExist('lname') ?>" required>
                                        <span class="text-danger"><?= $validator->show('lname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام خانوادگی نباید خالی باشد
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">سمت</label>
                                                <input type="text" name="title" class="form-control datepicker"  value="<?= checkExist('title') ?>" required/>
                                                <span class="text-danger"><?= $validator->show('title') ?></span>
                                                <div class="invalid-feedback">
                                            فیلد سمت نباید خالی باشد
                                        </div>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="text" class="form-control" name="email" value="<?= checkExist('email') ?>" required>
                                        <span class="text-danger"><?= $validator->show('email') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ایمیل نباید خالی باشد
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">تلگرام</label>
                                                <input type="text" name="telegram" class="form-control datepicker"  value="<?= checkExist('telegram') ?>"/>
                                                <span class="text-danger"><?= $validator->show('telegram') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">واتساپ</label>
                                                <input type="text" name="whatsapp" class="form-control datepicker"  value="<?= checkExist('whatsapp') ?>"/>
                                                <span class="text-danger"><?= $validator->show('whatsapp') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">اینستاگرام</label>
                                                <input type="text" name="instagram" class="form-control datepicker"  value="<?= checkExist('instagram') ?>"/>
                                                <span class="text-danger"><?= $validator->show('instagram') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">تصویر</label>
                                            <input type="file" class="form-control" aria-label="file example" name="fileToUpload" required>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد تصویر نباید خالی باشد
                                        </div>
                                        </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-6 text-end">
                                                <div class="d-grid">
                                                    <a href="teams_list.php" class="btn btn-danger">برگشت</a>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
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
    <!--end wrapper-->
</main>

<?php 
        require_once('../../layout/js.php');
    ?>
    <script src="assets/js/team_edit.js" ></script>
</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>