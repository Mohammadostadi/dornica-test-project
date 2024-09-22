<?php
    require_once('../../app/loader.php');
    $categoryList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('blog_category', null, 'name, id');
    $validator = new validator();
    
    $id = securityCheck($_REQUEST['id']);
    $blog = $db->where('id', $id)
    ->getOne('blogs');

    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
        $title = securityCheck($_REQUEST['title']);
        $writer = securityCheck($_REQUEST['writer']);
        $description = securityCheck($_REQUEST['description']);
        $fullDescription = securityCheck($_REQUEST['fullDescription']);
        if(isset($_POST['check'])){
            $checkList = $_POST['check'];
        }
        $picture = $validator->imageUpdate('../../assets/images/blogs/', $_FILES["fileToUpload"], 'fileToUpload', $blog['image']);
        $validator->empty($title, 'title', 'فیلد عنوان شما نباید خالی باشد');
        $validator->empty($writer, 'writer', 'فیلد نویسنده شما نباید خالی باشد');
        if(!isset($_POST['category'])){
            $validator->set('category', 'فیلد دسته بندی نمیتواند خالی باشد');
        }else{
            $category = securityCheck($_REQUEST['category']);
        }
        // Check if $uploadOk is set to 0 by an validator
        if ($validator->count_error() == 0) {
            // if everything is ok, try to upload file
            array_map('unlink', glob("../../assets/images/upload/*.*"));
            if (isset($picture)) {
                $db->where('id', $id)
                ->update('blogs', [
                    'title'=>$title,
                    'writer'=>$writer,
                    'description'=>$description,
                    'full_description'=>$fullDescription,
                    'image'=>$picture,
                    'category_id'=>$category,
                    'status'=>isset($checkList)?1:0
                ]);
                redirect('blogs_list.php', 2);
            }
            $db->where('id', $id)
            ->update('blogs', [
                'title'=>$title,
                'writer'=>$writer,
                'description'=>$description,
                'full_description'=>$fullDescription,
                'category_id'=>$category,
                'status'=>isset($checkList)?1:0
            ]);
            redirect('blogs_list.php', 2);
        }
    }

?>


<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        require_once('../../layout/css.php');
    ?>

    <title>آپدیت کردن بلاگ</title>
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
                                <h6 class="mb-0 text-uppercase">آپدیت کردن بلاگ</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data" >
                                        <div class="col-lg-6">
                                            <label class="form-label">دسته بندی </label>
                                            <select name="category"  class="form-select" required>
                                                <?php 
                                                    foreach($categoryList as $category){ ?>
                                                                    <option 
                                                                    <?= ($blog['category_id'] == $category['id'] ? "SELECTED" : '')  ?>
                                                                    value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                            <span class="text-danger"><?= $validator->show('category') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد دسته بندی نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">عنوان</label>
                                            <input type="text" class="form-control" name="title" value="<?= checkUpdate('title', $blog['title']) ?>" required>
                                            <span class="text-danger"><?= $validator->show('title') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">نویسنده</label>
                                            <input type="text" class="form-control" name="writer" value="<?= checkUpdate('writer', $blog['writer']) ?>" required>
                                            <span class="text-danger"><?= $validator->show('writer') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد نویسنده نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">توضیحات</label>
                                            <textarea class="form-control" rows="6" placeholder="توضیحات" name="description"><?= checkUpdate('description', $blog['description']) ?></textarea>
                                            <span class="text-danger"><?= $validator->show('description') ?></span>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control editor" rows="3" placeholder="توضیحات" name="fullDescription"><?= checkUpdate('fullDescription', $blog['full_description']) ?></textarea>
                                            <label class="form-label">توضیحات کامل</label>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label">تصویر</label>
                                            <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../../<?= $blog['image']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
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
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $blog['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="blogs_list.php" class="btn btn-danger">برگشت</a>
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
    <script src="../../assets/ckeditor/ckeditor.js"></script>
    <script src="../../assets/ckeditor/adapters/jquery.js"></script>
    <script src="assets/js/blog_add_page.js"></script>
    <?php require_once('../../layout/update_image.php') ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>