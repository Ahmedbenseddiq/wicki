<?php
require_once('../config/database.php');
require_once('class/tags.php');

class TagDAO{
    private $db;
    private Tag $tag;

    public function __construct(){
        $this->db = Database::getInstance();        
    }

    public function deletetag($categoryId)
    {
        $stmt = $this->db->prepare("DELETE FROM tags WHERE tag_id = :id");
        $stmt->bindParam(":id", $categoryId);
        $stmt->execute();
    }

    public function getTagById($tagId) {
        $stmt = $this->db->prepare("SELECT * FROM tags WHERE tag_id = :tag_id");
        $stmt->bindParam(":tag_id", $tagId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insertTag($tag_name){
        $stmt = $this->db->prepare("INSERT INTO tags (tag_name) VALUES( :tag_name)");
        $stmt->bindParam(":tag_name",$tag_name);
        $stmt->execute();
        

    }

    public function updateTag($tagId, $tagName) {
        try {
            $stmt = $this->db->prepare("UPDATE tags SET tag_name = :tag_name WHERE tag_id = :tag_id");
            $stmt->bindParam(":tag_id", $tagId);
            $stmt->bindParam(":tag_name", $tagName);
            $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Error updating tag: " . $e->getMessage());
        }
    }

    public function countTags(){
        $stmt = $this->db->query("SELECT count(tag_id) as count FROM `tags`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN,0);
        return $result; 
    }
    public function getTags(){
        $stmt = $this->db->query("SELECT * FROM tags");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

   
}