<?php
    require_once('../../app/loader.php');
    $id = securityCheck($_REQUEST['id']);
    $payment = $db->where('id', $id)
    ->getOne('payment_type');
    $validator = new validator();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = securityCheck($_REQUEST['title']);
        $sort = securityCheck($_REQUEST['sort']);
        if(isset($_POST['check'])){
            $check = $_POST['check'];
        }
        $validator->empty($title, 'title', 'فیلد عنوان شما نباید خالی باشد');
        $validator->empty($sort, 'sort', 'فیلد ترتیب نمیتواند صفر باشد');
        if($validator->count_error() == 0){
            $db->where('id', $id)
            ->update('payment_type',[
                'name'=>$title,
                'sort'=>$sort,
                'status'=>isset($check)?1:0,
            ]);
            redirect('payments_type.php', 2);
        }
    }

?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../../layout/css.php');
    ?>

    <title> آپدیت مدل پرداخت</title>
</head>

<body>

<main class="page-content">
<?php 
        require_once('../../layout/header.php');
        require_once('../../layout/asidebar.php');
    ?>
    <!--start wrapper-->
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase"> آپدیت مدل پرداخت</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                    <div class="col-6">
                                        <label class="form-label">عنوان </label>
                                        <input type="text" class="form-control" name="title" value="<?= checkExist('title') == ''?$payment['name']:$title ?>" required>
                                        <span class="text-danger"><?= $validator->show('title') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">ترتیب </label>
                                        <input type="number" class="form-control" name="sort" value="<?= checkExist('sort') == ''?$payment['sort']:$sort ?>" oninput="number(this)" required>
                                        <span class="text-danger"><?= $validator->show('sort') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ترتیب نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $payment['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="payments_type.php" class="btn btn-danger">برگشت</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary" name="_insert">بروزرسانی</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <!--end page main-->
    
    
    </div>
    <!--end wrapper-->
</main>



<?php 
        require_once('../../layout/js.php');
    ?>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>