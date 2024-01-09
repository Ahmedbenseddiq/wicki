<?php

require_once 'connexion.php';
require_once 'Tag.php'; 

class TagDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_all_tags() {
        $query = "SELECT * FROM tags";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tags_data = $stmt->fetchAll();
        $tags = [];
        foreach ($tags_data as $tag_data) {
            $tag = new Tag(
                $tag_data["tag_id"],
                $tag_data["tag_name"]
            );
            $tags[] = $tag;
        }
        return $tags;
    }

    public function get_tag_by_id($tag_id) {
        $query = "SELECT * FROM tags WHERE tag_id = :tag_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_id', $tag_id);
        $stmt->execute();
        $tag_data = $stmt->fetch();

        if ($tag_data) {
            $tag = new Tag(
                $tag_data["tag_id"],
                $tag_data["tag_name"]
            );
            return $tag;
        }

        return null; // If tag not found
    }

    public function create_tag($tag_name) {
        $query = "INSERT INTO tags (tag_name) VALUES (:tag_name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag_name);
        $stmt->execute();

        return $this->db->lastInsertId(); // Return the ID of the inserted tag
    }

    public function update_tag(Tag $tag) {
        $query = "UPDATE tags SET tag_name = :tag_name WHERE tag_id = :tag_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag->getTag_name());
        $stmt->bindParam(':tag_id', $tag->getTag_id());
        $stmt->execute();

        return true; // Return true if update successful
    }

    public function delete_tag($tag_id) {
        $query = "DELETE FROM tags WHERE tag_id = :tag_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_id', $tag_id);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Return true if any rows were affected
    }
}
