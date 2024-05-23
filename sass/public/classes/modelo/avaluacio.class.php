<?php

class Avaluacio
{
    private $id;
    private $tipus;
    private $nivell;
    private $valoracio;
    private $planificacio;
    private $accions;
    private $estrategia;
    private $proces_id;

    public function __construct()
    {
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new Exception("Attribute " . $name . " does not exist");
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        } else {
            throw new Exception("Attribute " . $name . " does not exist");
        }
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

    public function getTipus() {
    	return $this->tipus;
    }

    /**
    * @param $tipus
    */
    public function setTipus($tipus) {
    	$this->tipus = $tipus;
    }

    public function getNivell() {
    	return $this->nivell;
    }

    /**
    * @param $nivell
    */
    public function setNivell($nivell) {
    	$this->nivell = $nivell;
    }

    public function getValoracio() {
    	return $this->valoracio;
    }

    /**
    * @param $valoracio
    */
    public function setValoracio($valoracio) {
    	$this->valoracio = $valoracio;
    }

    public function getPlanificacio() {
    	return $this->planificacio;
    }

    /**
    * @param $planificacio
    */
    public function setPlanificacio($planificacio) {
    	$this->planificacio = $planificacio;
    }

    public function getAccions() {
    	return $this->accions;
    }

    /**
    * @param $accions
    */
    public function setAccions($accions) {
    	$this->accions = $accions;
    }

    public function getEstrategia() {
    	return $this->estrategia;
    }

    /**
    * @param $estrategia
    */
    public function setEstrategia($estrategia) {
    	$this->estrategia = $estrategia;
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
}
