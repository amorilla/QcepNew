<?php

class Document
{
    private $id;
    private $nom;
    private $tipus;
    private $link;
    private $proces_id;

    public function __construct($id,$nom, $tipus, $link, $proces_id)
    {        
        $this->id = $id;
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->link = $link;
        $this->proces_id = $proces_id;
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
    	return "Id: {$this->id}, Nom: {$this->nom}, Tipus: {$this->tipus}, Link: {$this->link}, Proces_id: {$this->proces_id}";
    }
}