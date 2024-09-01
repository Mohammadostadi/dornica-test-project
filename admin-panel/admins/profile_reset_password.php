<?php
require_once('../../app/loader.php');
$validator = new validator();
if($_GET['manager'])
    $res = $db->where('id', securityCheck($_GET['manager']))
    ->getValue('admin', 'COUNT(*)');
    if($res == 0 or !is_numeric($_GET['manager']))
            redirect('../../error/error-403.php');
if (isset($_POST['changePassword']) and $_SERVER['REQUEST_METHOD'] == 'POST') {
        $managerChanges = securityCheck($_GET['manager']);
    $newPassword = securityCheck($_POST['newPass']);
    $confirmPassword = securityCheck($_POST['confirmPassword']);

    $validator->empty($newPassword, 'newPass', 'فیلد رمز عبور جدید شما نباید خالی باشد');
    $validator->empty($confirmPassword, 'confirmPassword', 'فیلد تایید رمز عبور شما نباید خالی باشد');

    if ($newPassword != $confirmPassword) {
        $validator->set('confirmPassword', 'فیلد تایید پسورد با پسورد جدید مطابقت ندارد');
    }
    if ($validator->count_error() == 0) {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $db->where('id', isset($managerChanges)?$managerChanges:($_SESSION['user']))
            ->update('admin', [
                'password' => $hash
            ]);
        redirect(isset($managerChanges)?'admins_list.php':'profile_edit.php', 8);
    }
}
?>


<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

<head>
    <?php require_once("../../layout/css.php"); ?>

    <title>تغییر رمز عبور</title>

</head>

<body>
    <div class="wrapper">

        <?php require_once("../../layout/header.php"); ?>
        <?php require_once("../../layout/asidebar.php"); ?>

        <main class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">پروفایل</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> تغییر رمز عبور </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body py-3 mt-5 w-100 d-flex justify-content-center ">
                <div class="row d-flex justify-content-center w-75 ">
                    <div class="col-12 col-lg-4 d-flex w-100 ">
                        <div class="card border shadow-none w-100">
                            <div class="card-body w-100 ">
                                <div class="card-body">
                                    <form class="form-body needs-validation" novalidate action="" method="post"
                                        id="form">
                                        <div class="row g-3 ">
                                            <div class="row g-3  ">
                                                <div class="row d-flex justify-content-center mt-4 ">
                                                    <div class="col-12 col-lg-6">
                                                        <label for="newpass" class="form-label">رمز عبور جدید</label>
                                                        <div class="ms-auto position-relative">
                                                            <div
                                                                class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </div>
                                                            <input type="password" class="form-control radius-30 ps-5"
                                                                id="newPass" name="newPass"
                                                                value="<?= checkExist('newPass') ?>"
                                                                placeholder="رمز عبور جدید را وارد کنید" required >
                                                            <div class="invalid-feedback">
                                                                فیلد رمز عبور جدید خالی باشد
                                                            </div>
                                                            <span 
                                                                class="text-danger"><?= $validator->show('newPass') ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-center mt-4 ">
                                                    <div class="col-12 col-lg-6">
                                                        <label for="ConfirmPassword" class="form-label">رمز عبور را
                                                            تایید
                                                            کنید</label>
                                                        <div class="ms-auto position-relative">
                                                            <div
                                                                class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </div>
                                                            <input type="password" class="form-control radius-30 ps-5"
                                                                id="confirmPassword" name="confirmPassword"
                                                                value="<?= checkExist('confirmPassword') ?>"
                                                                placeholder="رمز عبور را تایید کنید" required>
                                                            <div class="invalid-feedback">
                                                                فیلد تایید رمز عبور خالی باشد
                                                            </div>
                                                            <span
                                                                class="text-danger"><?= $validator->show('confirmPassword') ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-center mt-4 ">
                                                    <div class="col-12 col-lg-6  d-flex justify-content-around ">
                                                        <!-- <div class="d-grid gap-3"> -->

                                                        <button type="submit" name="changePassword"
                                                            class="btn btn-primary radius-30">رمز عبور را
                                                            تغییر دهید</button>
                                                        <a type="submit"
                                                            onclick="location.href='<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php' ?>'"
                                                            class="btn btn-light radius-30">بازگشت</a>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("../../layout/footer.php"); ?>
        </main>
    </div>
    <?php require_once("../../layout/js.php"); ?>

        <script>
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>

        <!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

</html>