<?php
    $prefix = 'contacts';
    require_once('../../app/loader.php');
    sortInTable($prefix, 'contacts_list', 'page');
    $filter = new Filter('contacts', 'contact_filter');
    $data = [
        'subject'=>'like',
        'status'=>'=',
    ];
    $filter->filterCheck($db, $data, 'contact', 'contacts_list.php');
    pageLimit('contacts', 10, false, $_SESSION['contact_filter']['contact']);
    $filter->loopQuery($db, $_SESSION['contact_filter']['contact']);
    $res = $db->join('admin', 'admin.id = contacts.admin_id', 'LEFT')
    ->orderBy($sortField, $sortOrder)
    ->paginate('contacts', $page, "CONCAT(admin.first_name, ' ', admin.last_name) AS name, email, admin.image,subject, setdate, contacts.status");
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
    <title>لیست پیام ها</title>
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
            <div class="breadcrumb-title pe-3">نظرات و پیام ها</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست پیام ها</li>
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
        
        <!-- <h6 class="mb-0 text-uppercase">واردات جدول داده</h6> -->
        <hr/>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">لیست پیام ها</h6>
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
                            <th>
                            <a href="<?= sort_link('name') ?>" class="sort-table <?= sortActive('name') ?>"></a>
                                نام</th>
                            <th>
                            <a href="<?= sort_link('subject') ?>" class="sort-table <?= sortActive('subject') ?>"></a>
                                موضوع</th>
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
                            
                        <tr id="<?= (isset($_SESSION['contact_filter']['contact']) and !empty($_SESSION['contact_filter']['contact']))?"":"filter-row"?>" class="<?= (isset($_SESSION['contact_filter']['contact']) and !empty($_SESSION['contact_filter']['contact']))?"":"d-none"?>">
                                    <form class="" id="form" action="contacts_list.php?page=1" method="post" >
                                        <td></td>
                                        <td></td>
                                    <td> <input class="col form-control" type="text" value="<?= isset($_SESSION['admin_filter']['fname'])?$_SESSION['admin_filter']['fname']:"" ?>" name="title" placeholder="عنوان" > </td>
                                    <td></td>
                                    <td></td>
                                    <td> <select class="form-select text-secondary" name="status" id="status">
                                        <option value="" class="text-secondary" >وضعیت</option>
                                        <option <?= (isset($_SESSION['contact_filter']['status']) and $_SESSION['contact_filter']['status']== 0) ? 'selected' : '' ?> value="0">درحال بررسی</option>
                                        <option <?= (isset($_SESSION['contact_filter']['status']) and $_SESSION['contact_filter']['status'] == 1) ? 'selected' : '' ?> value="1">خوانده شده</option>
                                        <option <?= (isset($_SESSION['contact_filter']['status']) and $_SESSION['contact_filter']['status'] == 2) ? 'selected' : '' ?> value="2">خوانده نشده</option>
                                    </select> </td>
                                    <td class="text-center button-filter"> 
                                    <div class="btn-group p-0 m-0">
                                        <button type="submit" name="filtered" id="apply_filter" class="btn btn-success" > اعمال فیلتر</button>
                                        <?php if(isset($_SESSION['contact_filter']['contact']) and !empty($_SESSION['contact_filter']['contact'])){ ?>                                     
                                        <button type="submit" name="unFilter" id="delete_filter" class="btn btn-danger button-filter" > حذف فیلتر</button>
                                        <?php } ?>
                                        </div>
                                </td>
                                    </form>
                                </tr>
                        <?php foreach($res as $key => $contact) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td><?= $contact['name'] ?></td>
                                    <td><?= $contact['subject'] ?></td>
                                    <td><?= $contact['email'] ?></td>
                                    <td dir="ltr">
                                    <?= showDate($contact['setdate']) ?>
                                    </td>
                                    <td><?php
                                    status('read', $contact['status']);
                                    ?></td>
                                    <td>
                                        <div>
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