<?php

require_once('../../app/loader.php');

$validator = new validator();
$id =securityCheck($_REQUEST['id']);
$slideshow = $db->where('id', $id)
->getOne('slideshows');
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
    $title = securityCheck($_REQUEST['name']);
    $sort = securityCheck($_REQUEST['sort']);
    if(isset($_POST['check'])){
        $checkList = $_POST['check'];
    }
    $picture = $validator->imageUpdate("../../assets/images/slideshow/", $_FILES["fileToUpload"], 'fileToUpload', $slideshow['image']);
    $validator->empty($title, 'name', 'فیلد عنوان شما نباید خالی باشد');
    $validator->empty($sort, 'sort', 'فیلد ترتیب شما نباید خالی باشد');
    if ($validator->count_error() == 0) {
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if (isset($picture)) {
            $db->where('id', $id)
            ->update('slideshows', [
                'title'=>$title,
                'image'=>$picture,
                'status'=>isset($checkList)?1:0,
                'sort'=>$sort,
            ]);
            redirect('slideshows_list.php', 2);
        }
        $db->where('id', $id)
        ->update('slideshows', [
            'title'=>$title,
            'status'=>isset($checkList)?1:0,
            'sort'=>$sort,
        ]);
        redirect('slideshows_list.php', 2);
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
    <title>آپدیت اسلاید شو</title>
</head>

<body>

<main class="page-content">
<?php 
        require_once('../../layout/header.php');
        require_once('../../layout/asidebar.php');
    ?>
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">آپدیت کردن اسلاید شو</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <label class="form-label">عنوان </label>
                                        <input type="text" class="form-control" name="name" value="<?= checkUpdate('name', $slideshow['title']) ?>" required>
                                        <span class="text-danger"><?= $validator->show('name') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">ترتیب </label>
                                        <input type="number" class="form-control" name="sort" value="<?= checkUpdate('sort', $slideshow['sort']) ?>" oninput="number(this)" required>
                                        <span class="text-danger"><?= $validator->show('sort') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ترتیب نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">تصویر</label>
                                        <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../../<?= $slideshow['image']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                        <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $slideshow['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="slideshows_list.php" class="btn btn-danger">برگشت</a>
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
</main>


<?php 
        require_once('../../layout/js.php');
    ?>
    <?php require_once('../../layout/update_image.php') ?>
</body>



