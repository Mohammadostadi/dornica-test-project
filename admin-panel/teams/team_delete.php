<?php


require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = securityCheck($_REQUEST['id']);
    
    $path = $db->where('id', $id)
    ->getOne('teams', 'image'); 
    if(file_exists('../../'.$path['image']))
        unlink('../../'.$path['image']);
    $db->where('id', $id)
    ->delete('teams');

    redirect('teams_list.php', 1);
}