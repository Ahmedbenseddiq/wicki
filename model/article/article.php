<?php

class Article{

    private $article_id;
    private $article_name;
    private $creation_date;
    private $content;
    
    public function __construct($article_id,$article_name,$creation_date,$content)
    {
        $this->article_id = $article_id;
        $this->article_name = $article_name;
        $this->creation_date = $creation_date;
        $this->content = $content;
    }

    

    /**
     * Get the value of article_id
     */ 
    public function getArticle_id()
    {
        return $this->article_id;
    }

    /**
     * Get the value of article_name
     */ 
    public function getArticle_name()
    {
        return $this->article_name;
    }

    /**
     * Set the value of article_name
     *
     * @return  self
     */ 
    public function setArticle_name($article_name)
    {
        $this->article_name = $article_name;

        return $this;
    }

    /**
     * Get the value of creation_date
     */ 
    public function getCreation_date()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     *
     * @return  self
     */ 
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}