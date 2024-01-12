<?php
require_once('../config/database.php');
require_once('class/wiki.php');
class WikiDAO{
    private $db;
    private Wiki $wiki;
    
    public function __construct(){
        $this->db = Database::getInstance();
    }


    public function get_wikis() {
        $stmt = $this->db->query("SELECT * FROM wikis ORDER BY wiki_date LIMIT 6;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_wikis_by_category($cat_id) {
        // Use a prepared statement to avoid SQL injection
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE cat_id = :cat_id ORDER BY wiki_date LIMIT 6;");
        
        // Bind the parameter
        $stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Fetch all rows as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    


   



    
    public function CountWikis(){
        $stmt = $this->db->query("SELECT count(wiki_id) as count FROM `wikis`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN,0);
        return $result; 
    }
}
