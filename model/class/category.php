<?php
class Category {

    private $cat_id;
    private $cat_name;

    public function __construct($cat_id = null ,$cat_name = null){
        $this->cat_id = $cat_id;
        $this->cat_name = $cat_name;
       
    }

    public function get_cat_id(){
        return $this->cat_id;
    }

    public function get_cat_name(){
        return $this->cat_name;
    }
    
}