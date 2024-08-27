<?php

if(isset($_POST['province_id']) && is_numeric($_POST['province_id'])){
    $province_id = (int) $_POST['province_id'];
    $cities = $db->where('province_id', $province_id)
    ->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('cities', null, 'id, name');
    if(count($cities) > 0){
    ?>
                <option value="">شهر را انتخاب کنید</option>
    <?php 
        foreach($cities as $city){ 
            ?>
                <option <?= ((isset($_POST['city_id']) and $_POST['city_id'] == $city['id']) OR (isset($_POST['member']) and $_POST['member'] == $city['id']))?"SELECTED":"" ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
            <?php } 
            ?>
    <?php }else{ ?>
        <option value="">داده ایی برای نمایش وجود ندارد</option>
    <?php }
exit();
}
?>