<?php
require_once('../../app/loader.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $path = $db->where('id', $id)
    ->getOne('brand', 'logo'); 
    if(file_exists('../../'.$path['logo']))
        unlink('../../'.$path['logo']);
    $db->where('id', $id)->delete('brand');
    redirect('brands_list.php', 1);
}

