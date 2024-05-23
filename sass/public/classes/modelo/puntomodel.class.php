<?php

class PuntoModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }

    public function create($proces, $num1, $num2)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO proces_puntNorma (proces_id, primerNum, segundaNum) VALUES (?, ?, ?)");
            $stmt->execute([$proces, $num1, $num2]);

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function read()
    {
        try {
            $query = "SELECT * FROM proces_puntNorma";
            $statement = $this->pdo->query($query);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM `proces_puntNorma` WHERE proces_id = ?";
            $statement = $this->pdo->prepare($query);
            $statement->execute([$id]);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM proces_puntNorma WHERE proces_id = ?";
            $statement = $this->pdo->prepare($query);
            $statement->execute([$id]);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    }
}
