<?php 
session_start();
require_once('../app/Model/DB.php');
require_once('../app/Helper/validator.php');
require_once('../app/Controller/functions.php');
$validator = new validator();
if(isset($_POST['back']) and $_SERVER['REQUEST_METHOD'] == 'POST'){
    session_unset();
    session_destroy();
    redirect('sign-in.php');
}
if(isset($_POST['reset']) and $_SERVER['REQUEST_METHOD'] == 'POST'){

}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet" />
    <link href="../assets/fonts/googlefonts.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/fonts/bootstrap-icons.css" />

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />

    <title>بازیابی رمز عبور</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                                <img src="../assets/images/error/forgot-password-frent-img.jpg" class="img-fluid"
                                    alt="" />
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">ایجاد رمز عبور جدید</h5>
                                    <p class="card-text mb-5">
                                        ما درخواست بازنشانی رمز عبور شما را دریافت کردیم. لطفا رمز
                                        عبور جدید خود را وارد کنید!
                                    </p>
                                    <form class="form-body needs-validation my-3" novalidate action="" method="post">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputNewPassword" class="form-label">رمز عبور جدید</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input name="password_reset" type="email"
                                                        class="form-control radius-30 ps-5" id="inputNewPassword"
                                                        placeholder="رمز عبور جدید را وارد کنید" required />
                                                        <div class="invalid-feedback">
                                                            فیلد پسورد خالی باشد
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">رمز عبور را تایید
                                                    کنید</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" name="password_confirm"
                                                        class="form-control radius-30 ps-5" id="inputConfirmPassword"
                                                        placeholder="رمز عبور را تایید کنید" required />
                                                        <div class="invalid-feedback">
                                                            فیلد تکرار پسورد خالی باشد
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <button type="submit" name="reset"
                                                        class="btn btn-primary radius-30">
                                                        رمز عبور را تغییر دهید
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-12"> 
                                                <div class="d-grid">
                                                    <button name="back" type="submit" class="btn btn-light radius-30">
                                                        بازگشت به صفحه ورود
                                                    </button>
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
        </main>

        <!--end page main-->
    </div>
    <!--end wrapper-->

    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/pace.min.js"></script>
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
</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

</html>