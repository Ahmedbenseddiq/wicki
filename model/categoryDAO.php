<?php
require_once('../config/database.php');
require_once('class/category.php');
class CategoryDAO{
    private $db;
    
    private Category $category;

    public function __construct(){
        $this->db = Database::getInstance();
        
    }

    
    public function get_cats() {
        $stmt = $this->db->query("SELECT * FROM categories;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function getCatById($categoryId) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE cat_id = :id");
        $stmt->bindParam(":id", $categoryId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }



    private function getImageData($category){
    if (!empty($category['image'])) {
        return $category['image'];
    } else if (!empty($category['uploaded_file']['tmp_name'])) {
        // If an image is uploaded, read its content
        $imageContent = file_get_contents($category['uploaded_file']['tmp_name']);
        return $imageContent;
    } else {
        return null;
    }
}

    public function insertCat($name, $image) {
        $stmt = $this->db->prepare("INSERT INTO categories (cat_name, image) VALUES (:name, :img)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":img", $image);
        $stmt->execute();
    }
    
    
    public function deleteCat($categoryId)
    {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE cat_id = :id");
        $stmt->bindParam(":id", $categoryId);
        $stmt->execute();
    }
    
    public function countCategories(){
        $stmt = $this->db->query("SELECT count(cat_id) as count FROM `categories`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN ,0);
        return $result; 
    }


    public function update_category($cat_id, $cat_name, $img) {
        if ($img === null) {
            $stmt = $this->db->prepare("UPDATE categories SET cat_name = :cat_name WHERE cat_id = :cat_id");
        } else {
            $stmt = $this->db->prepare("UPDATE categories SET cat_name = :cat_name, image = :img WHERE cat_id = :cat_id");
            $stmt->bindParam(":img", $img);
        }
    
        $stmt->bindParam(":cat_id", $cat_id);
        $stmt->bindParam(":cat_name", $cat_name);
        $stmt->execute();
    }
    
}