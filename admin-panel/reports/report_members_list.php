<?php

$prefix = 'members';
require_once('../../app/loader.php');

sortInTable($prefix, 'report_members_list', 'page');


if (isset($_POST['report'])) {
    if ((!empty($_POST['start_date']) and empty($_POST['end_date'])) or (empty($_POST['start_date']) and !empty($_POST['end_date']))) {
        redirect('report_members_filter.php', 11);
    }
    if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
        list($s_year, $s_month, $s_day) = explode('/', $_POST['start_date']);
        list($e_year, $e_month, $e_day) = explode('/', $_POST['end_date']);
        if (($s_year > $e_year) or ($s_year <= $e_year and $s_month > $e_month) or ($s_year <= $e_year and $s_month <= $e_month and $s_day > $e_day)) {
            redirect('report_members_filter.php', 10);
        }
    }
}

$data = [
    'id' => 'in',
    'status' => '=',
    'province_id' => '=',
    'gender' => '=',
    'city_id' => "in",
    "start_date/end_date/setdate" => 'date',
];
reportCheck($db, 'members', $data);



$members = $db->join('province', 'members.province_id=province.id', 'LEFT')
    ->join('cities', 'members.city_id=cities.id', 'LEFT')
    ->orderBy($sortField, $sortOrder)
    ->get('members', null, ' members.id, members.status , members.setdate , members.postal_code , members.birthday , members.image
, members.phone , members.email , CONCAT(members.fname ," ", members.lname) as members , members.gender,members.id , members.province_id ,
members.city_id , cities.name as city , province.name as province');
?>
<!doctype html>
<html lang="en" dir="rtl">

<head>
    <?php require_once("../../layout/css.php"); ?>
    <title>گزارش لیست مشتریان</title>
    <link type="text/css" rel="stylesheet"
        href="../../assets/persianDatepicker-master/css/persianDatepicker-default.css" />
</head>

<body>
    <div class="wrapper">
            <!--breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">مشتریان</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">لیست مشتری</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table align-middle " id="example2">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>
                                                        نام و نام خانوادگی
                                                    </th>
                                                    <th>
                                                        جنسیت
                                                    </th>
                                                    <th>
                                                        استان
                                                    </th>
                                                    <th>
                                                        شهر
                                                    </th>
                                                    <th>
                                                        تاریخ
                                                    </th>
                                                    <th>
                                                        وضعیت
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($members as $key => $member) {
                                                    $key++; ?>
                                                    <tr>
                                                        <td><?= $member['members'] ?></td>
                                                        <td><?= $member['gender'] == 0?"مرد":"زن" ?></td>
                                                        <td><?= $member['province'] ?></td>
                                                        <td><?= $member['city'] ?></td>

                                                        <td><?= jdate('Y/m/d', strtotime($member['setdate'])) ?></td>
                                                        <td><?= status('active', $member['status']) ?></td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
    </div>
    <?php require_once("../../layout/js.php"); ?>



</body>

</html>