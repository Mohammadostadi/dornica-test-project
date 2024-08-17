<?php
$pages;$page = 1;
session_start();
if(isset($prefix)){
    $sortField = isset($_SESSION[$prefix."_sort_field"])?$_SESSION[$prefix."_sort_field"]:"$prefix.id";
    $sortOrder = isset($_SESSION[$prefix."_sort_order"])?$_SESSION[$prefix."_sort_order"]:"ASC";
}
require_once('Model/DB.php');
require_once('Controller/functions.php');
require_once('Helper/validator.php');
require_once('Controller/setDate.php');
require_once('Helper/jdf.php');
require_once('Helper/filter.php');