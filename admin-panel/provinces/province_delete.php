<?php

require_once('../app/loader.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_REQUEST['id'];
    $db->where('id', $id)->delete('province');
    
    redirect('provinces_list.php', 1);
}