<?php

class UsuariModel implements CRUDable
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }

    public function read($obj = null)
    {
        try {
            $query = "SELECT * FROM usuari";
            $statement = $this->pdo->query($query);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    }

    public function create($obj)
    {
        try {
            $groups = '2';

            // $query = "INSERT INTO usuari (username, email, isAdmin, group) VALUES (:username, :email, :isAdmin, :group)";
            $query = "INSERT INTO usuari (username, email, es_administrador) VALUES (:username, :email, :isAdmin)";

            $statement = $this->pdo->prepare($query);

            $username = $obj->getUsername();
            $email = $obj->getEmail();
            $isAdmin = $obj->getAdmin();

            // Compronar si existe el correo o no.
            if ($this->existCorreo($email)) {
                return "exist";
            }

            //Comprobar si es vacio el grupo o no
            // if (!empty($obj['group'])) {
            //     $groups = implode(',', $obj['group']);
            // }
            // $statement->bindParam(':group', $groups);

            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':isAdmin', $isAdmin);

            $statement->execute();

            return true;
        } catch (PDOException $e) {
            die("Error creating user: " . $e->getMessage());
        }
    }




    public function update($id)
    {
        // Implement update method using PDO
    }

    public function existCorreo($email)
    {
        try {
            $query = "SELECT COUNT(*) FROM usuari WHERE email = :email";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $userCount = $statement->fetchColumn();
            return $userCount > 0;
        } catch (PDOException $e) {
            die("Error checking email existence: " . $e->getMessage());
        }
    }

    public function delete($obj)
    {
        // Implement delete method using PDO
    }
}
