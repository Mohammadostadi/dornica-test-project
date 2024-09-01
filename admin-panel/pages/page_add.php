<?php
require_once('../../app/loader.php');
$validator = new validator();
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_REQUEST['_insert'])){
        $name = securityCheck($_REQUEST['name']);
        $description = securityCheck($_REQUEST['description']);
        $code = securityCheck($_REQUEST['code']);
        $validator->empty($name, 'name', 'فیلد عنوان نمیتواند خالی باشد');
        $validator->empty($name, 'code', 'فیلد عنوان نمیتواند خالی باشد');
        if($validator->count_error() == 0){
            $db->insert('pages', [
                'title'=>$name,
                'code'=>$code,
                'setdate'=>$date,
                'description'=>$description,
                'status'=>1
            ]);
            redirect('pages_list.php', 4);
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

    <title>اضافه کردن صفحات</title>
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
                                <h6 class="mb-0 text-uppercase">اضافه کردن صفحه</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                <div class="col-lg-6">
                                            <label class="form-label">نام</label>
                                            <input type="text" class="form-control" name="name" value="<?= checkExist('name') ?>" required>
                                            <span class="text-danger"><?= $validator->show('name') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                                    <label class="form-label">کد</label>
                                                    <input type="number" class="form-control tex-end" name="code" value="<?= checkExist('code') ?>" oninput="number(this)" required>
                                                    <span class="text-danger"><?= $validator->show('code') ?></span>
                                                    <div class="invalid-feedback">
                                            فیلد کد نباید خالی باشد
                                        </div>
                                                </div>
                                        <div class="col-12">
                                            <label class="form-label">توضیحات</label>
                                            <textarea class="form-control" id="editor1" rows="3" placeholder="توضیحات" name="description"><?= checkExist('description') ?></textarea>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a href="pages_list.php" class="btn btn-danger">برگشت</a>
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
    <script src="../../assets/ckeditor/ckeditor.js"></script>
    <script src="../../assets/ckeditor/adapters/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#editor1').ckeditor();
        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>