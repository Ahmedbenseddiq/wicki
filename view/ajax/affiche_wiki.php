<?php


class Database {
    private $host = "localhost";
    private $db_name = "wikis";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

class DAO_model_wikis extends Database {
    public function getAllwikis(){
        if (isset($_GET["keyword"]) ) {
            $keyword = $_GET["keyword"];
            $consulta = $this->getConnection()->prepare("SELECT w.wiki_id ,w.titre ,w.contenu ,w.image ,w.cat_id  ,t.tag_name 
            FROM wikis w
            LEFT JOIN (
                SELECT wt.wiki_id, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tag_name
                FROM wiki_tags wt
                JOIN tags t ON t.tag_id = wt.tag_id
                GROUP BY wt.wiki_id
            ) t ON w.wiki_id = t.wiki_id
            WHERE  w.status = 1 AND w.titre LIKE CONCAT('%', :keyword, '%') 
                OR t.tag_name LIKE CONCAT('%', :keyword, '%')
            ORDER BY w.wiki_date DESC
            ");

            $consulta->bindParam(':keyword', $keyword); 

            $consulta->execute();
            $result = $consulta->fetchAll();
            
        } else {
            $consulta = $this->getConnection()->prepare("SELECT w.wiki_id ,w.titre ,w.contenu ,w.image ,w.cat_id  ,t.tag_name 
            FROM wikis w
            LEFT JOIN (
                SELECT wt.wiki_id, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tag_name
                FROM wiki_tags wt
                JOIN tags t ON t.tag_id = wt.tag_id
                GROUP BY wt.wiki_id
            ) t ON w.wiki_id = t.wiki_id
            WHERE  w.titre LIKE CONCAT('%', '', '%') 
                OR t.tag_name LIKE CONCAT('%', '', '%')
            ORDER BY w.wiki_date DESC");
            $consulta->execute();
            $result = $consulta->fetchAll();
        }


        
        return $result;
    }
}

$DAO_model_wikis = new DAO_model_wikis;
$wikis = $DAO_model_wikis->getAllwikis();

 echo json_encode($wikis);


