<?php
require_once('../../app/loader.php');


    $id = securityCheck($_GET['id']);
    $admin = $db->where('id', $id)
    ->getOne('admin');

$validator = new validator();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_insert'])){
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $username = securityCheck($_REQUEST['username']);
    $role = securityCheck($_REQUEST['role']);
    if(isset($_POST['check'])){
        $check = $_POST['check'];
    }
    $validator->empty('fname',  $fname,'فیلد نام شما نباید خالی باشد');
    $validator->empty('lname',  $lname,'فیلد نام خانوادگی شما نباید خالی باشد');
    $validator->empty('username',  $username,'فیلد نام کاربری شما نباید خالی باشد');
    $validator->empty('role',  $role, 'فیلد  نقش  شما نباید خالی باشد');
    $validator->existValue('admin', 'username', $username, 'فیلد نام کاربری تکراری میباشد', $admin['username']);
    $picture = $validator->imageUpdate("../../assets/images/ads/", $_FILES["fileToUpload"], 'fileToUpload', $admin['image']);

    if($validator->count_error() == 0){
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if(!empty($picture)){
            $db->where('id', $id)
            ->update('admin',[
                'first_name'=>$fname,
                'last_name'=>$lname,
                'username'=>$username,
                'image'=>$picture
            ]);
        }
        $db->where('id', $id)
        ->update('admin',[
            'first_name'=>$fname,
            'last_name'=>$lname,
            'username'=>$username,
        ]);
        redirect('admins_list.php', 2);
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
    <title>آپدیت ادمین</title>
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
                                <h6 class="mb-0 text-uppercase">آپدیت کردن ادمین</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" action="" method="post" novalidate enctype="multipart/form-data">
                                    <div class="col-6">
                                        <label class="form-label">نام </label>
                                        <input type="text" class="form-control" name="fname" value="<?= checkUpdate('fname', $admin['first_name']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('fname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="lname"value="<?= checkUpdate('lname', $admin['last_name']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('lname') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام خانوادگی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">نام کاربری</label>
                                        <input type="text" class="form-control" name="username" value="<?= checkUpdate('username', $admin['username']) ?>" oninput='usernamejs(this)' required>
                                        <span class="text-danger"><?= $validator->show('username') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام کاربری نباید خالی باشد
                                        </div>
                                    </div>
                                    <?php if($admin['role'] != 0){ ?>   
                                    <div class="col-6">
                                        <label class="form-label">نقش</label>
                                        <select name="role" class="form-select" id="role" required>
                                            <option value="" selected>نقش</option>
                                            <option <?=  ($admin['role'] == 1)?"SELECTED":"" ?> value="1">ادمین</option>
                                            <option <?= ($admin['role'] == 2)?"SELECTED":"" ?> value="2">سوپر ادمین</option>
                                        </select>
                                        <span class="text-danger"><?= $validator->show('role') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نقش نباید خالی باشد
                                        </div>
                                    </div>
                                    <?php }  ?>
                                    <div class="col-12">
                                            <label class="form-label">تصویر</label>
                                            <div class="row">
                                                <div class="col-12 text-center bg-light my-3 rounded preview">
                                                    <img src="../../<?= !empty($admin['image'])?$admin['image']:"assets/images/admin/default.png" ?>" class="rounded-circle shadow m-3" id="img"
                                                        width="100" height="100" alt="">
                                                </div>
                                                <div class="col-12">
                                                    <input type="file" class="form-control" aria-label="file example"
                                                        id="fileToUpload" name="fileToUpload">
                                                </div>
                                            </div>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                        </div>
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $admin['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                <a class="btn btn-danger" href="admins_list.php">برگشت</a>
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
<!--start wrapper-->
<?php 
    require_once('../../layout/js.php');
    require_once('../../layout/update_image.php');
?>
<!--end wrapper-->
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>