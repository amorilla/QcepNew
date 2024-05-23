<?php

class Document
{
    public $id;
    public $nom;
    public $tipus;
    public $link;
    public $proces_id;

    public function __construct($id, $nom, $tipus, $link, $proces_id)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->link = $link;
        $this->proces_id = $proces_id;
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

    public function getTipus() {
    	return $this->tipus;
    }

    /**
    * @param $tipus
    */
    public function setTipus($tipus) {
    	$this->tipus = $tipus;
    }

    public function getLink() {
    	return $this->link;
    }

    /**
    * @param $link
    */
    public function setLink($link) {
    	$this->link = $link;
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
