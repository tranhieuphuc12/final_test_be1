<?php 
require_once '../config/database.php';
$template = new Template();
$productModel = new Product();

// if (isset($_GET['search'])) {
//     $keyword = $_GET['search'];
//     $products = $productModel->getProductsBySearching($keyword,1,100);
// }else{
$products= $productModel->getProducts();
// }
$data = [
    'title' => 'Home',
    'slot' => $template->render('blocks/manage_product', ['products' => $products]),
];
$template->view('layout_admin', $data);
