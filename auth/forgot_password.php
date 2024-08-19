<?php 

session_start();

require_once('../app/Model/DB.php');
require_once('../app/Helper/validator.php');
require_once('../app/Controller/functions.php');
$validator = new validator();
if(isset($_POST['forgotPassword']) and $_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = securityCheck($_POST['username']);
    $validator->empty($username, 'username', 'فیلد نام کاربری شما خالی باشد');
    if($validator->count_error() == 0){
        $userId = $db->where('username', $username)
        ->getValue('admin', 'id');
        if(!is_null($userId)){
            $_SESSION['password'] = $userId;
            redirect('reset_password.php');
        }
        $validator->set('username', 'فیلد نام کاربری موجود نمیباشد');
    }
}

?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:29 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="../assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/bootstrap-icons.css">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />

    <title>فراموشی رمز عبور</title>
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
                            <img src="../assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title">رمز عبور را فراموش کرده اید؟</h5>
                                <p class="card-text mb-5">شناسه ایمیل ثبت شده خود را برای بازنشانی رمز عبور وارد کنید</p>
                                <form class="form-body needs-validation" novalidate action="" method="post" >
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmailid" class="form-label">نام کاربری</label>
                                            <input type="username" name="username" class="form-control form-control-lg radius-30" id="inputEmailid" placeholder=" نام کاربری" required>
                                            <div class="invalid-feedback">
                                                فیلد نام کاربری خالی باشد
                                            </div>
                                            <span class="text-danger"><?= $validator->show('username') ?></span>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-3">
                                                <button type="submit" name="forgotPassword" class="btn btn-lg btn-primary radius-30">ارسال</button>
                                                <a href="sign-in.php" class="btn btn-lg btn-light radius-30">بازگشت به صفحه ورود</a>
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


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->
</html>