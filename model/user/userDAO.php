<?php
require_once '../connexion.php';    
require_once 'user.php'; 

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_all_users() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $users_data = $stmt->fetchAll();
        $users = [];
        foreach ($users_data as $user_data) {
            $user = new User(
                $user_data["id"],
                $user_data["name"],
                $user_data["email"],
                $user_data["password"],
                $user_data["role"]
            );
            $users[] = $user;
        }
        return $users;
    }

    public function get_user_by_id($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user_data = $stmt->fetch();

        if ($user_data) {
            $user = new User(
                $user_data["id"],
                $user_data["name"],
                $user_data["email"],
                $user_data["password"],
                $user_data["role"]
            );
            return $user;
        }

        return null; // If user not found
    }

    public function create_user($name, $email, $password, $role) {
        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        return $this->db->lastInsertId(); // Return the ID of the inserted user
    }

    public function update_user(User $user) {
        $query = "UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $user->getName());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->bindParam(':role', $user->getRole());
        $stmt->bindParam(':id', $user->getId());
        $stmt->execute();

        return true; // Return true if update successful
    }

    public function delete_user($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0; 
}

}

