<?php 

require_once('../../app/loader.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
    $id = (int) $_REQUEST['id'];
    $res = $db->where('brand_id', $id)
    ->getOne('products');
    if(is_countable($res)){
        redirect('brands_list.php', 3);
    }
    $db->where('id', $id)->delete('brand');
    redirect('brands_list.php', 1);
}

