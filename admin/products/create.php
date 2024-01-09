<?php 
require_once '../../config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();

$products= $productModel->getProducts();
$categories = $categoryModel->getCategories();
$data = [
    'title' => 'Create Product',
    'slot' => $template->render('blocks/create_product', ['products' => $products,'categories'=>$categories]),
];
$template->view('layout_admin', $data);
