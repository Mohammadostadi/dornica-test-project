<?php
require_once('../../app/loader.php');
$validator = new validator();
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_REQUEST['_insert'])){
        $name = securityCheck($_REQUEST['categoryName']);
        $validator->empty($name, 'name', 'فیلد عنوان نمیتواند خالی باشد');
        
        if($validator->count_error() == 0){
            $db->insert('blog_category', [
                'name'=>$name,
                'status'=>1,
                'sort'=>sortTable('blog_category'),
            ]);
            redirect('blogs_categories_list.php', 4);
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

    <title>اضافه کردن دسته بندی بلاگ</title>
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
                                <h6 class="mb-0 text-uppercase">اضافه کردن دسته بندی بلاگ</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                <div class="col-lg-6">
                                            <label class="form-label">نام</label>
                                            <input type="text" class="form-control" name="categoryName" value="<?= checkExist('name') ?>" required>
                                            <span class="text-danger"><?= $validator->show('name') ?></span>
                                            <div class="invalid-feedback">
                                                فیلد نام نباید خالی باشد
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="blogs_categories_list.php" class="btn btn-danger">برگشت</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
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
        require_once('../../layout/js.php');
    ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>