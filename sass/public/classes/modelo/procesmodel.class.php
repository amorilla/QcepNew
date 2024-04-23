<?php

class ProcesModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM proces";
        $statement =  $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Proces(
                    $row["id"],
                    $row["nom"],
                    $row["tipus"],
                    $row["objectiu"],
                    $row["usuari_id"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function read(Proces $obj)
    {
        $nom = $obj->__get('nom');
        $query = "SELECT * FROM proces WHERE nom = :nom";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

        if ($statement->execute()) {
            $proces = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $proces = new Proces(
                    $row["id"],
                    $row["nom"],
                    $row["tipus"],
                    $row["objectiu"],
                    $row["usuari_id"]
                );
            }
            $statement->closeCursor();
            return $proces;
        }
    }

    public function create(Proces $obj)
    {
        if (count($this->read($obj)) === 0) {
            $query = "INSERT INTO proces (nom, tipus, objectiu, usuari_id) VALUES (?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('nom'), $obj->__get('tipus'), $obj->__get('objectiu'), $obj->__get('usuari_id')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function update(Proces $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "UPDATE apartat SET nom = :nom, tipus = :tipus, objectiu = :objectiu, usuari_id = :usuari_id WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $nom = $obj->__get('nom');
            $tipus = $obj->__get('tipus');
            $objectiu = $obj->__get('objectiu');
            $usuari_id = $obj->__get('usuari_id');
            $id = $obj->__get('id');

            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':tipus', $tipus, PDO::PARAM_STR);
            $statement->bindParam(':objectiu', $objectiu, PDO::PARAM_STR);
            $statement->bindParam(':usuari_id', $usuari_id, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $state = $statement->execute();
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function delete(Proces $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "DELETE FROM apartat WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('id')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }
}