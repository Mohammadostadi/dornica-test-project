<?php
require_once('../../app/loader.php');
// require_once('../../app/Controller/gender.php');


$id = securityCheck($_GET['id']);
$admin = $db->where('id', $id)
    ->getOne('admin');

$validator = new validator();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_insert'])) {
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $username = securityCheck($_REQUEST['username']);
    $gender = securityCheck($_REQUEST['gender']);
    $role = securityCheck($_REQUEST['role']);
    if (isset($_POST['check'])) {
        $check = $_POST['check'];
    }
    $validator->empty('fname', $fname, 'فیلد نام شما نباید خالی باشد');
    $validator->empty('lname', $lname, 'فیلد نام خانوادگی شما نباید خالی باشد');
    $validator->empty('username', $username, 'فیلد نام کاربری شما نباید خالی باشد');
    $validator->empty('role', $role, 'فیلد  نقش  شما نباید خالی باشد');
    $validator->empty('gender', $gender, 'فیلد  جنسیت  شما نباید خالی باشد');
    if($_SESSION['user_role'] == 0)
        $picture = $validator->imageUpdate("../../assets/images/admin/", $_FILES["fileToUpload"], 'fileToUpload', $admin['image']);
    $validator->existValue('admin', 'username', $username, 'فیلد نام کاربری تکراری میباشد', $admin['username']);
    if ($gender == 0 and !isset($_POST['militaryService'])) {
        $validator->set('militaryService', 'فیلد خدمت سربازی شما اجباری میباشد');
    }

    if ($validator->count_error() == 0) {
        if($_SESSION['user_role'] == 0 and isset($picture)){
            $db->where('id', $id)
                ->update('admin', [
                    'first_name' => $fname,
                    'last_name' => $lname,
                    'username' => $username,
                    'image' => $picture,
                    'gender' => $gender,
                    'militaryService' => ($gender == 0) ? securityCheck($_POST['militaryService']) : null,
                    'status' => isset($check) ? 1 : 0,
                ]);
            redirect('admins_list.php', 2);
        }
        $db->where('id', $id)
            ->update('admin', [
                'first_name' => $fname,
                'last_name' => $lname,
                'username' => $username,
                'gender' => $gender,
                'militaryService' => ($gender == 0) ? securityCheck($_POST['militaryService']) : null,
                'status' => isset($check) ? 1 : 0,
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
                        <h6 class="mb-0 text-uppercase">آپدیت کردن ادمین</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <label class="form-label">نام </label>
                                <input type="text" class="form-control" name="fname"
                                    value="<?= checkUpdate('fname', $admin['first_name']) ?>" required>
                                <span class="text-danger"><?= $validator->show('fname') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lname"
                                    value="<?= checkUpdate('lname', $admin['last_name']) ?>" required>
                                <span class="text-danger"><?= $validator->show('lname') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نام خانوادگی نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" name="username"
                                    value="<?= checkUpdate('username', $admin['username']) ?>"
                                    oninput='usernamejs(this)' required>
                                <span class="text-danger"><?= $validator->show('username') ?></span>
                                <div class="invalid-feedback">
                                    فیلد نام کاربری نباید خالی باشد
                                </div>
                            </div>
                            

                            <?php if ($admin['role'] != 0) { ?>
                                <div class="col-lg-6">
                                    <label class="form-label">نقش</label>
                                    <select name="role" class="form-select" id="role" required>
                                        <option value="" selected>نقش</option>
                                        <option <?= ($admin['role'] == 1) ? "SELECTED" : "" ?> value="1">ادمین</option>
                                        <?= $_SESSION['user_role'] == 0 ? "<option " . (($admin['role'] == 2) ? "SELECTED" : "") . " value='2'>سوپر ادمین</option>" : "" ?>
                                        <option <?= ($admin['role'] == 3) ? "SELECTED" : "" ?> value="3">اپراتور</option>
                                    </select>
                                    <span class="text-danger"><?= $validator->show('role') ?></span>
                                    <div class="invalid-feedback">
                                        فیلد نقش نباید خالی باشد
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-lg-6">
                                <label class="form-label">جنسیت</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">جنسیت</option>
                                    <option <?= ((isset($_POST['gender']) and $_POST['gender'] == 0) or ($admin['gender'] == 0)) ? "SELECTED" : "" ?> value="0">مرد</option>
                                    <option <?= ((isset($_POST['gender']) and $_POST['gender'] == 1) or ($admin['gender'] == 1)) ? "SELECTED" : "" ?> value="1">زن</option>
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
                                    <option <?= ((isset($_POST['militaryService']) and $_POST['militaryService'] == 0) or ($admin['militaryService'] == 0)) ? "SELECTED" : "" ?> value="0">سربازی</option>
                                    <option <?= ((isset($_POST['militaryService']) and $_POST['militaryService'] == 1) or ($admin['militaryService'] == 1)) ? "SELECTED" : "" ?> value="1">معافیت</option>
                                    <option <?= ((isset($_POST['militaryService']) and $_POST['militaryService'] == 2) or ($admin['militaryService'] == 2)) ? "SELECTED" : "" ?> value="2">در حال انجام وظیفه
                                    </option>
                                    <option <?= ((isset($_POST['militaryService']) and $_POST['militaryService'] == 3) or ($admin['militaryService'] == 3)) ? "SELECTED" : "" ?> value="3">پایان خدمت</option>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد سربازی نباید خالی باشد
                                </div>
                            </div>
                            <?php
                            if ($_SESSION['user_role'] == 0) { ?>
                                <div class="col-12">
                                    <label class="form-label">تصویر</label>
                                    <div class="row">
                                        <div class="col-12 text-center bg-light my-3 rounded preview">
                                            <img src="../../<?= (file_exists('../../' . $admin['image']) and !empty($admin['image'])) ? $admin['image'] : 'assets/images/admin/default.png' ?>"
                                                class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                        </div>
                                        <div class="col-12">
                                            <input type="file" class="form-control" aria-label="file example"
                                                id="fileToUpload" name="fileToUpload">
                                        </div>
                                    </div>
                                    <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                </div>
                            <?php } ?>
                            <div class="col-lg-8">
                                <div class="d-flex">
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="check"
                                            id="flexSwitchCheckChecked" <?= $admin['status'] == 1 ? 'checked' : ''; ?>>
                                    </div>
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="admins_list.php">برگشت</a>
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
    <!--start wrapper-->
    <?php
    require_once('../../layout/js.php');
    require_once('../../layout/update_image.php');
    ?>
    <script>
        const gender = $('#gender').find('option:selected').val();
        if (gender == 0)
            $('#militaryService').removeClass('d-none');

        $('#gender').click(function () {
            const id = $(this).val();
            if (id == 0 && id != '') {
                $('#militaryService').removeClass('d-none');
            }
            else if (!$('#militaryService').hasClass('d-none')) {
                $('#militaryService').addClass('d-none');
            }
        })

    </script>
    <!-- <script>
    $('#gender').change(function () {
            const id = $(this).val();
            if(id == 0 && id != ''){
                changeGender(id);
            }else{
                $('#militaryService').html(' ');
            }
        });
        const current_gender = $('#gender').find('option:selected').val();
        const current_service = "<?= isset($_POST['militaryService']) ? $_POST['militaryService'] : $admin['militaryService'] ?>";
        if(current_gender == 0){
            if(current_service != '' && current_gender != ''){
                changeGender(current_gender, current_service);
            }
            if(current_service == '' && current_gender != ''){
                changeGender(current_gender);
            }
        }


        function changeGender(gender, militaryService = null){
            $.ajax({
                url:'admin_update.php',
                type:'POST',
                data:{
                    genderForm: gender,
                    militaryService: militaryService
                },
                success:function(msg) {
                    $('#militaryService').html(msg);
                }
        })}
</script> -->
    <!--end wrapper-->
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>