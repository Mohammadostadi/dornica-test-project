<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_GET['id'])){
    $id = securityCheck($_REQUEST['id']);
    $path = $db->where('id', $id)
    ->getOne('ads', 'image'); 
    if(file_exists('../../'.$path['image']))
        unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('ads');

    redirect('ads_list.php', 1);
}