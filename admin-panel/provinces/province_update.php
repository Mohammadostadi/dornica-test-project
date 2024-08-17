<?php
    require_once('../../app/loader.php');
    $id = securityCheck($_REQUEST['id']);
    $province =  $db->where('id', $id)
    ->getOne('province');
    $validator = new validator();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = securityCheck($_REQUEST['title']);
        if(isset($_POST['check'])){
            $check = $_POST['check'];
        }
        $validator->empty($title, 'title', 'فیلد عنوان شما نباید خالی باشد');
        if($validator->count_error() == 0){
            $db->where('id', $id)
            ->update('province',[
                'name'=>$title,
                'status'=>isset($check)?1:0
            ]);
            redirect('provinces_list.php', 2);
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

    <title>آپدیت کردن استان</title>
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
                                <h6 class="mb-0 text-uppercase">آپدیت کردن استان</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                    <div class="col-12">
                                        <label class="form-label">عنوان </label>
                                        <input type="text" class="form-control" name="title" value="<?= checkUpdate('title', $province['name']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('title') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $province['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="provinces_list.php" class="btn btn-danger">برگشت</a>
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