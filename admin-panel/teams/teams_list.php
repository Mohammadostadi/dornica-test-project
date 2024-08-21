<?php
    $prefix = 'teams';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'teams_list', 'page');
    $filter = new Filter('teams', 'team_filter');
    $data = [
        'first_name'=>'like',
        'last_name'=>'like',
        'title'=>'like',
        'status'=>'=',
    ];
    $filter->filterCheck($db, $data, 'team', 'teams_list.php');
    pageLimit('teams', 3, false, $_SESSION['team_filter']['team']);
    $filter->loopQuery($db, $_SESSION['team_filter']['team']);
    $res = $db -> orderBy($sortField, $sortOrder) 
    -> paginate('teams', $page);

?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../../layout/css.php');
    ?>
    <title>لیست تیم</title>

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

    <?php
            require_once('../../layout/message.php');
        ?>
        <!--breadcrumb-->
        <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">تیم</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">تیم</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-outline-secondary" href="team_add.php"> اضافه کردن داده جدید</a>
                    <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">لیست تیم</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['team_filter']['team']) and !empty($_SESSION['team_filter']['team']))?"":"filter-row"?>" class="<?= (isset($_SESSION['team_filter']['team']) and !empty($_SESSION['team_filter']['team']))?"":"d-none"?>">
                                    <form class=" d-flex justify-content-around align-content-start" id="form" action="teams_list.php?page=1" method="post" >
                                        <div class="row g-3">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['team_filter']['first_name'])?$_SESSION['team_filter']['first_name']:"" ?>" name="first_name" placeholder="نام" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['team_filter']['last_name'])?$_SESSION['team_filter']['last_name']:"" ?>" name="last_name" placeholder="نام خانوادگی" > </div>
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['team_filter']['title'])?$_SESSION['team_filter']['title']:"" ?>" name="title" placeholder="نقش" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['team_filter']['status']) and $_SESSION['team_filter']['status']== 1) ? 'selected' : '' ?> value="1">فعال</option>
                                        <option <?= (isset($_SESSION['team_filter']['status']) and $_SESSION['team_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button></div>
                                    <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>تصویر</th>
                                            <th>
                                            <a href="<?= sort_link("first_name OR last_name") ?>" class="sort-table <?= sortActive("first_name OR last_name") ?>"></a>
                                                نام</th>
                                            <th>ایمیل</th>
                                            <th>
                                            <a href="<?= sort_link('title') ?>" class="sort-table <?= sortActive('title') ?>"></a>
                                                سمت</th>
                                            <th>اینستاگرام</th>
                                            <th>واتساپ</th>
                                            <th>تلگرام</th>
                                            <th>
                                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                وضعیت</th>
                                            <th>اقدامات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php foreach($res as $team) { ?>
                                            <tr>
                                                <td><?= $team['id'] ?></td>
                                                <td>
                                                    <div class="product-box">
                                                        <img src="../../<?= $team['image'] ?>" alt="" class="rounded-circle" width="80px">
                                                    </div>
                                                </td>
                                                <td><?= $team['first_name'].' '.$team['last_name']  ?></td>
                                                <td><?= $team['email'] ?></td>
                                                <td><?= $team['title'] ?></td>
                                                <td><?= $team['instagram'] ?></td>
                                                <td><?= $team['whatsapp'] ?></td>
                                                <td><?= $team['telegram'] ?></td>
                                                <td>
                                                    <?= status('active', $team['status']) ?>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="team_update.php?id=<?= $team['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                        <button class="open-confirm border-0 btn text-danger" value="<?= $team['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
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
            require_once('../../layout/footer.php');
        ?>
</div>
<!--end wrapper-->
<script>
    const path = 'team_delete.php'
</script>
<?php
        require_once('../../layout/js.php');
    ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
</html>