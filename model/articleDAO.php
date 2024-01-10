<?php


require_once 'connexion.php'; // Update the path if necessary
require_once 'Article.php'; // Assuming this contains the Article class

class ArticleDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_all_articles() {
        $query = "SELECT * FROM articles";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $articles_data = $stmt->fetchAll();
        $articles = [];
        foreach ($articles_data as $article_data) {
            $article = new Article(
                $article_data["article_id"],
                $article_data["article_name"],
                $article_data["creation_date"],
                $article_data["content"]
            );
            $articles[] = $article;
        }
        return $articles;
    }

    public function get_article_by_id($article_id) {
        $query = "SELECT * FROM articles WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
        $article_data = $stmt->fetch();

        if ($article_data) {
            $article = new Article(
                $article_data["article_id"],
                $article_data["article_name"],
                $article_data["creation_date"],
                $article_data["content"]
            );
            return $article;
        }

        return null; // If article not found
    }

    public function create_article($article_name, $creation_date, $content) {
        $query = "INSERT INTO articles (article_name, creation_date, content) VALUES (:article_name, :creation_date, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_name', $article_name);
        $stmt->bindParam(':creation_date', $creation_date);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        return $this->db->lastInsertId(); // Return the ID of the inserted article
    }

    public function update_article(Article $article) {
        $query = "UPDATE articles SET article_name = :article_name, creation_date = :creation_date, content = :content WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_name', $article->getArticle_name());
        $stmt->bindParam(':creation_date', $article->getCreation_date());
        $stmt->bindParam(':content', $article->getContent());
        $stmt->bindParam(':article_id', $article->getArticle_id());
        $stmt->execute();

        return true; // Return true if update successful
    }

    public function delete_article($article_id) {
        $query = "DELETE FROM articles WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Return true if any rows were affected
    }
}
