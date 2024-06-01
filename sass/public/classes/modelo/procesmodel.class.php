<?php

class ProcesModel implements CRUDable
{
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . $GLOBALS['CFG']->dbhost . ";dbname=" . $GLOBALS['CFG']->dbname;
        $this->pdo = new PDO($dsn, $GLOBALS['CFG']->dbuser, $GLOBALS['CFG']->dbpass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function read($obj = null)
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM proces");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($rows as $row) {
                $proces = new Proces($row['id'], $row['nom'], $row['tipus'], $row['objectiu'], $row['usuari_id']);
                $result[] = $proces;
            }
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function create($obj = null)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO proces (nom, tipus, objectiu, usuari_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$obj->getNom(), $obj->getTipus(), $obj->getObjectiu(), $obj->getUsuari_id()]);
            $lastInsertId = $this->pdo->lastInsertId();
            return $lastInsertId; // 返回最后插入的记录的ID
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    public function getById($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM proces where id = $id");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Proces($row['id'], $row['nom'], $row['tipus'], $row['objectiu'], $row['usuari_id']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function update($obj)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE proces SET nom = ?, tipus = ?, objectiu = ?, usuari_id = ? WHERE id = ?");
            $stmt->execute([$obj->getNom(), $obj->getTipus(), $obj->getObjectiu(), $obj->getUsuariId(), $obj->getId()]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($obj)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `proces` WHERE id = ?");
            $stmt->execute([$obj]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function deleteById($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM proces WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
