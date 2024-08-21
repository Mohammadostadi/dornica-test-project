<?php
    $prefix = 'blog_category';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'blogs_categories_list', 'page');
    $filter = new Filter('blog_category', 'blog_category_filter');
    $data = [
        'name'=>'like',
        'status'=>'=',
    ];
    $filter->filterCheck($db, $data, 'blog_category', 'blogs_categories_list.php');
    pageLimit('blog_category', 3, false, $_SESSION['blog_category_filter']['blog_category']);
    $filter->loopQuery($db, $_SESSION['blog_category_filter']['blog_category']);
    $res = $db ->orderBy($sortField, $sortOrder) 
    ->paginate('blog_category', $page);
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

    <title>لیست دسته بندی بلاگ ها</title>

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
            <div class="breadcrumb-title pe-3">بلاگ ها</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">دسته بندی های بلاگ</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-outline-secondary" href="blog_category_add.php"> اضافه کردن داده جدید</a>
                    <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0"> لیست دسته بندی بلاگ</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                            <div class="card-header">
                                <div id="<?= (isset($_SESSION['blog_category_filter']['blog_category']) and !empty($_SESSION['blog_category_filter']['blog_category']))?"":"filter-row"?>" class="<?= (isset($_SESSION['blog_category_filter']['blog_category']) and !empty($_SESSION['blog_category_filter']['blog_category']))?"":"d-none"?>">
                                    <form class=" " id="form" action="blogs_categories_list.php?page=1" method="post" >
                                        <div class="row g-2">
                                    <div class="col-lg-2 col-md-4" > <input class="col form-control" type="text" value="<?= isset($_SESSION['blog_category_filter']['name'])?$_SESSION['blog_category_filter']['name']:"" ?>" name="name" placeholder="نام" > </div>
                                    <div class="col-lg-2 col-md-4" > <select class="form-select text-secondary" name="status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['blog_category_filter']['status']) and $_SESSION['blog_category_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                        <option <?= (isset($_SESSION['blog_category_filter']['status']) and $_SESSION['blog_category_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                    </select> </div>
                                    <div class="col-lg-2 col-md-4 text-center button-filter"> <button type="submit" name="filtered" id="apply_filter" class="btn btn-success button-filter" > اعمال فیلتر</button></div>
                                    <?php if(isset($_SESSION['blog_category_filter']['blog_category']) and !empty($_SESSION['blog_category_filter']['blog_category'])){ ?>                                     
                                        <div class="col-lg-2 col-md-4 button-filter"> <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button></div>
                                    <?php } ?>
                                    </div>
                                    </form>
                                </div>
                            </div>  
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                            <a href="<?= sort_link('name') ?>" class="sort-table <?= sortActive('name') ?>"></a>
                                                نام</th>
                                            <th>
                                            <a href="<?= sort_link('sort') ?>" class="sort-table <?= sortActive('sort') ?>"></a>
                                                ترتیب</th>
                                            <th>
                                            <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                وضعیت</th>
                                            <th>اقدامات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php foreach($res as $key => $bcategory) { ?>
                                            <tr>
                                                <td>
                                                    <input class="form-check-input" type="checkbox">
                                                </td>
                                                <td><?= $bcategory['name'] ?></td>
                                                <td><?= $bcategory['sort'] ?></td>
                                                <td>
                                                    <?= status('active', $bcategory['status']); ?>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript:;" class="btn text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="وضعیت جزئیات" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                                        <a href="blog_category_update.php?id=<?= $bcategory['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش اطلاعات" data-bs-original-title="ویرایش اطلاعات" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                        <?php 
                                                            $res = $db->where('category_id', $bcategory['id'])
                                                            ->getValue('blogs', 'COUNT(*)');
                                                        ?>
                                                        <button class="<?= !empty($res)?"disabled text-secondary":'open-confirm text-danger' ?> btn border-0" value="<?= $bcategory['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= !empty($res)?'قابل حذف نیست':"حذف" ?>" data-bs-original-title="حذف" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
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
    const path = 'blog_category_delete.php'
</script>
<?php 
    require_once('../../layout/js.php');
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


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/ecommerce-products-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:01 GMT -->
</html>