<?php
require_once('../../app/loader.php');
require_once('../../app/Controller/cities.php');

$membersList = $db->where('status', 1)
    ->get('members', null, 'id, fname, lname, national_code');

$province = $db->get('province', null, 'province.name , province.id ');


?>
<!doctype html>
<html lang="en" dir="rtl">

<head>
    <?php require_once("../../layout/css.php"); ?>
    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />

    <link type="text/css" rel="stylesheet"
        href="../../assets/persianDatepicker-master/css/persianDatepicker-default.css" />
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <title>گزارش گیری لیست مشتریان</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once("../../layout/header.php"); ?>
        <?php require_once("../../layout/asidebar.php"); ?>
        
        <main class="page-content">
            <?php require_once("../../layout/message.php"); ?>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">گزارش مشتریان</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> گزارش مشتریان </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body py-3 mt-5 w-100">
                    <div class="row d-flex justify-content-center w-100 ">
                        <div class="col-12 col-lg-4 d-flex w-100 ">
                            <div class="card border shadow-none w-100">
                                <div class="card-body w-100 ">
                                    <form class="row g-3 was-validation needs-validation" enctype="multipart/form-data"
                                        novalidate method="post" action="report_members_list.php" id="form">
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">مشتریان</label>
                                            <select name="id[]" class="multiple-select" multiple>

                                                <option value="0">انتخاب همه </option>
                                                <?php foreach ($membersList as $member) { ?>
                                                    <option <?= (isset($_POST['id']) && in_array($member['id'], explode(',', $_POST['id']))) ? "SELECTED" : "" ?>
                                                        value="<?= $member['id'] ?>">
                                                        <?= $member['fname'] . ' ' . $member['lname'] . " - " . $member['national_code'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">جنسیت</label>
                                            <select class="form-select" name="gender" id="gender">
                                                <option value="">جنسیت مورد نظر را انتخاب کنید</option>
                                                <option value="0">مرد</option>
                                                <option value="1">زن</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">استان</label>
                                            <select id="province" name="province_id" class="form-select">
                                                <option value="<?= null ?>">استان را انتخاب کنید</option>
                                                <?php foreach ($province as $value) {
                                                    ?>
                                                    <option <?= (isset($_POST['province']) and $_POST['province'] == $value['id']) ? 'selected' : '' ?>
                                                        value="<?= $value['id'] ?>"><?= $value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">شهر</label>
                                            <select id="city" name="city_id[]" class="multiple-select" multiple>
                                                <option value="<?= null ?>" disabled>ابتدا استان را انتخاب کنید</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">از تاریخ</label>
                                            <input class="form-control text-end" name="start_date" id="start_date"
                                                value="<?= isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>">
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">تا تاریخ</label>
                                            <input class="form-control text-end" name="end_date" id="end_date"
                                                value="<?= isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>">
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="form-label">وضعیت</label>
                                            <select class="form-select" name="status" id="status">
                                                <option value="">وضعیت مورد نظر را انتخاب کنید</option>
                                                <option value="1">فعال</option>
                                                <option value="0">غیر فعال</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex flex-row justify-content-end">
                                                <button formtarget="_blank" class="btn btn-primary" type="submit" id="report" name="report">گزارش
                                                    گیری</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <?php require_once("../../layout/footer.php"); ?>
    </div>
    <?php require_once("../../layout/js.php"); ?>
    <script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../../assets/js/form-select2.js"></script>
    <script>
        const current_province = $("#province").val();
        const current_city = "<?= isset($_POST['city']) ? $_POST['city'] : "" ?>";
    </script>
    <script src="assets/js/report_member_filter.js"></script>
</body>

</html>