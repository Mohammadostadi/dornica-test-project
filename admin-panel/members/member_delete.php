<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = securityCheck($_REQUEST['id']);
    $path = $db->where('id', $id)
    ->getOne('ads', 'image');
    if(file_exists('../../'.$path['image']))
        unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('members');

    header('Location:members_list.php?ok=1');
}