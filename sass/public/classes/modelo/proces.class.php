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



    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getTipus()
    {
        return $this->tipus;
    }

    /**
     * @param $tipus
     */
    public function setTipus($tipus)
    {
        $this->tipus = $tipus;
    }

    public function getObjectiu()
    {
        return $this->objectiu;
    }

    /**
     * @param $objectiu
     */
    public function setObjectiu($objectiu)
    {
        $this->objectiu = $objectiu;
    }

    public function getUsuari_id()
    {
        return $this->usuari_id;
    }

    /**
     * @param $usuari_id
     */
    public function setUsuari_id($usuari_id)
    {
        $this->usuari_id = $usuari_id;
    }
}
