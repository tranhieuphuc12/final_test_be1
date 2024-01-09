<?php
require_once 'config/database.php';

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();
$page = 1;
$perPage = 2;
$total = $productModel->totalProducts();

if (isset($_SESSION['username'])) {
    header("location: http://localhost/final_test_be1/login.php");
}

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $page = isset($_GET['page']) ? $_GET['page'] : $page;
    $products = $productModel->getProductsByCategoryID($category_id, $page, $perPage);
    $total = $productModel->totalProductsByCategoryID($category_id);

} else if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $page = isset($_GET['page']) ? $_GET['page'] : $page;
    $products = $productModel->getProductsBySearching($keyword,$page,$perPage);
    $total = $productModel->totalProductsBySearching($keyword);

} else if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $products = $productModel->getProductByPage($page, $perPage);
} else {
    $products = $productModel->getProductByPage($page, $perPage);

}

$categories = $categoryModel->getCategories();
$data = [
    'title' => 'Home',
    'slot' => $template->render('blocks/product_list', ['products' => $products, 'perPage' => $perPage, 'total' => $total]),
];
$template->view('layout_main', $data);
