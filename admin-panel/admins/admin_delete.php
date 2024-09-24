<?php

require_once('../../app/loader.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_REQUEST['id'];
    $path = $db->where('id', $id)
    ->getOne('admin', 'image'); 
    if(file_exists('../../'.$path['image']))
        unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('admin');
    redirect('admins_list.php', 1);
}