<?php
require_once('../app/loader.php');

if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $id = (int) $_POST['id'];
    $cities = $db->where('province_id', $id)
    ->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('cities', null, 'id, name');
    ?>
                <option value="">شهر را انتخاب کنید</option>
    <?php 
        foreach($cities as $city){ ?>
                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
            <?php } ?>
    <?php
}else{
    header('location:member_add.php');
}