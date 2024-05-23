<?php

class Client{
    private $proces_id;
    private $grupInteres_id;
    private $sortida;

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
    	return "Proces_id: {$this->proces_id}, GrupInteres_id: {$this->grupInteres_id}, Sortida: {$this->sortida}";
    }

    public function getProces_id() {
    	return $this->proces_id;
    }

    /**
    * @param $proces_id
    */
    public function setProces_id($proces_id) {
    	$this->proces_id = $proces_id;
    }

    public function getGrupInteres_id() {
    	return $this->grupInteres_id;
    }

    /**
    * @param $grupInteres_id
    */
    public function setGrupInteres_id($grupInteres_id) {
    	$this->grupInteres_id = $grupInteres_id;
    }

    public function getSortida() {
    	return $this->sortida;
    }

    /**
    * @param $sortida
    */
    public function setSortida($sortida) {
    	$this->sortida = $sortida;
    }
}