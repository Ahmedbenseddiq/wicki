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

    private function getImageData($category)
{
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
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }


        public function updateCat($categoryId, $newCategoryName, $newImage)
        {
            try {
                // Check if the category exists
                $stmt = $this->db->prepare("SELECT * FROM categories WHERE cat_id = :id");
                $stmt->bindParam(":id", $categoryId);
                $stmt->execute();
                $existingCategory = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$existingCategory) {
                    return false; // Category not found
                }

                // Prepare the update query
                $updateQuery = "UPDATE categories SET cat_name = :name, image = :img WHERE cat_id = :id";
                $updateStmt = $this->db->prepare($updateQuery);
                $updateStmt->bindParam(":name", $newCategoryName);
                $updateStmt->bindParam(":img", $newImage);
                $updateStmt->bindParam(":id", $categoryId);

                // Execute the update query
                $updateStmt->execute();

                return true; // Update successful
            } catch (PDOException $e) {
                
                return false;
            }
    }


}