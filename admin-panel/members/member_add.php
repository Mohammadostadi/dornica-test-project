<?php

require_once('../../app/loader.php');
require_once('../../app/Controller/cities.php');

$provinceList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('province', null, 'id, name');


$validator = new validator();
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
        $fname = securityCheck($_REQUEST['fname']);
        $lname = securityCheck($_REQUEST['lname']);
        $gender = securityCheck($_REQUEST['gender']);
        $email = securityCheck($_REQUEST['email']);
        $phone = securityCheck($_REQUEST['phone']);
        $postalCode = securityCheck($_REQUEST['postalCode']);
        $ncode = securityCheck($_REQUEST['national_code']);
        $address = securityCheck($_REQUEST['address']);
        $bdate = securityCheck($_REQUEST['birthday']);
        $password = securityCheck($_REQUEST['password']);
        $picture = $validator->imageCheck("../../assets/images/members/", $_FILES["fileToUpload"], "fileToUpload");
        $validator->empty($fname, 'fname', 'فیلد نام شما نباید خالی باشد');
        $validator->existValue('members', 'national_code', $ncode, 'فیلد کدملی تکراری میباشد');
        $validator->existValue('members', 'email', $email, 'فیلد ایمیل تکراری میباشد');
        $validator->existValue('members', 'phone', $phone, 'فیلد شماره تکراری میباشد');
        $validator->empty($lname, 'lname', 'فیلد نام خانوادگی شما نباید خالی باشد');
        $validator->empty($email, 'email', 'فیلد ایمیل شما نباید خالی باشد');
        $validator->empty($password, 'password', 'فیلد رمز عبور شما نباید خالی باشد');
        $validator->empty($ncode, 'national_code', 'فیلد کد ملی شما نباید خالی باشد');
        $validator->empty($phone, 'phone', 'فیلد شماره تلفن شما نباید خالی باشد');
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validator->set('email', 'فرمت ایمیل صحیح نمیباشد');  
        }
        if(!preg_match ("/^[0-9]*$/", $phone)){
            $validator->set('phone', 'فقط عدد قابل قبول است');  
        }
        if(!isset($_POST['state'])){
            $validator->set('state', 'فیلد استان شما نباید خالی باشد');
        }
        if ($gender == '') {
            $validator->set('gender', 'فیلد جنسیت شما نباید خالی باشد');
        }
        if(!isset($_POST['city'])){
            $validator->set('city', 'فیلد شهر شما نباید خالی باشد');
        }
        if(10 < strlen($bdate) or strlen($bdate) < 8){
            $validator->set('date', 'فیلد تاریخ شما نامعتبر میباشد');
        }
        if(!empty($bdate)){
            $bdate = changeDate($bdate);
        }
        if ($validator->count_error() == 0) {
                $db->insert('members', [
                    'fname'=>$fname,
                    'lname'=>$lname,
                    'gender'=>$gender,
                    'email'=>$email,
                    'phone'=>$phone,
                    'address'=>$address,
                    'birthday'=>$bdate,
                    'password'=>password_hash($password, PASSWORD_DEFAULT),
                    'image'=>$picture,
                    'national_code'=>$ncode,
                    'postal_code'=>$postalCode,
                    'city_id'=>$_REQUEST['city'],
                    'province_id'=>$_REQUEST['state'],
                    'setdate'=>$date,
                    'status'=>1,
                ]);
                redirect('members_list.php', 4);
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
    
    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />

    <title>اضافه کردن ممبر</title>
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
                                <h6 class="mb-0 text-uppercase">اضافه کردن ممبر</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <label class="form-label">نام </label>
                                        <input type="text" class="form-control" name="fname" value="<?= checkExist('fname') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('fname')? $validator->show('fname'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="lname" value="<?= checkExist('lname') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('lname')? $validator->show('lname'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام خانوادگی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                            <label class="form-label">جنسیت</label>
                                            <select class="form-select" name="gender" id="gender" required>
                                                <option value="">جنسیت مورد نظر را انتخاب کنید</option>
                                                <option <?= (isset($_POST['gender']) and $_POST['gender'] == 0)?"SELECTED":"" ?> value="0">مرد</option>
                                                <option <?= (isset($_POST['gender']) and $_POST['gender'] == 1)?"SELECTED":"" ?> value="1">زن</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            فیلد جنسیت نباید خالی باشد
                                        </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <label for="state" class="form-label">استان</label>
                                        <select id="state" name="state"   class="form-control" required>
                                            <option value="" selected disabled >استان را انتخاب کنید</option>
                                            <?php
                                            foreach($provinceList as $province){ ?>
                                                            <option <?= (isset($_POST['state']) and $_POST['state'] == $province['id'])?"SELECTED":"" ?> value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="text-danger"><?= $validator->is_exist('state')? $validator->show('state'):'' ?></span>
                                            <div class="invalid-feedback">
                                            فیلد استان نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="city" class="form-label">شهر</label>
                                            <select id="city" name="city"  class="form-control" required>
                                                <option value="0" selected disabled>ابتدا استان را انتخاب کنید</option>
                                            </select>
                                            <span class="text-danger"><?= $validator->is_exist('city')? $validator->show('city'):'' ?></span>
                                            <div class="invalid-feedback">
                                            فیلد شهر نباید خالی باشد
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="form-label">کدملی</label>
                                        <input type="text" class="form-control text-end" name="national_code" value="<?= checkExist('ncode') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('national_code')? $validator->show('national_code'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد کدملی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="text" class="form-control" name="email" value="<?= checkExist('email') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('email')? $validator->show('email'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ایمیل نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">َشماره</label>
                                        <input type="text" class="form-control text-end" name="phone" value="<?= checkExist('phone') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('phone')? $validator->show('phone'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد شماره نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label">تاریخ تولد</label>
                                            <input id="date" name="birthday" class="form-control datepicker date text-end" value="<?= checkExist('birthday') ?>" required/>
                                            <span class="text-danger"><?= $validator->show('date') ?></span>
                                            <div class="invalid-feedback">
                                            فیلد تاریخ تولد نباید خالی باشد
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">کدپستی</label>
                                        <input type="text" class="form-control text-end" name="postalCode" value="<?= checkExist('postalCode') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('postalCode')? $validator->show('postalCode'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد کدپستی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">کلمه عبور</label>
                                        <input type="password" class="form-control" name="password" value="<?= checkExist('password') ?>" required>
                                        <span class="text-danger"><?= $validator->is_exist('password')? $validator->show('password'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد پسورد نباید خالی باشد
                                        </div>
                                    </div>
                                        <div class="col-12">
                                            <label class="form-label">آدرس</label>
                                            <textarea class="form-control" rows="3"  name="address"><?=checkExist('address')?><?= checkExist('address') ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">تصویر</label>
                                            <input type="file" class="form-control" aria-label="file example" name="fileToUpload">
                                            <span class="text-danger"><?= $validator->is_exist('fileToUpload')? $validator->show('fileToUpload'):'' ?></span>
                                        </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="members_list.php" class="btn btn-danger">برگشت</a>
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
<script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
<script>
    const current_province = "<?= isset($_POST['state'])?$_POST['state']:""?>";
    const current_city = "<?= isset($_POST['city'])?$_POST['city']:""?>";
</script>
<script src="assets/js/member_add.js"></script>

</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>