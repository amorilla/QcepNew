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

            // Comprobar si existe el correo o no.
            if ($this->existCorreo($email)) {
                return -1;
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
            $result = $this->pdo->lastInsertId("id");
            if ($result > 0) {
            	return $result;
            }
            return -1;
        } catch (PDOException $e) {
            die("Error creating user: " . $e->getMessage());
        }
    }




    public function update($obj)
    {
        try {
            $query = "UPDATE usuari SET username = :username, email = :email, es_administrador = :isAdmin WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $id = $obj->getId();
            $username = $obj->getUsername();
            $email = $obj->getEmail();
            $isAdmin = $obj->getAdmin();

            $statement->bindParam(':id', $id);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':isAdmin', $isAdmin);

            $statement->execute();

            return true;
        } catch (PDOException $e) {
            die("Error updating user: " . $e->getMessage());
        }
    }

    public function getUserByID($id)
    {
        try {
            $query = "SELECT * FROM usuari WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC); // 获取用户数据

            if ($user) {
                // 如果找到匹配的用户，则返回一个 Usuari 实例
                return new Usuari($user['email'], $user['username'], $user['es_administrador']); // 假设这是 Usuari 类的构造函数
            } else {
                // 如果未找到匹配的用户，则返回 null 或抛出异常，具体取决于需求
                return null;
            }
        } catch (PDOException $e) {
            die("Error fetching user by ID: " . $e->getMessage());
        }
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

    public function delete($id)
    {
        try {
            $query = "DELETE FROM usuari WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            die("Error deleting user: " . $e->getMessage());
        }
    }
}
