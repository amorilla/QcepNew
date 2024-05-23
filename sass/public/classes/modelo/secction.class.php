<?php

class Secction
{
    private $id;
    private $document_id;
    private $type;
    private $content;
    private $image_url;
    private $position;



    function __construct($id, $document_id, $type, $content, $image_url, $position)
    {
        $this->id = $id;
        $this->document_id = $document_id;
        $this->type = $type;
        $this->content = $content;
        $this->image_url = $image_url;
        $this->position = $position;
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

    public function getDocument_id()
    {
        return $this->document_id;
    }

    /**
     * @param $document_id
     */
    public function setDocument_id($document_id)
    {
        $this->document_id = $document_id;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImage_url()
    {
        return $this->image_url;
    }

    /**
     * @param $image_url
     */
    public function setImage_url($image_url)
    {
        $this->image_url = $image_url;
    }

    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}
