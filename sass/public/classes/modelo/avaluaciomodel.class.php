<?php
class AvalucaioModel implements CRUDable
{
    private $pdo;

    public function __construct(){
        $this->pdo = DbConnection::getInstance();
    }
    
    public function read($obj = null)
    {

    }
    public function create($obj = null)
    {

    }
    public function update($obj = null)
    {

    }
    public function delete($obj = null)
    {

    }
}
