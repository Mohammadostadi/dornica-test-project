<?php

require_once('../../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = securityCheck($_REQUEST['id']);
    $db->where('id', $id)
    ->delete('payment_type');

    redirect('payments_type.php', 1);
}