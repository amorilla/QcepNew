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
}
