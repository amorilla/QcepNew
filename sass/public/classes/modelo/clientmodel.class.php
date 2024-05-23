<?php

class ClientModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }
    public function create($obj = null)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO client (proces_id, grupInteres_id, sortida) VALUES (?, ?, ?)");
            $stmt->execute([$obj->getProces_id(), $obj->getGrupInteres_id(), $obj->getSortida()]);

            return true; // 返回 true 表示创建成功
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // 返回 false 表示创建失败
        }
    }
    public function delete($obj)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM client WHERE proces_id = ?");
            $stmt->execute([$obj]);

            return true; // 返回 true 表示删除成功
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // 返回 false 表示删除失败
        }
    }

    public function update($obj)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE client SET grupInteres_id = ?, sortida = ? WHERE proces_id = ?");
            $stmt->execute([$obj->getGrupInteresId(), $obj->getSortida(), $obj->getProcesId()]);

            return true; // 返回 true 表示更新成功
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // 返回 false 表示更新失败
        }
    }
    public function getTable()
    {
        $query = "SELECT * FROM client";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $client = new Client();
                $client->__set("proces_id", $row["proces_id"]);
                $client->__set("grupInteres_id", $row["grupInteres_id"]);
                $client->__set("sortida", $row["sortida"]);
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
                    $client->__set("proces_id", $row["proces_id"]);
                    $client->__set("grupInteres_id", $row["grupInteres_id"]);
                    $client->__set("sortida", $row["sortida"]);
                    $results[] = $client;
                }
                $statement->closeCursor();
                return $results;
            }
        }
    }
}
