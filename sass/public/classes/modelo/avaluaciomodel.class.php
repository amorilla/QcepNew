<?php

class AvaluacioModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }

    public function getTable($id)
    {
        $query = "SELECT * FROM avaluacio WHERE proces_id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $avaluacio = new Avaluacio();
                $avaluacio->__set('id', $row['id']);
                $avaluacio->__set('tipus', $row['tipus']);
                $avaluacio->__set('nivell', $row['nivell']);
                $avaluacio->__set('valoracio', $row['valoracio']);
                $avaluacio->__set('planificacio', $row['planificacio']);
                $avaluacio->__set('accions', $row['accions']);
                $avaluacio->__set('estrategia', $row['estrategia']);
                $avaluacio->__set('proces_id', $row['proces_id']);
                $results[] = $avaluacio;
            }
            $statement->closeCursor();
            return $results;
        }

        return [];
    }

    public function getNivells()
    {
        $query = "SELECT nivell FROM avaluacio";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row['nivell'];
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getEstrategies()
    {
        $query = "SELECT estrategia FROM avaluacio";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row['estrategia'];
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function create($obj)
    {
        if ($obj !== null) {
            $query = "INSERT INTO avaluacio (tipus, nivell, valoracio, planificacio, accions, estrategia, proces_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute(
                [
                    $obj->__get('tipus'), $obj->__get('nivell'), $obj->__get('valoracio'),
                    $obj->__get('planificacio'), $obj->__get('accions'), $obj->__get('estrategia'),
                    $obj->__get('proces_id')
                ]
            );
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function deleteByID($id)
    {
        if ($id !== 0) {
            $query = "DELETE FROM avaluacio WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$id]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }
}
