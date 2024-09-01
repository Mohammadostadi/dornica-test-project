<?php
session_start();
$pages;$page = 1;
if(isset($prefix)){
    $sortField = isset($_SESSION[$prefix."_sort_field"])?$_SESSION[$prefix."_sort_field"]:"$prefix.id";
    $sortOrder = isset($_SESSION[$prefix."_sort_order"])?$_SESSION[$prefix."_sort_order"]:"DESC";
}
require_once('Model/DB.php');
require_once('Controller/functions.php');
require_once('Helper/validator.php');
require_once('Controller/setDate.php');
require_once('Helper/jdf.php');
require_once('Helper/filter.php');
if(!isset($_SESSION['user'])){
    redirect('../../auth/sign-in.php', 7);
}
if(!has_access()){
    header('Location:../../error/error-403.php');
}
if(isset($_GET['id'])){
    $res = $db->where('id', securityCheck($_GET['id']))
    ->getValue('admin', 'COUNT(*)');
    if($res == 0 or !is_numeric($_GET['id']))
            redirect('../../error/error-403.php');
}