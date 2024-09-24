<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = securityCheck($_REQUEST['id']);
    $db->where('id', $id)
    ->delete('pages');

    redirect('pages_list.php', 1);
}