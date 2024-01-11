<?php
class Tag{
    private $tag_id;
    private $tag_name;

    public function __construct($tag_id,$tag_name){
        $this->tag_id;
        $this->tag_name;
        
    }

    public function get_tag_id(){
        return $this->tag_id;
    }

    public function get_tag_name(){
        return $this->tag_name;
    }
}