<?php

class GrupInteres{
    private $id;
    private $nom;
    private $descripcio;

    public function __construct(){

    }

    public function __get($name){
        if(property_exists($this, $name)){
            return $this->$name;
        }else{
            throw new Exception("Attribute ".$name." does not exist");
        }
    }

    public function __set($name, $value){
        if(property_exists($this, $name)){
            return $this->$name = $value;
        }else{
            throw new Exception("Attribute ".$name." does not exist");
        }
    }

    /**
     * @return string
     */
    public function __toString() {
    	return "Id: {$this->id}, Nom: {$this->nom}, Descripcio: {$this->descripcio}";
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

    public function getNom() {
    	return $this->nom;
    }

    /**
    * @param $nom
    */
    public function setNom($nom) {
    	$this->nom = $nom;
    }

    public function getDescripcio() {
    	return $this->descripcio;
    }

    /**
    * @param $descripcio
    */
    public function setDescripcio($descripcio) {
    	$this->descripcio = $descripcio;
    }
}