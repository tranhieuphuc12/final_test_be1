<?php 
require_once 'config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
}
$categories = $categoryModel->getCategories();
$product = $productModel->getProduct($productID);

$data = [
    'title' => 'Detail',
    'slot' => $template->render('blocks/detail_product', ['product' => $product, 'categories' => $categories]),
];
$template->view('layout_main', $data);
