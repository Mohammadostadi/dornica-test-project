<?php
$prefix = 'blogs';
require_once('../../app/loader.php');
sortInTable($prefix, 'blogs_list', 'page');
$categoryList = $db->where('status', 1)
    ->get('blog_category', null, 'id, name');
$col = ['blogs.id', 'blog_category.name', 'title', 'blogs.status', 'writer', 'setdate', 'image'];
$filter = new Filter('blogs', 'blog_filter');
$data = [
    'category_id' => '=',
    'title' => 'like',
    'writer' => 'like',
    'status' => '=',
    'setdate' => 'date',
];
$filter->filterCheck($db, $data, 'blog', 'blogs_list.php');
pageLimit('blogs', 10, false, $_SESSION['blog_filter']['blog']);
$filter->loopQuery($db, $_SESSION['blog_filter']['blog']);
$res = $db->join('blog_category', 'blogs.category_id = blog_category.id', ' LEFT')
    ->orderBy($sortField, $sortOrder)
    ->paginate('blogs', $page, $col);
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
    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />

    <title>لیست بلاگ ها </title>
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
                            <li class="breadcrumb-item active" aria-current="page">لیست بلاگ</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?= has_access('blog_add.php') ? "<a class='btn btn-outline-secondary' href='blog_add.php'> اضافه کردن داده جدید</a>" : "" ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست بلاگ ها</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>عکس</th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('blog_category.name') ?>"
                                                            class="sort-table <?= sortActive('blog_category.name') ?>"></a>
                                                        دسته بندی
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('title') ?>"
                                                            class="sort-table <?= sortActive('title') ?>"></a>
                                                        عنوان
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('writer') ?>"
                                                            class="sort-table <?= sortActive('writer') ?>"></a>
                                                        نام نویسنده
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('setdate') ?>"
                                                            class="sort-table <?= sortActive('setdate') ?>"></a>
                                                        زمان
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('status') ?>"
                                                            class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>

                                                </tr>
                                            <tbody class="text-center">
                                                
                                        <tr id="<?= (isset($_SESSION['blog_filter']['blog']) and !empty($_SESSION['blog_filter']['blog'])) ? "" : "filter-row" ?>"
                                            class="<?= (isset($_SESSION['blog_filter']['blog']) and !empty($_SESSION['blog_filter']['blog'])) ? "" : "d-none" ?>">
                                            <form class=" d-flex justify-content-around align-content-start" id="form"
                                                action="blogs_list.php?page=1" method="post">
                                                <td></td>
                                                <td></td>
                                                    <td>
                                                        <select class="form-select text-secondary" name="category_id"
                                                            id="">
                                                            <option value="">دسته بندی</option>
                                                            <?php foreach ($categoryList as $category) { ?>
                                                                <option <?= (isset($_SESSION['blog_filter']['category_id']) and $_SESSION['blog_filter']['category_id'] == $category['id']) ? "SELECTED" : "" ?> value="<?= $category['id'] ?>">
                                                                    <?= $category['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['blog_filter']['title']) ? $_SESSION['blog_filter']['title'] : "" ?>"
                                                            name="title" placeholder="عنوان"> </td>
                                                    <td> <input class="col form-control"
                                                            type="text"
                                                            value="<?= isset($_SESSION['blog_filter']['writer']) ? $_SESSION['blog_filter']['writer'] : "" ?>"
                                                            name="writer" placeholder="نویسنده"> </td>
                                                    <td> <input class="col form-control"
                                                            type="text" id="date"
                                                            value="<?= isset($_SESSION['blog_filter']['setdate']) ? $_SESSION['blog_filter']['setdate'] : "" ?>"
                                                            name="setdate" placeholder="تاریخ"> </td>
                                                    <td> <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['blog_filter']['status']) and $_SESSION['blog_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['blog_filter']['status']) and $_SESSION['blog_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </td>
                                                    <td class="col-lg-2 col-md-4 text-center button-filter"> 
                                                    <div class="btn-group p-0 m-0">
                                                        <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button>
                                                            <?php if (isset($_SESSION['blog_filter']['blog']) and !empty($_SESSION['blog_filter']['blog'])) { ?>
                                                            <button type="submit"
                                                                name="unFilter" id="delete_filter"
                                                                class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                                <?php } ?>
                                                                </div>
                                                        </td>
                                            </form>
                                        </tr>
                                                <?php foreach ($res as $blog) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="../../<?= $blog['image'] ?>" alt="" width="80px"
                                                                class="rounded">
                                                        </td>
                                                        <td><?= $blog['name'] ?></td>
                                                        <td><?= $blog['title'] ?></td>
                                                        <td><?= $blog['writer'] ?></td>
                                                        <td dir="ltr">
                                                            <?= showDate($blog['setdate']) ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= status('active', $blog['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript:;" class="btn text-primary"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="" data-bs-original-title="وضعیت جزئیات"
                                                                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                                                <?php if (has_access('blog_update.php')) { ?>
                                                                    <a href="blog_update.php?id=<?= $blog['id'] ?>"
                                                                        class="btn text-warning border-0"
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                        title="ویرایش اطلاعات"
                                                                        data-bs-original-title="ویرایش اطلاعات"
                                                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <?php }
                                                                if (has_access('blog_delete.php')) {
                                                                    ?>
                                                                    <button class="edit btn border-0 text-danger"
                                                                        value="<?= $blog['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="حذف"
                                                                        data-bs-original-title="حذف" aria-label="Delete"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                            <div class="modal fade"
                                                                        id="exampleModal<?= $blog['id'] ?>" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close" value="<?= $blog['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="blog_delete.php?id=<?= $blog['id'] ?>" method="post" >
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" value="<?= $blog['id'] ?>"
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
    <script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
    <script src="assets/js/blog_list_page.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>