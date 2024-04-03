<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class ProcesModel
{
    private $db;

    public function __construct()
    {
        $this->db = ConnectDB::getInstance(); // 使用单例模式获取数据库连接
    }

    public function read($obj)
    {
        if ($obj->nom !== null) {
            $query = "SELECT * FROM proces WHERE nom = :nom";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':nom', $obj->nom, PDO::PARAM_STR);
        } else {
            $query = "SELECT * FROM proces";
            $statement = $this->db->prepare($query);
        }

        $data = [];

        if ($statement->execute()) {
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $data[] = new Proces($row["nom"], $row["tipus"], $row["objectiu"], $row["usuari_email"]);
            }
        }

        return $data;
    }
}
