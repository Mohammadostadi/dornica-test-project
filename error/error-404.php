
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/pages-errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->
<head>
<?php require_once('../layout/css.php'); ?>

    <title>صفحه ارور-404</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
<?php 
    require_once('../layout/header.php'); 
    require_once('../layout/asidebar.php'); 
?>

    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">صفحات</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">خطای 404</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="card py-5">
                    <div class="row g-0">
                        <div class="col col-xl-5 text-center">
                            <div class="card-body p-4">
                                <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span class="text-success">4</span></h1>
                                <h2 class="font-weight-bold display-4">گمشده در فضا</h2>
                                <p>تو به لبه ی هستی رسیده ای.
                                    <br>صفحه مورد نظر شما یافت نشد.
                                    <br>نگران نباشید و به صفحه قبل برگردید.</p>
                                <div class="mt-5"> <a href="../index.php" class="btn btn-primary btn-lg px-md-5 radius-30">صفحه اصلی</a>
                                <?php $prev_url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'../index.php' ?>
                                    <a href="javascript:;" onclick="location.href='<?= $prev_url ?>'" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">بازگشت</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <img src="../assets/images/error/404-error.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </main>
    <!--end page main-->
    <?php require_once('../layout/footer.php'); ?>

</div>
<!--end wrapper-->


<?php require_once('../layout/js.php'); ?>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/pages-errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->
</html>