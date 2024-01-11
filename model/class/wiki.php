<?php
require_once('category.php');
require_once('user.php');
class Wiki {
    private $wiki_id;
    private $title;
    private $content;
    private $image;
    private $date;
    private User $user;
    private Category $category;
    private $status;

    public function __construct($wiki_id,$title,$content,$image,$date,User $user,Category $category,$status){
        $this->wiki_id = $wiki_id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->date = $date;
        $this->user = new User();
        $this->category = new Category();
        $this->status = $status;

    }

    public function get_wiki_id(){
        return $this->wiki_id;
    }

    public function get_wiki_title(){
        return $this->title;
    }

    public function get_wiki_content(){
        return $this->content;
    }

    public function get_wiki_image(){
        return $this->image;
    }

    public function get_wiki_date(){
        return $this->date;
    }

    public function get_wiki_user(){
        return $this->user;
    }

    public function get_wiki_cat(){
        return $this->category;
    }

    public function get_wiki_status(){
        return $this->status;
    }


}