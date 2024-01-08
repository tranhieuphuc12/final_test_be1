<?php
class Category extends Database
{
    public function getCategories(){   
        $sql = parent::$connection->prepare("SELECT * FROM `categories`");
        return parent::select($sql);
        
    }

 

    
}
