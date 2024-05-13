<?php

class GrupInteresModel{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM grupInteres";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $grupInteres = new grupInteres();
                $grupInteres->__set("id",$row["id"]);
                $grupInteres->__set("nom", $row["nom"]);
                $grupInteres->__set("descripcio",$row["descripcio"]);
                $results[] = $grupInteres;
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getGrupByID($id) {
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
    
}