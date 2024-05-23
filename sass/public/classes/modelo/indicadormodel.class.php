<?php


class IndicadorModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }

    public function read()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM indicador");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($rows as $row) {
                $indicador = new Indicador($row['id'], $row['codi'], $row['nom'], $row['link'], $row['curs'], $row['valoracio'], $row['proces_id']);
                $result[] = $indicador;
            }
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM proces_puntNorma WHERE proces_id = ?";
            $statement = $this->pdo->prepare($query);
            $statement->execute([$id]);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    }
}
