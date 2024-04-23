<?php
class Avalucaio
{
    private $tipo_id;
    private $nivell;
    private $valoracio;
    private $planificacio;
    private $accions;
    private $estrategi;

    public function __construct($tipo, $nivell, $valoracio, $planificacio, $accions, $estrategi)
    {
        $this->tipo_id = $tipo;
        $this->nivell = $nivell;
        $this->valoracio = $valoracio;
        $this->planificacio = $planificacio;
        $this->accions = $accions;
        $this->estrategi = $estrategi;
    }

    public function getTipo_id() {
    	return $this->tipo_id;
    }

    /**
    * @param $tipo_id
    */
    public function setTipo_id($tipo_id) {
    	$this->tipo_id = $tipo_id;
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

    public function getEstrategi() {
    	return $this->estrategi;
    }

    /**
    * @param $estrategi
    */
    public function setEstrategi($estrategi) {
    	$this->estrategi = $estrategi;
    }
}
