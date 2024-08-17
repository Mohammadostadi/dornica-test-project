<?php


require_once('../app/loader.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_REQUEST['id'];
    
    $db->where('id', $id)->delete('category');
    redirect('products_categories_list.php', 1);
}