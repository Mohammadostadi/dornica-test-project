<?php
    $prefix = 'comment';
    require_once('../app/loader.php');
    sortInTable($prefix, 'comments_list', 'page');
    $col = ['products.name AS product', 'comment.name', 'comment.subject', 'comment.description', 'ip', 'comment.email', 'comment.status', 'rate', 'comment.setdate'];
    
    $filter = new Filter('comment', 'comment_filter');
    $data = [
        'products.name'=>'like',
        'comment.subject'=>'like',
        'comment.status'=>'=',
    ];
    $query = [
        'SELECT  COUNT(*) AS total FROM comment LEFT JOIN products on products.id = comment.product_id WHERE',
        'SELECT SQL_CALC_FOUND_ROWS products.name AS product, comment.name, comment.subject, comment.description, ip, comment.email, comment.status, rate, comment.setdate FROM comment LEFT JOIN members on members.id = comment.member_id LEFT JOIN products on products.id = comment.product_id'
    ];
    $res = $filter->filterCheck($db, $data, 'comment', 'comments_list.php', $query, 3, $sortField, $sortOrder);
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../layout/css.php');
    ?>

    <title>لیست کامنت ها</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php
        require_once('../layout/header.php'); 
    ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php
        require_once('../layout/asidebar.php'); 
    ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">نظرات و پیام ها</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست نظرات</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            <div class="btn-group">
                <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
            </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0 text-uppercase">لیست کامنت ها</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['comment_filter']['comment']) and !empty($_SESSION['comment_filter']['comment']))?"":"filter-row"?>" >
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="comments_list.php?page=1" method="post" >
                                        <div class="row g-3">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['comment_filter']['products_name'])?$_SESSION['comment_filter']['products_name']:"" ?>" name="products_name" placeholder="محصول" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['comment_filter']['comment_subject'])?$_SESSION['comment_filter']['comment_subject']:"" ?>" name="comment_subject" placeholder="عنوان" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="comment_status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['comment_filter']['comment_status']) and $_SESSION['comment_filter']['comment_status']== 0) ? 'selected' : '' ?> value="0">درحال بررسی</option>
                                        <option <?= (isset($_SESSION['comment_filter']['comment_status']) and $_SESSION['comment_filter']['comment_status'] == 1) ? 'selected' : '' ?> value="1">خوانده شده</option>
                                        <option <?= (isset($_SESSION['comment_filter']['comment_status']) and $_SESSION['comment_filter']['comment_status'] == 2) ? 'selected' : '' ?> value="2">خوانده نشده</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button></div>
                                    <?php if(isset($_SESSION['comment_filter']['comment']) and !empty($_SESSION['comment_filter']['comment'])){ ?>                                     
                                        <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
                                    <?php } ?>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>
                            <a href="<?= sort_link('first_name') ?>" class="sort-table <?= sortActive('product') ?>"></a>
                                نام محصول</th>
                            <th>
                            <a href="<?= sort_link('fname OR lname') ?>" class="sort-table <?= sortActive('fname OR lname') ?>"></a>
                                نام مشتری</th>
                            <th>
                            <a href="<?= sort_link('rate') ?>" class="sort-table <?= sortActive('rate') ?>"></a>
                                امتیاز</th>
                            <th>
                            <a href="<?= sort_link('subject') ?>" class="sort-table <?= sortActive('subject') ?>"></a>
                                عنوان</th>
                            <th>ایمیل</th>
                            <th>
                            <a href="<?= sort_link('setdate') ?>" class="sort-table <?= sortActive('setdate') ?>"></a>
                                زمان</th>
                            <th>
                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                وضعیت</th>
                            <th>اقدامات</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php foreach($res as $key => $comment) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td><?= $comment['product'] ?></td>
                                    <td><?= $comment['name'] ?></td>
                                    <td><?= $comment['rate'] ?></td>
                                    <td><?= $comment['subject']?></td>
                                    <td><?= $comment['email']?></td>
                                    <td dir="ltr">
                                        <?= showDate($comment['setdate']) ?>
                                    </td>
                                    <td><?php status('read', $comment['status']); ?></td>
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
                                        <?php pagination($page, $pages) ?>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </main>
    <!--end page main-->

    <?php
            require_once('../layout/footer.php');
        ?>

</div>
<!--end wrapper-->

<?php
        require_once('../layout/js.php');
    ?>
<script>
    $(document).ready(function() {
    $("#filter-row").hide();
    $('#_filter').click(function(){
                $('#filter-row').toggle(400);
            });
    });
</script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->
</html>