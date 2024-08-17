<?php
    require_once('../../app/loader.php');
    pageLimit('counter', 3, false);
     
    $col = ['members.fname AS member', 'ip', 'user_agent', 'date'];
    $res = $db->join('members', 'members.id = counter.member_id', ' LEFT')
    ->orderBy('counter.id', 'DESC')
    ->paginate('counter', $page, $col);

?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../../layout/css.php');
    ?>

    <title>آمار و بازدید</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php
        require_once('../../layout/header.php'); 
    ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php
        require_once('../../layout/asidebar.php'); 
    ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">تنظیمات</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست آمار بازدید</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <!-- <h6 class="mb-0 text-uppercase">واردات جدول داده</h6> -->
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">لیست آمار بازدید </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام مشتری</th>
                            <th>سیستم عامل کاربر</th>
                            <th>تاریخ بازدید</th>
                            <th>اقدامات</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($res as $counter) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td><?= $counter['member'] ?></td>
                                    <td><?= $counter['user_agent'] ?></td>
                                    <td dir="ltr" class="text-start"><?= showDate($counter['date']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="وضعیت جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                    
                                    <?php } ?>
                        </tbody>
                                    </table>
                                </div>
                                        <?php pagination($page, $pages); ?>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </main>
    <!--end page main-->


    <?php
            require_once('../../layout/footer.php');
        ?>

</div>
<!--end wrapper-->

<?php
        require_once('../../layout/js.php');
    ?>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>