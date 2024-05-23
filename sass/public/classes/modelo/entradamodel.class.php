<?php

class EntradaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }
    public function create($obj = null)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO proveidor (proces_id, grupInteres_id, entrada) VALUES (?, ?, ?)");
            $stmt->execute([$obj->getProces_id(), $obj->getGrupInteres_id(), $obj->getEntrada()]);

            return true; // 返回 true 表示创建成功
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // 返回 false 表示创建失败
        }
    }
    public function delete($obj)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM proveidor WHERE proces_id = ?");
            $stmt->execute([$obj]);

            return true; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; 
        }
    }

    public function update($obj)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE proveidor SET grupInteres_id = ?, entrada = ? WHERE proces_id = ?");
            $stmt->execute([$obj->getGrupInteresId(), $obj->getEntrada(), $obj->getProcesId()]);

            return true; // 返回 true 表示更新成功
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // 返回 false 表示更新失败
        }
    }
    public function getTable()
    {
        $query = "SELECT * FROM proveidor";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $client = new Entrada();
                $client->__set("proces_id", $row["proces_id"]);
                $client->__set("grupInteres_id", $row["grupInteres_id"]);
                $client->__set("entrada", $row["entrada"]);
                $results[] = $client;
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getClientsByID($id)
    {
        if ($id !== null) {

            $query = "SELECT * FROM proveidor WHERE proces_id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute()) {
                $results = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $client = new Entrada();
                    $client->__set("proces_id", $row["proces_id"]);
                    $client->__set("grupInteres_id", $row["grupInteres_id"]);
                    $client->__set("entrada", $row["entrada"]);
                    $results[] = $client;
                }
                $statement->closeCursor();
                return $results;
            }
        }
    }
}
