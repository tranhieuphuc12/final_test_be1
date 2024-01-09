<?php 
require_once '../../config/database.php';
$template = new Template();
$productModel = new Product();

$id = isset($_GET['id'])?$_GET['id']:"";

if (!empty($id)) {
    try {
        $productModel->destroy($id);
        $_SESSION['alert']="Delete product successfully !!!";
        header("location: http://localhost/final_test_be1/admin/index.php");
    } catch (\Throwable $th) {
        $_SESSION['alert']="Delete product unsuccessfully !!!";        
        header("location: http://localhost/final_test_be1/admin/index.php");
    }
    
}
