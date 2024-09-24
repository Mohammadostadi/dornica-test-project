<?php

require_once('../../app/loader.php');
$id = securityCheck($_REQUEST['id']);
$setting = $db->where('id', $id)
->getOne('setting');
if($id != 1 or empty($setting)){
    redirect('../../error/error-404.php');
}
$validator = new validator();

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $title = securityCheck($_REQUEST['name']);
    $phone = securityCheck($_REQUEST['phone']);
    $instagram = securityCheck($_REQUEST['instagram']);
    $whatsapp = securityCheck($_REQUEST['whatsapp']);
    $telegram = securityCheck($_REQUEST['telegram']);
    $description = securityCheck($_REQUEST['description']);
    $address = securityCheck($_REQUEST['address']);
    $email = securityCheck($_REQUEST['email']);
    if(isset($_POST['check'])){
        $checkList = $_POST['check'];
    }
    $validator->empty($title, 'name', 'فیلد عنوان شما نباید خالی باشد');
    $validator->empty($email, 'email', 'فیلد ایمیل شما نباید خالی باشد');
    $validator->empty($phone, 'phone', 'فیلد شماره تلفن شما نباید خالی باشد');
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validator->set('email', 'فرمت ایمیل صحیح نمیباشد');  
    }
    $picture = $validator->imageUpdate("../../assets/images/setting/", $_FILES["fileToUpload"], "fileToUpload", $setting['logo']);
    if ($validator->count_error() == 0) {
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if(isset($picture)){
            $db->update('setting', [
                'title'=>$title,
                'instagram'=>$instagram,
                'whatsapp'=>$whatsapp,
                'telegram'=>$telegram,
                'description'=>$description,
                'address'=>$address,
                'email'=>$email,
                'phone'=>$phone,
                'logo'=>$picture,
                'status'=>1
            ]);
            redirect('settings.php', 2);
        }
        $db->update('setting', [
            'title'=>$title,
            'instagram'=>$instagram,
            'whatsapp'=>$whatsapp,
            'telegram'=>$telegram,
            'description'=>$description,
            'address'=>$address,
            'email'=>$email,
            'phone'=>$phone,
            'status'=>1
        ]);
        header('Location:setting_update.php?id=1');
    
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
    <title>تنظیمات</title>
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
                                <h6 class="mb-0 text-uppercase">تنظیمات</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="setting_update.php?id=1" method="post" enctype="multipart/form-data">
                                    <div class="col-6">
                                        <label class="form-label">عنوان </label>
                                        <input type="text" class="form-control" name="name" value="<?= checkUpdate('name', $setting['title']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('name') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label">تلگرام</label>
                                            <input type="text" name="telegram" class="form-control datepicker"  value="<?= checkUpdate('telegram', $setting['telegram']) ?>"/>
                                            <span class="text-danger"><?= $validator->show('telegram') ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label">واتساپ</label>
                                            <input type="text" name="whatsapp" class="form-control datepicker"  value="<?= checkUpdate('whatsapp', $setting['whatsapp']) ?>"/>
                                            <span class="text-danger"><?= $validator->show('whatsapp') ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label">اینستاگرام</label>
                                            <input type="text" name="instagram" class="form-control datepicker"  value="<?= checkUpdate('instagram', $setting['instagram']) ?>"/>
                                            <span class="text-danger"><?= $validator->show('instagram') ?></span>
                                        </div>
                                    </div>
                                <div class="col-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="text" class="form-control" name="email" value="<?= checkUpdate('email', $setting['email']) ?>">
                                    <span class="text-danger"><?= $validator->show('email') ?></span>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">شماره تلفن</label>
                                    <input type="text" class="form-control" name="phone" value="<?= checkUpdate('phone', $setting['phone']) ?>" oninput="number(this)" required>
                                    <span class="text-danger"><?= $validator->show('phone') ?></span>
                                    <div class="invalid-feedback">
                                            فیلد شماره نباید خالی باشد
                                        </div>
                                </div>
                                <div class="col-12">
                                        <label class="form-label">آدرس</label>
                                        <textarea class="form-control" rows="3" placeholder="توضیحات" name="address"><?= checkUpdate('address', $setting['address']) ?></textarea>
                                    </div>
                                <div class="col-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" id="editor1" rows="3" placeholder="توضیحات" name="description"><?= checkUpdate('description', $setting['description']) ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">لوگو</label>
                                        <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../../<?= $setting['logo']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                        <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-2">
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
    <script src="../../assets/ckeditor/ckeditor.js"></script>
    <script src="../../assets/ckeditor/adapters/jquery.js"></script>
    <script src="assets/js/setting.js"></script>
    
    <?php require_once('../../layout/update_image.php') ?>
</body>



