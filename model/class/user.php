<?php
class User{
    private $user_id;
    private $prenom;
    private $nom;
    private $email;
    private $pass;
    private $role;
    private $image;

    public function __construct($userid = null,$prenom = null,$nom = null,$email = null,$pass = null,$role = null,$image = null){
        $this->user_id=$userid;
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->email=$email;
        $this->pass=$pass;
        $this->role=$role;
        $this->image=$image;
    }

    public function get_user_id(){
        return $this->user_id;
    }
    public function get_user_name(){
        return $this->prenom;
    }
    public function get_user_Fname(){
        return $this->nom;
    }
    public function get_user_email(){
        return $this->email;
    }
    public function get_user_pass(){
        return $this->pass;
    }
    public function get_user_role(){
        return $this->role;
    }
    public function get_user_img(){
        return $this->image;
    }

}