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
        $query = "INSERT INTO `document`(`nom`, `tipus`, `link`, `proces_id`) VALUES (?,?,?,?)";

        // Establish database connection
        $conn = $this->connect();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $statement = $conn->prepare($query);
        if (!$statement) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $statement->bind_param('sssi', $obj->nom, $obj->tipus, $obj->link, $obj->proces_id);

        // Execute the query
        try {
            if (!$statement->execute()) {
                throw new Exception("Failed to create document: " . $statement->error);
            }
            echo "Document created successfully.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the statement and the connection
        $statement->close();
        $conn->close();
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

    public function getByProcesId($id)
    {
        $query = "SELECT * FROM document WHERE proces_id = ?";
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            $results = $statement->get_result();
            $data = [];
            while ($row = $results->fetch_assoc()) {
                $data[] = new Document($row['id'], $row["nom"], $row["tipus"], $row["link"], $row["proces_id"]);
            }
            $statement->close();
            return $data;
        } else {
            return null;
        }
    }


    public function update($obj)
    {
        $query = "UPDATE document SET nom = ?, link = ? WHERE id = ?";

        // Establish database connection
        $conn = $this->connect();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $statement = $conn->prepare($query);
        if (!$statement) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $statement->bind_param('ssi', $obj->nom, $obj->link, $obj->id);

        // Execute the query
        try {
            if (!$statement->execute()) {
                throw new Exception("Failed to update document: " . $statement->error);
            }
            echo "Document updated successfully.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the statement and the connection
        $statement->close();
        $conn->close();
    }


    public function delete($doc_id)
    {
        $query = "DELETE FROM document WHERE id = ?";

        // Establish database connection
        $conn = $this->connect();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $statement = $conn->prepare($query);
        if (!$statement) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $statement->bind_param('i', $doc_id);

        // Execute the query
        try {
            if (!$statement->execute()) {
                throw new Exception("Failed to delete document: " . $statement->error);
            }
            echo "Document deleted successfully.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the statement and the connection
        $statement->close();
        $conn->close();
    }
}
