<?php 
class Product extends Database{
    // public function store() {
    //     $sql = parent::$connection->prepare("");
    // }    
    
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