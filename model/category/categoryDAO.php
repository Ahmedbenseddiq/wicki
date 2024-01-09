<?php

require_once '../connexion.php'; 
require_once 'category.php'; 


class CategoryDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_all_categories() {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $categories_data = $stmt->fetchAll();
        $categories = [];
        foreach ($categories_data as $category_data) {
            $category = new Category(
                $category_data["category_id"],
                $category_data["category_name"],
                $category_data["creation_date"]
            );
            $categories[] = $category;
        }
        return $categories;
        // print_r($categories);
        // die();
    }

    public function get_category_by_id($category_id) {
        $query = "SELECT * FROM categories WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        $category_data = $stmt->fetch();

        if ($category_data) {
            $category = new Category(
                $category_data["category_id"],
                $category_data["category_name"],
                $category_data["creation_date"]
            );
            return $category;
        }

        return null;
    }

    public function create_category($category_name, $creation_date) {
        $query = "INSERT INTO categories (category_name, creation_date) VALUES (:category_name, :creation_date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':creation_date', $creation_date);
        $stmt->execute();

        return $this->db->lastInsertId(); 
    }

    public function update_category(Category $category) {
        $query = "UPDATE categories SET category_name = :category_name, creation_date = :creation_date WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_name', $category->getCategory_name());
        $stmt->bindParam(':creation_date', $category->getCreation_date());
        $stmt->bindParam(':category_id', $category->getCategory_id());
        $stmt->execute();

        return true; 
    }

    public function delete_category($category_id) {
        $query = "DELETE FROM categories WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();

        return $stmt->rowCount() > 0; 
    }
}

