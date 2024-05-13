<?php

class ClientModel{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM client";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $client = new Client();
                $client->__set("proces_id",$row["proces_id"]);
                $client->__set("grupInteres_id", $row["grupInteres_id"]);
                $client->__set("sortida",$row["sortida"]);
                $results[] = $client;
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getClientsByID($id)
    {
        if ($id !== null) {

            $query = "SELECT * FROM client WHERE proces_id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute()) {
                $results = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $client = new Client();
                    $client->__set("proces_id",$row["proces_id"]);
                    $client->__set("grupInteres_id", $row["grupInteres_id"]);
                    $client->__set("sortida",$row["sortida"]);
                    $results[] = $client;
                }
                $statement->closeCursor();
                return $results;
            }

        }
    }
}