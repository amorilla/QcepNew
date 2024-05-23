<?php

class Indicador
{
    private $id;
    private $codi;
    private $nom;
    private $link;
    private $curs;
    private $valoracio;
    private $proces_id;



    function __construct($id, $codi, $nom, $link, $curs, $valoracio, $proces_id)
    {
        $this->id = $id;
        $this->codi = $codi;
        $this->nom = $nom;
        $this->link = $link;
        $this->curs = $curs;
        $this->valoracio = $valoracio;
        $this->proces_id = $proces_id;
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

    public function getCodi()
    {
        return $this->codi;
    }

    /**
     * @param $codi
     */
    public function setCodi($codi)
    {
        $this->codi = $codi;
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

    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getCurs()
    {
        return $this->curs;
    }

    /**
     * @param $curs
     */
    public function setCurs($curs)
    {
        $this->curs = $curs;
    }

    public function getValoracio()
    {
        return $this->valoracio;
    }

    /**
     * @param $valoracio
     */
    public function setValoracio($valoracio)
    {
        $this->valoracio = $valoracio;
    }

    public function getProces_id()
    {
        return $this->proces_id;
    }

    /**
     * @param $proces_id
     */
    public function setProces_id($proces_id)
    {
        $this->proces_id = $proces_id;
    }
}
