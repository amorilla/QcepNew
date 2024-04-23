<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Usuari{
    private $pdo;
    private $id;
    private $email;
    private $username;
    private $es_administrador;

    public function __construct($id,$email,$username,$es_administrador)
    {
        $this->pdo = DbConnection::getInstance();
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->es_administrador = $es_administrador;
    }

    public function getId() {
    	return $this->id;
    }

    /**
    * @param $id
    */
    public function setId($id) {
    	$this->id = $id;
    }

    public function getEmail() {
    	return $this->email;
    }

    /**
    * @param $email
    */
    public function setEmail($email) {
    	$this->email = $email;
    }

    public function getUsername() {
    	return $this->username;
    }

    /**
    * @param $username
    */
    public function setUsername($username) {
    	$this->username = $username;
    }

    public function getEs_administrador() {
    	return $this->es_administrador;
    }

    /**
    * @param $es_administrador
    */
    public function setEs_administrador($es_administrador) {
    	$this->es_administrador = $es_administrador;
    }

    public function read() {
        $mail = $this->getEmail();
    
        $query = "SELECT * FROM usuari WHERE email = ?";

        $statement = $this->pdo->prepare($query);
        
        if($statement->execute([$mail])){
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(count($result) !== 0){

                $this->setEs_administrador($result["es_administrador"]);

                if ($this->getEs_administrador() === 1) {
                    $_SESSION['admin'] = true;
                }else{
                    $_SESSION['admin'] = false;
                }

                $statement->closeCursor();
                $procesModel = new ProcesModel();
                $results = $procesModel->getTable();
                return $results;
            }else{
                return null;
            }
        }
    }

    public function getUsernameByID($id){
        $query = "SELECT * FROM usuari WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $id = $this->getId();
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if($statement->execute()){
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $usuari = new Usuari(
                $row["id"],
                $row["email"],
                $row["username"],
                $row["es_administrador"]
            );
            $statement->closeCursor();
            return $usuari;
        }
    }


}