<?php

require_once("../../app/loader.php");


$profile = $db->where('id', $_SESSION['user'])->getOne('admin');

$validator = new validator();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])){
    // var_dump($_FILES['file']);die;
    $fname = securityCheck($_REQUEST['fname']);
    $lname = securityCheck($_REQUEST['lname']);
    $username = securityCheck($_REQUEST['username']);
    $validator->empty('fname',  $fname,'فیلد نام شما نباید خالی باشد');
    $validator->empty('lname',  $lname,'فیلد نام خانوادگی شما نباید خالی باشد');
    $validator->empty('username',  $username,'فیلد نام کاربری شما نباید خالی باشد');
    $validator->existValue('admin', 'username', $username, 'فیلد نام کاربری تکراری میباشد', $profile['username']);
    $picture = $validator->imageUpdate("../../assets/images/ads/", $_FILES["file"], 'file', $profile['image']);

    if($validator->count_error() == 0){
        array_map('unlink', glob("../../assets/images/upload/*.*"));
        if(!empty($picture)){
            $db->where('id', $_SESSION['user'])
            ->update('admin',[
                'first_name'=>$fname,
                'last_name'=>$lname,
                'username'=>$username,
                'image'=>$picture
            ]);
        }
        $db->where('id', $_SESSION['user'])
        ->update('admin',[
            'first_name'=>$fname,
            'last_name'=>$lname,
            'username'=>$username,
        ]);
        redirect('profile_edit.php', 2);
    }
}



?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/pages-user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:55:56 GMT -->

<head>
    <?php require_once("../../layout/css.php"); ?>

    <style>
        .profile-pic {
            color: transparent;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .profile-pic input {
            display: none;
        }

        .profile-pic img {
            position: absolute;
            object-fit: cover;
            width: 165px;
            height: 165px;
            box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
            border-radius: 100px;
            z-index: 0;
        }

        .profile-pic .-label {
            cursor: pointer;
            height: 165px;
            width: 165px;
        }

        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10000;
            color: #fafafa;
            transition: background-color 0.2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0;
        }

        .profile-pic span {
            display: inline-flex;
            padding: 0.2em;
            height: 2em;
        }


        body a:hover {
            text-decoration: none;
        }
    </style>

    <title>پروفایل</title>

</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        <?php require_once("../../layout/header.php"); ?>
        <?php require_once("../../layout/asidebar.php"); ?>

        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
        <?php require_once('../../layout/message.php') ?>
            
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">صفحات</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">مشخصات کاربر</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->




            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="mb-0">حساب من</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">اطلاعات کاربر</h6>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3 was-validation needs-validation" novalidate action=""
                                        method="POST" enctype="multipart/form-data">

                                        <div class="card shadow-sm border-0 overflow-hidden">
                                            <div class="card-body">
                                                <div class="profile-pic profile-avatar text-center p-3 preview">
                                                    <label class="-label" for="file">
                                                        <span class="glyphicon glyphicon-camera"></span>
                                                        <span>Change Image</span>
                                                    </label>
                                                    <input type="file" name="file" id="file" onchange="loadFile(event)" />
                                                    <img id="img" src="../../<?= !empty($profile['image'])?$profile['image']:"assets/images/admin/default.png" ?>"
                                                        width="200" />
                                                </div>
                                                <div class="text-center mt-4">
                                                    <h4 class="mb-1"><?= $profile['first_name'] . ' ' . $profile['last_name'] ?>
                                                    </h4>
                                                    <h6 class="text-secondary"><?= admin_role($profile['role']) ?></h6>
                                                </div>
                                                <hr>

                                            </div>
                                            <ul class=" d-md-flex justify-content-around align-items-center">
                                                <li
                                                    class="d-flex justify-content-between align-items-center bg-light rounded w-100 mx-3 my-3 py-2 px-4">
                                                    دنبال کننده
                                                    <span
                                                        class="badge bg-primary rounded d-flex justify-content-center align-items-center p-2">95</span>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-between align-items-center bg-light rounded w-100 mx-3 my-3 py-2 px-4">
                                                    دنبال شونده
                                                    <span
                                                        class="badge bg-primary rounded d-flex justify-content-center align-items-center p-2">75</span>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-between align-items-center bg-light rounded w-100 mx-3 my-3 py-2 px-4">
                                                    قالب ها
                                                    <span
                                                        class="badge bg-primary rounded d-flex justify-content-center align-items-center p-2">14</span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">نام</label>
                                            <input name="fname" type="text" class="form-control" required
                                                value="<?= checkUpdate('fname', $profile['first_name']) ?>">
                                            <div class="invalid-feedback ">
                                                نام را وارد کنید
                                            </div>
                                            <span class="text-danger"><?= $validator->show('fname') ?></span>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">نام خانوادگی</label>
                                            <input name="lname" type="text" class="form-control" required
                                                value="<?= checkUpdate('lname', $profile['last_name']) ?>">
                                            <div class="invalid-feedback ">
                                                نام خانوادگی را وارد کنید
                                            </div>
                                            <span class="text-danger"><?= $validator->show('lname') ?></span>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">نام کاربری</label>
                                            <input name="username" type="text" class="form-control"
                                                oninput="usernamejs(this)" required
                                                value="<?= checkUpdate('username', $profile['username']) ?>">
                                            <div class="invalid-feedback ">
                                                نام کاربری را وارد کنید
                                            </div>
                                            <span class="text-danger"><?= $validator->show('username') ?></span>
                                        </div>
                                        <div class="text-start">
                                            <button type="submit" name="apply" class="btn btn-primary px-4">ذخیره
                                                تغییرات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <?php require_once("../../layout/footer.php"); ?>
        </main>




        <?php require_once("../../layout/js.php"); ?>
        <script>
        $(document).ready(function(){
    $("#file").change(function(){
        const fd = new FormData();
        const files = $('#file')[0].files[0];
        fd.append('file',files);
        $.ajax({
            url: '../../app/Controller/profile_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });
});
    </script>
        <script>

            $("#alert").fadeTo(3000, 500).slideUp(500, function () {
                $("#alert").slideUp(600);
            });


        </script>

        <script>
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()


        </script>

        <!--توابع jquery-->
        <script>
            //نام کاربری
            function usernamejs(input) {
                input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, '');
            }
        </script>
</body>

</html>