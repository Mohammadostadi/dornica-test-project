<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = securityCheck($_REQUEST['id']);
    
    $path = $db->where('id', $id)
    ->getOne('ads', 'image'); 
    unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('products');

    redirect('products_list.php', 1);
}