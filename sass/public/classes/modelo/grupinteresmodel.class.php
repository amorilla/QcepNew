<?php

class GrupInteresModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }
    public function create($obj = null)
    {
        if ($obj !== null) {
            $query = "INSERT INTO grupInteres (nom, descripcio) VALUES (:nom, :descripcio)";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':nom', $obj->nom, PDO::PARAM_STR);
            $statement->bindParam(':descripcio', $obj->descripcio, PDO::PARAM_STR);

            try {
                if ($statement->execute()) {
                    return true;
                } else {
                    throw new Exception("Failed to create GrupInteres.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    public function update($obj)
    {
        if ($obj !== null) {
            $query = "UPDATE grupInteres SET nom = :nom, descripcio = :descripcio WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':nom', $obj->nom, PDO::PARAM_STR);
            $statement->bindParam(':descripcio', $obj->descripcio, PDO::PARAM_STR);
            $statement->bindParam(':id', $obj->id, PDO::PARAM_INT);

            try {
                if ($statement->execute()) {
                    return true;
                } else {
                    throw new Exception("Failed to update GrupInteres.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }

    public function delete($obj)
    {
        if ($obj !== null) {
            $query = "DELETE FROM grupInteres WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $obj->id, PDO::PARAM_INT);

            try {
                if ($statement->execute()) {
                    return true;
                } else {
                    throw new Exception("Failed to delete GrupInteres.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    public function getTable()
    {
        $query = "SELECT * FROM grupInteres";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $grupInteres = new grupInteres();
                $grupInteres->__set("id", $row["id"]);
                $grupInteres->__set("nom", $row["nom"]);
                $grupInteres->__set("descripcio", $row["descripcio"]);
                $results[] = $grupInteres;
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getGrupByID($id)
    {
        if ($id !== null) {
            $query = "SELECT * FROM grupInteres WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute() && $row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $grupInteres = new GrupInteres();
                $grupInteres->__set("id", $row["id"]);
                $grupInteres->__set("nom", $row["nom"]);
                $grupInteres->__set("descripcio", $row["descripcio"]);
                $statement->closeCursor();
                return $grupInteres;
            }
        }
        return null; // Return null if no GrupInteres found
    }
    public function getGrupByName($name)
    {
        if ($name !== null) {
            $query = "SELECT * FROM grupInteres WHERE nom = :nom";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':nom', $name, PDO::PARAM_INT);

            if ($statement->execute() && $row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $grupInteres = new GrupInteres();
                $grupInteres->__set("id", $row["id"]);
                $grupInteres->__set("nom", $row["nom"]);
                $grupInteres->__set("descripcio", $row["descripcio"]);
                $statement->closeCursor();
                return $grupInteres;
            }
        }
        return null; // Return null if no GrupInteres found
    }
}
