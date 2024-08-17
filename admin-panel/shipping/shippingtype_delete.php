<?php

require_once('../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = securityCheck($_REQUEST['id']);
    $db->where('id', $id)
    ->delete('shiping_type');

    redirect('shippingtypes_list.php', 1);
}