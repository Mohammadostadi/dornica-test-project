<?php
$prefix = 'admin';
require_once ('../../app/loader.php');
$role = $_SESSION['user_role'];
$filter = new Filter('admin', 'admin_filter');
sortInTable($prefix, 'admins_list', 'page');
$data = [
    'first_name' => 'like',
    'last_name' => 'like',
    'username' => 'like',
    'role' => '=',
    'status' => '=',
    'gender' => '=',
];
$filter->filterCheck($db, $data, 'admin', 'admins_list.php');
pageLimit('admin', 5, false, $_SESSION['admin_filter']['admin']);
$filter->loopQuery($db, $_SESSION['admin_filter']['admin']);
$res = $db->orderBy($sortField, $sortOrder)
    ->paginate('admin', $page);
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once ('../../layout/css.php');
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

    <title>ادمین</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once ('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once ('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->

        <main class="page-content">
            <!--breadcrumb-->

            <?php
            require_once ('../../layout/message.php');
            ?>
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">جداول</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">جدول داده</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?php if(has_access('admin_add.php')){ ?> 
                            <a class="btn btn-outline-secondary" href="admin_add.php">اضافه کردن داده جدید</a>
                        <?php } ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست ادمین</h6>
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
                                                    <th>پروفایل</th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('first_name') ?>" class="sort-table <?= sortActive('first_name') ?>"></a>
                                                        نام
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('last_name') ?>" class="sort-table <?= sortActive('last_name') ?>"></a>
                                                        نام خانوادگی
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('username') ?>" class="sort-table <?= sortActive('username') ?>"></a>
                                                        نام کاربری
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('gender') ?>" class="sort-table <?= sortActive('gender') ?>"></a>
                                                        جنسیت 
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('role') ?>" class="sort-table <?= sortActive('role') ?>"></a>
                                                        نقش مدیر
                                                    </th>
                                                    <th class="px-5">
                                                        <a href="<?= sort_link('status') ?>" class="sort-table <?= sortActive('status') ?>"></a>
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                
                                        <tr
                                            id="<?= (isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin'])) ? "" : "filter-row" ?>" class="<?= (isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin'])) ? "" : "d-none" ?>">
                                            <form class=" d-flex justify-content-around align-content-start" id="form"
                                                action="admins_list.php?page=1" method="post">
                                                <td></td>
                                                <td></td>
                                                    <td class="d-flex">
                                                         <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('first_name') ?>"
                                                            name="first_name" placeholder="نام"> 
                                                        </td>
                                                        <td > 
                                                        <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('last_name') ?>"
                                                            name="last_name" placeholder="نام خانوادگی"> 
                                                        </td>
                                                    <td > 
                                                        <input class="col form-control"
                                                            type="text" value="<?= $filter->is_exist('username') ?>"
                                                            name="username" placeholder="نام کاربری">
                                                         </td>
                                                    <td > <select
                                                            class="form-select text-secondary" name="gender"
                                                            id="gender">
                                                            <option value="" class="text-secondary">جنسیت</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['gender']) and $_SESSION['admin_filter']['gender'] == 1) ? 'selected' : '' ?> value="1">زن</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['gender']) and $_SESSION['admin_filter']['gender'] == 0) ? 'selected' : '' ?> value="0">مرد</option>
                                                        </select> </td>
                                                    <td > 
                                                        <select
                                                            class="form-select text-secondary" name="role"
                                                            id="role">
                                                            <option value="" class="text-secondary">نقش</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['role']) and $_SESSION['admin_filter']['role'] == 0) ? 'selected' : '' ?> value="0">مدیر</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['role']) and $_SESSION['admin_filter']['role'] == 2) ? 'selected' : '' ?> value="2">سوپر ادمین</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['role']) and $_SESSION['admin_filter']['role'] == 1) ? 'selected' : '' ?> value="1">ادمین</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['role']) and $_SESSION['admin_filter']['role'] == 3) ? 'selected' : '' ?> value="3">اپراتور</option>
                                                        </select>
                                                    </td>
                                                    <td > <select
                                                            class="form-select text-secondary" name="status"
                                                            id="status">
                                                            <option value="" class="text-secondary">وضعیت</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['status']) and $_SESSION['admin_filter']['status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                            <option <?= (isset($_SESSION['admin_filter']['status']) and $_SESSION['admin_filter']['status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                        </select> </td>
                                                        <td class=" text-center button-filter"> 
                                                        <div class="btn-group p-0 m-0">    
                                                        <button
                                                            type="submit" name="filtered" id="apply_filter"
                                                            class="btn btn-success"> اعمال فیلتر</button>
                                                            <?php if ((isset($_SESSION['admin_filter']['admin']) and !empty($_SESSION['admin_filter']['admin']))) { ?>
                                                            <button type="submit"
                                                                name="unFilter" id="delete_filter"
                                                                class="btn btn-danger button-filter"> حذف فیلتر</button>
                                                                <?php } ?>
                                                                </div>
                                                        </td>
                                            </form>
                                        </tr>
                                                <?php foreach ($res as $admin) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-box ">
                                                                <img src="../../<?= (file_exists("../../".$admin['image']) and !empty($admin['image']))?$admin['image']:"assets/images/admin/default.png" ?>" alt="" width="80px" class="rounded">
                                                            </div>
                                                        </td>
                                                        <td><?= $admin['first_name'] ?></td>
                                                        <td><?= $admin['last_name'] ?></td>
                                                        <td><?= $admin['username'] ?></td>
                                                        <td><?= $admin['gender'] == 0 ? "مرد":"زن" ?></td>
                                                        <td><?= admin_role($admin['role']) ?></td>
                                                        <td>
                                                            <?= status('active', $admin['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <?php if(has_access('admin_update.php')){ ?>
                                                                <a <?= ($role == 0 or ($role == 2 and ($admin['role'] == 1 or $admin['role'] == 3)))?"href=admin_update.php?id=".$admin['id']:"" ?>
                                                                    class="btn border-0 disabled-sort <?=($role == 0 or ($role == 2 and ($admin['role'] == 1 or $admin['role'] == 3)))?"text-warning":"text-secondary" ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="<?=($role == 0 or ($role == 2 and ($admin['role'] == 1 or $admin['role'] == 3)))?"ویرایش اطلاعات":"عدم اجازه دسترسی"?>"
                                                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <?php } ?>
                                                                <?php if(has_access('admin_delete.php')){ ?>
                                                                <button class="<?= (($_SESSION['user_role'] == 0  and $_SESSION['user_role'] != $admin['role']) or ($_SESSION['user_role'] == 2 and ($admin['role'] != 0 and $admin['role'] != $_SESSION['user_role'])))?"edit text-danger":"disabled-sort text-secondary" ?> btn border-0 "
                                                                    value="<?= $admin['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="<?= (($_SESSION['user_role'] == 0 and $_SESSION['user_role'] != $admin['role']) or ($_SESSION['user_role'] == 2 and ($admin['role'] != 0 and $admin['role'] != $_SESSION['user_role'])))?"حذف":"عدم دسترسی" ?>" aria-label="Delete"
                                                                    style="cursor: pointer;"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                                        
                                                                    <div class="modal fade"
                                                                        id="exampleModal<?= $admin['id'] ?>" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close" value="<?= $admin['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="admin_delete.php?id=<?= $admin['id'] ?>" method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" value="<?= $admin['id'] ?>"
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
                                                                <?php } 
                                                                if($_SESSION['user_role'] == 0) { ?>
                                                                <a href="profile_reset_password.php?manager=<?= $admin['id'] ?>" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title="بازنشانی رمز عبور"><i class="fadeIn animated bx bx-reset"></i></a>
                                                                <?php } ?>
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
        require_once ('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <?php require_once ('../../layout/js.php'); ?>
    <script  src="assets/js/admin_list_page.js"></script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>