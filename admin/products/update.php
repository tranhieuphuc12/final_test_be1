<?php 
require_once '../../config/database.php';
$template = new Template();
$productModel = new Product();

$id = isset($_POST['id'])?$_POST['id']:"";
$name = isset($_POST['name'])?$_POST['name']:"";
$description = isset($_POST['description'])?$_POST['description']:"";
$price = isset($_POST['price'])?$_POST['price']:"";
$category = isset($_POST['category'])?$_POST['category']:"";

$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/final_test_be1/public/images/";
$path = $target_dir . basename($_FILES['photo']['name']);

try {
    move_uploaded_file($_FILES['photo']['tmp_name'], $path);
} catch (\Throwable $th) {
    $_SESSION['alert']="Edit product unsuccessfully !!!";
    header("location: http://localhost/final_test_be1/admin/index.php");
}


if (!empty($name)&& !empty($price)&& !empty($description) && !empty($category)) {
    try {
        $productModel->update($id,$name,$description,$price,$_FILES['photo']['name'],$category);
        $_SESSION['alert']="Edit product successfully !!!";        
        header("location: http://localhost/final_test_be1/admin/index.php");
    } catch (\Throwable $th) {
        $_SESSION['alert']="Edit product unsuccessfully !!!";
        
        header("location: http://localhost/final_test_be1/admin/index.php");
    }
    
}
