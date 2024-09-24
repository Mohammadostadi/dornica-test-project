<?php
    $prefix = 'slideshows';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'slideshows_list', 'page');
    if(!isset($_SESSION['slideshow_filter'])){
        $_SESSION['slideshow_filter']['slideshow'] = [];
    }
    $filter = new Filter('slideshows', 'slideshow_filter');
    $data = [
        'title'=>'like',
        'status'=>'=',
    ];
    $filter->filterCheck($db, $data, 'slideshow', 'slideshows_list.php');
    pageLimit('slideshows', 10, false, $_SESSION['slideshow_filter']['slideshow']);
    $filter->loopQuery($db, $_SESSION['slideshow_filter']['slideshow']);
    $res = $db ->orderBy($sortField, $sortOrder)
    -> paginate('slideshows', $page);

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
    <link rel="stylesheet" href="../../assets/css/sort.css">
    <style>
    .active::after {
                color:
                    <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'DESC') ? '#000' : '#ccc' ?>
                ;
            }
    
            .active::before {
                color:
                    <?= (isset($_SESSION[$prefix.'_sort_order']) and $_SESSION[$prefix.'_sort_order'] == 'ASC') ? '#000' : '#ccc' ?>
                ;
            }
</style>

    <title>لیست اسلاید شو</title>

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
            <div class="breadcrumb-title pe-3">اسلاید شو</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست اسلاید شو</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <?= has_access('slideshow_add.php') ?"<a class='btn btn-outline-secondary' href='slideshow_add.php'> اضافه کردن داده جدید</a>":"" ?>
                    <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">لیست اسلایدشو</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                            <a href="<?= sort_link('title') ?>" class="sort-table <?= sortActive('title') ?>"></a>
                                                عنوان</th>
                                            <th>
                                            <a href="<?= sort_link('sort') ?>" class="sort-table <?= sortActive('sort') ?>"></a>
                                                ترتیب</th>
                                            <th>
                                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                وضعیت</th>
                                            <?= (has_access('slideshow_delete.php') or has_access('slideshow_update.php')) ?"<th>اقدامات</th>":"" ?>
                                        </tr>
                                        </thead>
                                        
                        <tbody class="text-center">
                            
                        <tr id="<?= (isset($_SESSION['slideshow_filter']['slideshow']) and !empty($_SESSION['slideshow_filter']['slideshow']))?"":"filter-row"?>" class="<?= (isset($_SESSION['slideshow_filter']['slideshow']) and !empty($_SESSION['slideshow_filter']['slideshow']))?"":"d-none"?>">
                                    <form class=" " id="form" action="slideshows_list.php?page=1" method="post" >
                                        <td></td>
                                    <td class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['slideshow_filter']['title'])?$_SESSION['slideshow_filter']['title']:"" ?>" name="title" placeholder="عنوان" > </td>
                                    <td></td>
                                    <td class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['slideshow_filter']['status']) and $_SESSION['slideshow_filter']['status']== 1) ? 'selected' : '' ?> value="1">فعال</option>
                                        <option <?= (isset($_SESSION['slideshow_filter']['status']) and $_SESSION['slideshow_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                    </select> </td>
                                    <td class="col-lg-2 col-md-4 text-center button-filter">
                                        <div class="btn-group"> 
                                        <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button>
                                        <?php if (isset($_SESSION['slideshow_filter']['slideshow']) and !empty($_SESSION['slideshow_filter']['slideshow'])) { ?>
                                        <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button>
                                        <?php } ?>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                            <?php  foreach($res as $value){ ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="productlist">
                                        <a class="d-flex align-items-center gap-2" href="#">
                                            <div class="product-box">
                                                <img src="../../<?= $value['image'] ?>" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 product-title"><?= $value['title'] ?></h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td><span><?= $value['sort'] ?></span></td>
                                    <td>
                                        <?= status('active', $value['status']); ?>
                                    </td>
                                    <?php if(has_access('slideshow_delete.php') or has_access('slideshow_update.php')){ ?>
                                    <td>
                                        <div>
                                            <?php if(has_access('slideshow_update.php')){ ?>
                                            <a href="slideshow_update.php?id=<?= $value['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <?php
                                            }
                                            if(has_access('slideshow_delete.php')){ ?>
                                            <button class="open-confirm border-0 btn text-danger" value="<?= $value['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
                                            <div class="modal fade"
                                                                id="exampleModal<?= $value['id'] ?>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">

                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">حذف داده</h5>
                                                                            <button type="button" class="close"
                                                                                value="<?= $value['id'] ?>"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="slideshow_delete.php?id=<?= $value['id'] ?>" method="post">
                                                                            <div class="modal-body">
                                                                                <h5>آیا مطمئن هستید؟</h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    value="<?= $value['id'] ?>"
                                                                                    class="btn btn-secondary close"
                                                                                    data-dismiss="modal">لغو</button>
                                                                                <button type="submit"
                                                                                    name="btn_change_status"
                                                                                    class="btn btn-primary">حذف</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <?php } ?>
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
<?php
        require_once('../../layout/js.php');
    ?>
<script src="assets/js/slideshow.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
</html>