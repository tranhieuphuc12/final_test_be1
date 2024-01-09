<?php 
class Product extends Database{
    public function update($id,$name,$desc,$price,$photo,$category){
        
        $photo = empty($photo)?"default.jpg":$photo;
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=?,`product_photo`=? WHERE `id` = ?");
        $sql->bind_param('ssisi',$name,$desc,$price,$photo,$id);
        $sql->execute();
   
        $sql = parent::$connection->prepare("UPDATE `products_categories` SET `category_id`=? WHERE `product_id`=?");
        $sql->bind_param('ii',$category,$id);
        
        return $sql->execute();
        
    }
    public function getProductIDByName($name){
        $sql = parent::$connection->prepare("SELECT id FROM `products` where product_name like ?");        
        $sql->bind_param('s',$name);
        return parent::select($sql)[0]['id'];
    }
    public function destroy($id){
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE `id` = ?");        
        $sql->bind_param('i',$id);
        $sql->execute();
       
        $sql = parent::$connection->prepare(" DELETE FROM `products_categories` WHERE `product_id` = ?");        
        $sql->bind_param('i',$id);
        $sql->execute();
        
        return ;
    }
    public function store($name,$desc,$price,$photo,$category){
        
        $photo = empty($photo)?"default.jpg":$photo;
        $sql = parent::$connection->prepare("INSERT INTO `products`(`product_name`, `product_description`, `product_price`, `product_photo`) VALUES (?,?,?,?)");
        $sql->bind_param('ssis',$name,$desc,$price,$photo);
        $sql->execute();

        $productModel = new Product();
        $id = $productModel->getProductIDByName($name);
        $sql = parent::$connection->prepare("INSERT INTO `products_categories`(`product_id`, `category_id`) VALUES (?,?)");
        $sql->bind_param('ii',$id,$category);
        
        return $sql->execute();
        
    }



    public function totalProductsByCategoryID($id){
        $sql = parent::$connection->prepare("SELECT Count(*) AS total FROM `products`
        INNER JOIN products_categories
        ON products_categories.product_id = products.id
        WHERE products_categories.category_id = ? ");
        $sql->bind_param('i', $id);
        $total = parent::select($sql)[0]['total']; 
        return $total;
        
    }
    public function totalProducts(){
        $sql = parent::$connection->prepare("SELECT COUNT(*) AS total FROM `products`");        
        return parent::select($sql)[0]['total'];
    }

    public function getProductByPage($page, $perPage){
        $start = ($page - 1 ) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `products` LIMIT ? , ?;");   
        $sql->bind_param('ii',$start,$perPage);     
        return parent::select($sql);
    }

    public function getProduct($productID){
        $sql = parent::$connection->prepare("SELECT * FROM `products` WHERE id like ? ");
        $sql->bind_param('s',$productID);
        return parent::select($sql)[0];
    }
    public function getProducts(){
        $sql = parent::$connection->prepare("SELECT * FROM `products`");
        return parent::select($sql);
    }
    public function getProductsByCategoryID($id,$page,$perPage){   
        $start = ($page - 1 ) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `products`
        INNER JOIN products_categories
        ON products_categories.product_id = products.id
        WHERE products_categories.category_id = ? LIMIT $start,$perPage");
        $sql->bind_param('i', $id);
        return parent::select($sql);
        
    }
    public function getProductsBySearching($keyword,$page,$perPage){   
        $keyword = "%$keyword%";
        $start = ($page - 1 ) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `products` WHERE product_name like ? or product_description like ? LIMIT $start,$perPage");
        $sql->bind_param('ss', $keyword,$keyword);
        return parent::select($sql);
        
    }
    public function totalProductsBySearching($keyword){   
        $keyword = "%$keyword%";
        $sql = parent::$connection->prepare("SELECT COUNT(*) AS total FROM `products` WHERE product_name like ? or product_description like ?");
        $sql->bind_param('ss', $keyword,$keyword);
        return parent::select($sql)[0]['total'];
        
    }

}