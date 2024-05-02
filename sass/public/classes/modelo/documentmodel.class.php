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
        if ($obj->proces_id !== null) {
            $query = "SELECT * FROM document WHERE id = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->proces_id);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Document($row['id'], $row["nom"], $row["tipus"], $row["link"], $row["proces_id"]);
                }
                $statement->close();
                return $data;
            }
        } else {
            $query = "SELECT nom,link FROM document WHERE proces_id = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->proces_id);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Document($row['id'], $row["nom"], $row["tipus"], $row["link"], $row["proces_id"]);
                }
                $statement->close();
                return $data;
            }
        }
    }

    public function update($obj)
    {
    }

    public function delete($obj)
    {
    }
}
