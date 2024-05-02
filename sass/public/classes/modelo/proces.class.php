<?php
class Proces
{
    private $id;
    private $nom;
    private $tipus;
    private $objectiu;
    private $usuari_id;

    public function __construct($id, $nom, $tipus, $objectiu, $usuari_id)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->objectiu = $objectiu;
        $this->usuari_id = $usuari_id;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return null;
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            echo "Property $name does not exist.";
        }
    }
}
