<?php

    require_once('../../app/loader.php');

    $validator = new validator();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = securityCheck($_REQUEST['title']);
        $description = securityCheck($_REQUEST['description']);
        $validator->empty($title, 'title', 'فیلد عنوان نمیتواند خالی باشد');
        if($validator->count_error() == 0){
            $db->insert('faq', [
                'title'=>$title,
                'description'=>$description,
                'status'=>1,
                'sort'=>sortTable('faq'),
            ]);
            redirect('faqs_list.php', 4);
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

    <title>اضافه کردن سوال</title>
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
                                <h6 class="mb-0 text-uppercase">اضافه کردن سوال</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post">
                                    <div class="col-lg-6">
                                        <label class="form-label">عنوان</label>
                                        <input type="text" class="form-control" name="title" value="<?=  checkExist('title') ?>" required>
                                        <span class="text-danger"><?= $validator->show('title') ?></span>
                                        <div class="invalid-feedback">
                                            فیلد عنوان نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">متن</label>
                                        <textarea class="form-control" id="editor1" rows="3" placeholder="توضیحات" name="description"><?= checkExist('description') ?></textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="faqs_list.php" class="btn btn-danger">برگشت</a>
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