<?php

require_once('../app/loader.php');
$validator = new validator();
$id = securityCheck($_REQUEST['id']);
$team = $db->where('id', $id)
->getOne('teams');
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $email = securityCheck($_REQUEST['email']);
    $title = securityCheck($_REQUEST['title']);
    $instagram = securityCheck($_REQUEST['instagram']);
    $whatsapp = securityCheck($_REQUEST['whatsapp']);
    $telegram = securityCheck($_REQUEST['telegram']);
    $sort = securityCheck($_REQUEST['sort']);
    $picture = $validator->imageUpdate("../assets/images/team/", $_FILES["fileToUpload"], "fileToUpload", $team['image']);
    if(isset($_POST['check'])){
            $checkList = $_POST['check'];
        }
        $validator->empty($fname, 'fname', 'فیلد نام شما نباید خالی باشد');
        $validator->empty($lname, 'lname', 'فیلد نام خانوادگی شما نباید خالی باشد');
        $validator->empty($title, 'title', 'فیلد سمت شما نباید خالی باشد');
        $validator->empty($sort, 'sort', 'فیلد ترتیب شما نباید خالی باشد');
        $validator->empty($email, 'email', 'فیلد ایمیل شما نباید خالی باشد');
        $validator->existValue('teams', 'email', $email, 'ایمیل شما قبلا وارد شده است', $team['email']);
    if ($validator->count_error() == 0) {
        if (isset($picture)) {
            array_map('unlink', glob("../assets/images/upload/*.*"));
            $db->where('id', $id)
            ->update('teams', [
                'first_name'=>$fname,
                'last_name'=>$lname,
                'title'=>$title,
                'email'=>$email,
                'image'=>$picture,
                'telegram'=>$telegram,
                'instagram'=>$instagram,
                'whatsapp'=>$whatsapp,
                'status'=>isset($checkList)?1:0,
                'sort'=>$sort,
            ]);
            redirect('teams_list.php', 2);
        }
        $db->where('id', $id)
        ->update('teams', [
            'first_name'=>$fname,
            'last_name'=>$lname,
            'title'=>$title,
            'email'=>$email,
            'telegram'=>$telegram,
            'instagram'=>$instagram,
            'whatsapp'=>$whatsapp,
            'status'=>isset($checkList)?1:0,
            'sort'=>$sort,
        ]);
        redirect('teams_list.php', 2);
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
        require_once('../layout/css.php');
    ?>

    <title>آپدیت کردن تیم</title>
</head>

<body>

<main class="page-content">
<?php 
        require_once('../layout/header.php');
        require_once('../layout/asidebar.php');
    ?>
    <!--start wrapper-->
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">آپدیت کردن تیم</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-6">
                                        <label class="form-label">نام</label>
                                        <input type="text" class="form-control" name="fname" value="<?= checkUpdate('fname', $team['first_name']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('fname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="lname" value="<?= checkUpdate('lname', $team['last_name'] ) ?>" required>
                                        <span class="text-danger"><?= $validator->show('lname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام خانوادگی نباید خالی باشد
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label">سمت</label>
                                                <input type="text" name="title" class="form-control datepicker"  value="<?= checkUpdate('title', $team['title']) ?>" required/>
                                                <span class="text-danger"><?= $validator->show('title') ?></span>
                                                <div class="invalid-feedback">
                                            فیلد سمت نباید خالی باشد
                                        </div>
                                            </div>
                                        </div>
                                    <div class="col-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="text" class="form-control" name="email" value="<?= checkUpdate('email', $team['email']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('email') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ایمیل نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">ترتیب</label>
                                        <input type="number" class="form-control" name="sort" value="<?= checkUpdate('sort', $team['sort']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('sort') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ترتیب نباید خالی باشد
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label">تلگرام</label>
                                                <input type="text" name="telegram" class="form-control datepicker"  value="<?= checkUpdate('telegram', $team['telegram']) ?>"/>
                                                <span class="text-danger"><?= $validator->show('telegram') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label">واتساپ</label>
                                                <input type="text" name="whatsapp" class="form-control datepicker"  value="<?= checkUpdate('whatsapp', $team['whatsapp']) ?>"/>
                                                <span class="text-danger"><?= $validator->show('whatsapp') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label">اینستاگرام</label>
                                                <input type="text" name="instagram" class="form-control datepicker"  value="<?= checkUpdate('instagram', $team['instagram']) ?>"/>
                                                <span class="text-danger"><?= $validator->show('instagram') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">تصویر</label>
                                            <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../<?= $team['image']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                        </div>
                                        <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $team['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6 text-end">
                                                <div class="d-grid">
                                                    <a href="teams_list.php" class="btn btn-danger">برگشت</a>
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
        require_once('../layout/js.php');
    ?>
    <?php require_once('../layout/update_image.php') ?>
</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>