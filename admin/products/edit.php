<?php 
require_once '../../config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();

$id = isset($_GET['id'])?$_GET['id']:"";

$product= $productModel->getProduct($id);
$category = $categoryModel->getCategoryByProductID($id);

$data = [
    'title' => 'Edit Product',
    'slot' => $template->render('blocks/edit_product', ['product' => $product,'category'=> $category]),
];
$template->view('layout_admin', $data);
