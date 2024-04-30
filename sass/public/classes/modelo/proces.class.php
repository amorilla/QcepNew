<?php
class Proces
{
    private $nom;
    private $tipus;
    private $objectiu;
    private $usuari_id;

    public function __construct($nom, $tipus, $objectiu, $usuari_id)
    {
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
