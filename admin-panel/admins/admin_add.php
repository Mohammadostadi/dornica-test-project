<?php
require_once('../../app/loader.php');
// require_once('../../app/Controller/gender.php');


// var_dump($_POST['militaryService']);die;
$validator = new validator();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_insert'])) {
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $username = securityCheck($_REQUEST['username']);
    $role = securityCheck($_REQUEST['role']);
    $gender = securityCheck($_REQUEST['gender']);
    $password = securityCheck($_REQUEST['password']);
    $validator->empty($fname, 'fname', 'فیلد نام شما نباید خالی باشد');
    $validator->empty($lname, 'lname', 'فیلد نام خانوادگی شما نباید خالی باشد');
    $validator->empty($username, 'username', 'فیلد نام کاربری شما نباید خالی باشد');
    $validator->empty($role, 'role', 'فیلد نام کاربری شما نباید خالی باشد');
    $validator->empty($password, 'password', 'فیلد پسورد شما نباید خالی باشد');
    if ($gender == '') {
        $validator->set('gender', 'فیلد جنسیت شما نباید خالی باشد');
    }
    if ($gender == 0 and !isset($_POST['militaryService'])) {
        $validator->set('militaryService', 'فیلد خدمت سربازی شما اجباری میباشد');
    }
    $validator->existValue('admin', 'username', $username, 'فیلد نام کاربری تکراری میباشد');
    if ($validator->count_error() == 0) {
        $db->insert('admin', [
            'first_name' => $fname,
            'last_name' => $lname,
            'username' => $username,
            'gender' => $gender,
            'militaryService' => ($gender == 0) ? securityCheck($_POST['militaryService']) : null,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
            'status' => 1
        ]);
        redirect('admins_list.php', 4);
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
    <title>افزودن ادمین</title>
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
                        <h6 class="mb-0 text-uppercase">اضافه کردن ادمین</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام </label>
                                <input type="text" class="form-control" name="fname" value="<?= checkExist('fname') ?>"
                                    required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <span class="text-danger"><?= $validator->show('fname') ?></span>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lname" value="<?= checkExist('lname') ?>"
                                    required>
                                <span class="text-danger"><?= $validator->show('lname') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نام خانوادگی نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" name="username"
                                    value="<?= checkExist('username') ?>" oninput='usernamejs(this)' required>
                                <span class="text-danger"><?= $validator->show('username') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نام کاربری نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نقش</label>
                                <select name="role" class="form-select" id="role" required>
                                    <option value="" selected>نقش</option>
                                    <option <?= (isset($_POST['role']) and $_POST['role'] == 1) ? "SELECTED" : "" ?>
                                        value="1">
                                        ادمین</option>
                                    <option <?= (isset($_POST['role']) and $_POST['role'] == 2) ? "SELECTED" : "" ?>
                                        value="2">
                                        سوپر ادمین</option>
                                    <option <?= (isset($_POST['role']) and $_POST['role'] == 3) ? "SELECTED" : "" ?>
                                        value="3">
                                        اپراتور</option>
                                </select>
                                <span class="text-danger"><?= $validator->show('role') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نقش را انتخاب کنید
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">کلمه عبور</label>
                                <input type="password" class="form-control" name="password"
                                    value="<?= checkExist('password') ?>" oninput='passwordjs(this)' required>
                                <span class="text-danger"><?= $validator->show('password') ?></span>
                                <div class="invalid-feedback">
                                    فیلد پسورد نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">جنسیت</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">جنسیت</option>
                                    <option <?= (isset($_POST['gender']) and $_POST['gender'] == 0) ? "SELECTED" : "" ?>
                                        value="0">مرد</option>
                                    <option <?= (isset($_POST['gender']) and $_POST['gender'] == 1) ? "SELECTED" : "" ?>
                                        value="1">زن</option>
                                </select>
                                <span class="text-danger"><?= $validator->show('gender') ?></span>
                                <div class="invalid-feedback">
                                    فیلد جنسیت نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 d-none" id="militaryService">
                                <label class="form-label">نظام وظیفه</label>

                                <select name="militaryService" class="form-select" required>
                                    <option value="">نظام وظیفه</option>
                                    <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 0)?"SELECTED":"" ?> value="0">سربازی</option>
                                    <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 1)?"SELECTED":"" ?> value="1">معافیت</option>
                                    <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 2)?"SELECTED":"" ?> value="2">در حال انجام وظیفه</option>
                                    <option <?= (isset($_POST['militaryService']) and $_POST['militaryService'] == 3)?"SELECTED":"" ?> value="3">پایان خدمت</option>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد سربازی نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="admins_list.php">برگشت</a>
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

        </main>
    </div>
    <!--start wrapper-->
    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/admin_add_page.js"></script>
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>