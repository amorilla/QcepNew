<?php

class SectionsModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = ConnectDB::getInstance();
    }
    public function read()
    {
        $sql = "SELECT * FROM sections";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $sections = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $section = new Secction(
                $row['id'],
                $row['document_id'],
                $row['type'],
                $row['content'],
                $row['image_url'],
                $row['position']
            );
            $sections[] = $section;
        }

        return $sections;
    }

    public function create($sectionData)
    {
        $sql = "INSERT INTO sections (document_id, type, content, image_url, position) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$sectionData['document_id'], $sectionData['type'], $sectionData['content'], $sectionData['image_url'], $sectionData['position']]);
        return $this->pdo->lastInsertId();
    }

    public function delete($sectionId)
    {
        $sql = "DELETE FROM sections WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$sectionId]);
        return $stmt->rowCount();
    }

    public function update($sectionData)
    {
        $sql = "UPDATE sections SET document_id = ?, type = ?, content = ?, image_url = ?, position = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$sectionData['document_id'], $sectionData['type'], $sectionData['content'], $sectionData['image_url'], $sectionData['position'], $sectionData['id']]);
        return $stmt->rowCount();
    }

    public function deleteAllByDocument($id)
    {
        $sql = "DELETE FROM sections WHERE document_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    public function getByIdDocument($id)
    {
        $sql = "SELECT * FROM sections WHERE document_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        $sections = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $section = new Secction(
                $row['id'],
                $row['document_id'],
                $row['type'],
                $row['content'],
                $row['image_url'],
                $row['position']
            );
            $sections[] = $section;
        }

        return $sections;
    }
}
