<?php 
require_once 'config/database.php';
$template = new Template();
$products = null;

$data = [
    'title' => 'Home',
    'slot' => $template ->render('blocks/product_list',[ 'products' => $products]),                                            
];
$template->view('layout_main',$data);
