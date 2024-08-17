<?php
require_once('../../app/loader.php');

$provinceList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('province', null, 'id, name');

$id = securityCheck($_GET['id']);
$member = $db->where('id', $id)
->getOne('members');

$validator = new validator();
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['_insert'])){
        $fname = securityCheck($_REQUEST['fname']);
        $lname = securityCheck($_REQUEST['lname']);
        $email = securityCheck($_REQUEST['email']);
        $phone = securityCheck($_REQUEST['phone']);
        $postalCode = securityCheck($_REQUEST['postalCode']);
        $ncode = securityCheck($_REQUEST['ncode']);
        $address = securityCheck($_REQUEST['address']);
        $bdate = securityCheck($_REQUEST['birthday']);
        $picture = $validator->imageUpdate("../../assets/images/members/", $_FILES["fileToUpload"], "fileToUpload", $member['image']);
        if(isset($_POST['check'])){
            $checkList = $_POST['check'];
        }
        $validator->empty($fname, 'fname', 'فیلد نام شما نباید خالی باشد');
        $validator->empty($lname, 'lname', 'فیلد نام خانوداگی شما نباید خالی باشد');
        $validator->empty($email, 'email', 'فیلد ایمیل شما نباید خالی باشد');
        $validator->empty($ncode, 'ncode', 'فیلد کدملی شما نباید خالی باشد');
        $validator->empty($phone, 'phone', 'فیلد شماره همراه شما نباید خالی باشد');
        $validator->existValue('members', 'national_code', $ncode, 'فیلد کدملی  تکراری میباشد', $member['national_code']);
        $validator->existValue('members', 'email', $email, 'فیلد ایمیل  تکراری میباشد', $member['email']);
        $validator->existValue('members', 'phone', $phone, 'فیلد شماره همراه  تکراری میباشد', $member['phone']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validator->set('email', 'فرمت ایمیل صحیح نمیباشد');  
        }if(!preg_match ("/^[0-9]*$/", $phone)){
            $validator->set('phone', 'فقط عدد قابل قبول است');  
        }
        if(!isset($_POST['state'])){
            $validator->set('state', 'فیلد استان شما نباید خالی باشد');
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
            array_map('unlink', glob("../../assets/images/upload/*.*"));
            if (isset($picture)) {
                $db->where('id', $id)
                ->update('members', [
                    'fname'=>$fname,
                    'lname'=>$lname,
                    'email'=>$email,
                    'phone'=>$phone,
                    'address'=>$address,
                    'birthday'=>$bdate,
                    'image'=>$picture,
                    'national_code'=>$ncode,
                    'postal_code'=>$postalCode,
                    'city_id'=>$_REQUEST['city'],
                    'province_id'=>$_REQUEST['state'],
                    'status'=>isset($checkList)?1:0,
                ]);
                redirect('members_list.php', 2);
            }
            $db->where('id', $id)
                ->update('members', [
                'fname'=>$fname,
                'lname'=>$lname,
                'email'=>$email,
                'phone'=>$phone,
                'address'=>$address,
                'birthday'=>$bdate,
                'national_code'=>$ncode,
                'postal_code'=>$postalCode,
                'city_id'=>$_REQUEST['city'],
                'province_id'=>$_REQUEST['state'],
                'status'=>isset($checkList)?1:0,
            ]);
            redirect('members_list.php', 2);
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
    <title>آپدیت کردن ممبر</title>
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
                                <h6 class="mb-0 text-uppercase">آپدیت کردن ممبر</h6>
                                <hr/>
                                <form class="row g-3 needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="col-6">
                                        <label class="form-label">نام </label>
                                        <input type="text" class="form-control" name="fname" value="<?= checkUpdate('fname', $member['fname']) ?>"required>
                                        <span class="text-danger"><?= $validator->is_exist('fname')? $validator->show('fname'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" name="lname" value="<?= checkUpdate('lname', $member['lname']) ?>"required>
                                        <span class="text-danger"><?= $validator->is_exist('lname')? $validator->show('lname'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد نام خانوادگی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="state" class="form-label">استان</label>
                                        <select id="state" name="state"   class="form-control">
                                            <!-- <option value="0" selected disabled>استان را انتخاب کنید</option> -->
                                            <?php
                                            foreach($provinceList as $province){ ?>
                                                            <option <?= $member['province_id'] == $province['id']?"SELECTED":"" ?> value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="text-danger"><?= $validator->is_exist('state')? $validator->show('state'):'' ?></span>
                                                    </div>
                                        <div class="col-6">
                                                <label for="city" class="form-label">شهر</label>
                                                <select id="city" name="city"  class="form-control">
                                                <?php $cities = $db->where('province_id', $member['province_id'])->get('cities', null,'name, id') ?>
                                                <?php foreach($cities as $city){ ?>
                                                    <option <?= $member['city_id'] == $city['id']?"SELECTED":"" ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                            <span class="text-danger"><?= $validator->is_exist('city')? $validator->show('city'):'' ?></span>
                                        </div>
                                    <div class="col-6">
                                        <label class="form-label">کدملی</label>
                                        <input type="text" class="form-control" name="ncode" value="<?= checkUpdate('ncode', $member['national_code']) ?>"required>
                                        <span class="text-danger"><?= $validator->is_exist('ncode')? $validator->show('ncode'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد کدملی نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">ایمیل</label>
                                        <input type="text" class="form-control" name="email" value="<?= checkUpdate('email', $member['email']) ?>"required>
                                        <span class="text-danger"><?= $validator->is_exist('email')? $validator->show('email'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد ایمیل نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">َشماره</label>
                                        <input type="text" class="form-control" name="phone" value="<?= checkUpdate('phone', $member['phone']) ?>"required>
                                        <span class="text-danger"><?= $validator->is_exist('phone')? $validator->show('phone'):'' ?></span>
                                        <div class="invalid-feedback">
                                            فیلد شماره نباید خالی باشد
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label">تاریخ تولد</label>
                                            <input id="date" name="birthday" class="form-control datepicker" value="<?= checkUpdate('birthday', changeDate($member['birthday'], false)) ?>" required/>
                                            <div class="invalid-feedback">
                                                فیلد تاریخ نباید خالی باشد
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">کدپستی</label>
                                        <input type="text" class="form-control" name="postalCode" value="<?= checkUpdate('postalCode', $member['postal_code']) ?>">
                                        <span class="text-danger"><?= $validator->is_exist('postalCode')? $validator->show('postalCode'):'' ?></span>
                                    </div>
                                        <div class="col-12">
                                            <label class="form-label">آدرس</label>
                                            <textarea class="form-control" id="editor1" rows="3"  name="address"><?=checkUpdate('address', $member['address'])?></textarea>
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label">تصویر</label>
                                        <div class="row">
                                            <div class="col-12 text-center bg-light my-3 rounded preview">
                                                <img src="../<?= $member['image']?>" class="rounded-circle shadow m-3" id="img" width="100" height="100" alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control" aria-label="file example" id="fileToUpload" name="fileToUpload">
                                            </div>
                                        </div>
                                        <span class="text-danger"><?= $validator->show('fileToUpload') ?></span>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" name="check" id="flexSwitchCheckChecked" <?= $member['status']==1? 'checked':  '' ; ?> >
                                            </div>                                    
                                            <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-grid">
                                                    <a href="members_list.php" class="btn btn-danger">برگشت</a>
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

<script>
        $('#city').change(function () {
                const city = $(this).find('option:selected').text();
            })
            
            $('#state').change(function () {
            const id = $(this).find('option:selected').val();
            $.ajax({
                method:'post',
                url:'cities.php',
                data:{id:id},
                success:function(msg) {
                    $('#city').html(msg);
                }
            })
        });
</script>
<script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
<script type="text/javascript">
    $("#date").persianDatepicker({formatDate: "YYYY/0M/0D"});
</script>
<script src="../../assets/ckeditor/ckeditor.js"></script>
<script src="../../assets/ckeditor/adapters/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#editor1').ckeditor();
    });
</script>
<?php require_once('../../layout/update_image.php') ?>
</body>

<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->
</html>