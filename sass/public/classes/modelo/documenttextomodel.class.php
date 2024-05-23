<?php

class DocumentTextoModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }

    public function create($title, $user_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO documents (title, user_id) VALUES (?, ?)");
        $stmt->execute([$title, $user_id]);
        return $this->pdo->lastInsertId();
    }

    public function read()
    {
        $stmt = $this->pdo->query("SELECT * FROM documents");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new DocumentTexto($row['id'], $row['title'], $row['user_id'], $row['created_at']);
        }
        return $result;
    }

    public function update($id, $title, $user_id)
    {
        $stmt = $this->pdo->prepare("UPDATE documents SET title = ?, user_id = ? WHERE id = ?");
        return $stmt->execute([$title, $user_id, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM documents WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new DocumentTexto($row['id'], $row['title'], $row['user_id'], $row['created_at']);
        }
        return null;
    }
}
