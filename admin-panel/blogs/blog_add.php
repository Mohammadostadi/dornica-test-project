<?php
    require_once('../app/loader.php');
    $categoryList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('blog_category', null, 'name, id');
    $validator = new validator();
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
        $title = securityCheck($_REQUEST['title']);
        $writer = securityCheck($_REQUEST['writer']);
        $description = securityCheck($_REQUEST['description']);
        $fullDescription = securityCheck($_REQUEST['fullDescription']);
        $picture = $validator->imageCheck("../assets/images/blogs/", $_FILES['fileToUpload'], 'fileToUpload');
        $validator->empty($title, 'title', 'فیلد عنوان شما نباید خالی باشد');
        $validator->empty($writer, 'writer', 'فیلد نویسنده شما نباید خالی باشد');
        if(!isset($_POST['category'])){
            $validator->set('category', 'فیلد دسته بندی نمیتواند خالی باشد');
        }else{
            $category = securityCheck($_REQUEST['category']);
        }
        // Check if $uploadOk is set to 0 by an validator
        if ($validator->count_error() == 0) {
                $db->insert('blogs', [
                    'title'=>$title,
                    'writer'=>$writer,
                    'description'=>$description,
                    'full_description'=>$fullDescription,
                    'image'=>$picture,
                    'category_id'=>$category,
                    'setdate'=>$date,
                    'status'=>1
                ]);
                redirect('blogs_list.php', 4);
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
        require_once('../layout/css.php');
    ?>

    <title>اضافه کردن بلاگ</title>
</head>

<body>

<main class="page-content">
<?php
        require_once('../layout/header.php');
        require_once('../layout/asidebar.php');
    ?>
    <!--start wrapper-->
    <div class="wrapper container my-5">
        <!--start content-->
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">اضافه کردن بلاگ</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data" >
                                        <div class="col-6">
                                            <label class="form-label">دسته بندی </label>
                                            <select name="category"  class="form-control"  required>
                                                <option value="null" selected disabled>یک دسته بندی را انتخاب کنید</option>
                                                <?php 
                                                    foreach($categoryList as $category){ ?>
                                                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                            <span class="text-danger"><?= $validator->show('category') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد دسته بندی نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">عنوان</label>
                                            <input type="text" class="form-control" name="title" value="<?= checkExist('title') ?>" required>
                                            <span class="text-danger"><?= $validator->show('title') ?></span>
                                            <div class="invalid-feedback">
                                                فیلد عنوان نباید خالی باشد
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">نویسنده</label>
                                            <input type="text" class="form-control" name="writer" value="<?= checkExist('writer') ?>" required>
                                            <span class="text-danger"><?= $validator->show('writer') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد تویسنده نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">تصویر</label>
                                            <input type="file" class="form-control" aria-label="file example" name="fileToUpload" required>
                                            <span class="text-danger"><?= $validator->show('fileToUpload') ?></span><div class="invalid-feedback">
                                            فیلد تصویر نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">توضیحات</label>
                                            <textarea id="editor1" type="text" class="form-control" name="description"><?= checkExist('description') ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">توضیحات کامل</label>
                                            <textarea id="editor2" class="form-control" rows="3" placeholder="توضیحات" name="fullDescription"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="row d-flex justify-content-end">
                                                <div class="col-2">
                                                    <div class="d-grid">
                                                        <a href="blogs_list.php" class="btn btn-danger">برگشت</a>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary" name="_insert">ثبت</button>
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
        require_once('../layout/js.php');
    ?>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script src="../assets/ckeditor/adapters/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#editor1').ckeditor();
        $('#editor2').ckeditor();
    });
</script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>