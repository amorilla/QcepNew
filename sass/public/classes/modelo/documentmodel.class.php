<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

class DocumentModel
{

    public function __construct()
    {
    }

    public function connect()
    {
        $dbhost = 'localhost';
        $dbuser = 'usr_generic';
        $dbpassword = '2024@Thos';
        $database = 'qcep';
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $database);
        return $conn;
    }

    public function create($obj)
    {
    }

    public function read($obj)
    {
        if ($obj->proces_nom !== null) {
            $query = "SELECT nom,link FROM document WHERE proces_nom = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->proces_nom);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Document($row["nom"], $row["tipus"], $row["link"], $row["proces_nom"]);
                }
                $statement->close();
                return $data;
            }
        } else {
            $query = "SELECT nom,link FROM document WHERE proces_nom = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->proces_nom);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Document($row["nom"], $row["tipus"], $row["link"], $row["proces_nom"]);
                }
                $statement->close();
                return $data;
            }
        }
    }

    public function update(Document $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "UPDATE document SET nom = :nom, tipus = :tipus, link = :link, proces_id = :proces_id WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $nom = $obj->__get('nom');
            $tipus = $obj->__get('tipus');
            $link = $obj->__get('link');
            $proces_id = $obj->__get('proces_id');
            $id = $obj->__get('id');

            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':tipus', $tipus, PDO::PARAM_STR);
            $statement->bindParam(':link', $link, PDO::PARAM_STR);
            $statement->bindParam(':proces_id', $proces_id, PDO::PARAM_INT);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $state = $statement->execute();
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function delete(Document $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "DELETE FROM document WHERE id = ?";
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
