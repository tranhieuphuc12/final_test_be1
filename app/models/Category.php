<?php
class Category extends Database
{
    public function getCategories()
    {
        $sql = parent::$connection->prepare("SELECT * FROM `categories`");
        return parent::select($sql);

    }

    public function getCategoryByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `categories` 
        INNER JOIN products_categories
        ON categories.id = products_categories.category_id
        WHERE products_categories.product_id = ?;");
        $sql->bind_param('i',$productID);
        return parent::select($sql)[0];

    }

}
