<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = securityCheck($_REQUEST['id']);
    $path = $db->where('id', $id)
    ->getOne('blogs', 'image'); 
    if(file_exists('../../'.$path['image']))
        unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('blogs');

    redirect('blogs_list.php', 1);
}