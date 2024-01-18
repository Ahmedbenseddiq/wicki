<?php
require_once('../config/database.php');
require_once('class/wiki.php');

class WikiDAO
{
    private $db;
    private Wiki $wiki;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function get_wikis()
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getWikisByCategoryId($categoryId) {
        $sql = "SELECT * FROM wikis WHERE category_id = :category_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_wikis_by_category($cat_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE cat_id = :cat_id ORDER BY wiki_date LIMIT 6;");
        $stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getWikiById($wiki_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE wiki_id = :wiki_id");
        $stmt->bindParam(':wiki_id', $wiki_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    

    public function insertWiki($titre, $contenu, $category_id, $tags, $imageContent, $user_id)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO wikis (titre, contenu, cat_id, image, user_id) VALUES (:titre, :contenu, :category_id, :image, :user_id)");
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindParam(':image', $imageContent, PDO::PARAM_LOB);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $wiki_id = $this->db->lastInsertId();


            foreach ($tags as $tag_id) {
                $stmt = $this->db->prepare("INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");
                $stmt->bindParam(':wiki_id', $wiki_id, PDO::PARAM_INT);
                $stmt->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
                $stmt->execute();
            }

            $this->db->commit();

            return $wiki_id;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }


    public function toggleArchiveStatus($wikiId) {
        $wiki = $this->getWikiById($wikiId);
    
        if ($wiki) {
            $newStatus = ($wiki['status'] == 1) ? 0 : 1; 
    
            $stmt = $this->db->prepare("UPDATE wikis SET status = :status WHERE wiki_id = :wiki_id");
            $stmt->bindParam(':status', $newStatus, PDO::PARAM_INT);
            $stmt->bindParam(':wiki_id', $wikiId, PDO::PARAM_INT);
            $stmt->execute();
    
            return true;
        }
    
        return false;
    }
    
    

    public function CountWikis()
    {
        $stmt = $this->db->query("SELECT count(wiki_id) as count FROM `wikis`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN, 0);
        return $result;
    }
}


