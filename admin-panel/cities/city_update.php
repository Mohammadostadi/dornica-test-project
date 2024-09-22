<?php
require_once('../../app/loader.php');
$id = securityCheck($_REQUEST['id']);
$city = $db
    ->join('province', 'province.id = cities.province_id', 'LEFT')
    ->where('cities.id', $id)
    ->getOne('cities', 'province.name AS province, cities.province_id, cities.name, cities.status, cities.id');
$provinceList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('province', null, 'name, id');
$validator = new validator();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = securityCheck($_REQUEST['title']);
    $province = securityCheck($_REQUEST['province']);
    if (isset($_POST['check'])) {
        $check = $_POST['check'];
    }
    $validator->empty($title, 'title', 'فیلد عنوان شما نباید خالی باشد');
    if ($province == 'null') {
        $validator->set('province', 'فیلد استان نمیتواند خالی باشد');
    }
    if ($validator->count_error() == 0) {
        $db->where('id', $id)
            ->update('cities', [
                'province_id' => $province,
                'name' => $title,
                'status' => isset($check) ? 1 : 0
            ]);
        header('Location:citys_list.php?ok=2');
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

    <title>آپدیت کردن شهر</title>
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
                        <h6 class="mb-0 text-uppercase">آپدیت کردن شهر</h6>
                        <hr />
                        <form class="row g-3 needs-validation" novalidate action="" method="post">
                            <div class="col-lg-6">
                                <label class="form-label">استان </label>
                                <select name="province" id="" class="form-select" required>
                                    <?php
                                    foreach ($provinceList as $province) { ?>
                                        <option <?= $city['province_id'] == $province['id'] ? 'SELECTED' : '' ?>
                                            value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger"><?= $validator->show('province') ?></span>
                                <div class="invalid-feedback">
                                    فیلد استان نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">عنوان </label>
                                <input type="text" class="form-control" name="title"
                                    value="<?= checkUpdate('title', $city['name']) ?>" required>
                                <span class="text-danger"><?= $validator->show('title') ?></span>
                                <div class="invalid-feedback">
                                    فیلد عنوان نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex">
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">غیرفعال</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="check"
                                            id="flexSwitchCheckChecked" <?= $city['status'] == 1 ? 'checked' : ''; ?>>
                                    </div>
                                    <label class="form-check-label mx-1" for="flexSwitchCheckChecked">فعال</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a href="citys_list.php" class="btn btn-danger">برگشت</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"
                                                name="_insert">بروزرسانی</button>
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
    <script src="assets/js/city_edit.js"></script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>