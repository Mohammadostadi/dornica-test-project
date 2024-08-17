<?php

require_once('../../app/loader.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = securityCheck($_REQUEST['id']);
    
    
    $db->where('id', $id)
    ->delete('blog_category');
    
    redirect('blogs_categories_list.php', 1);
}