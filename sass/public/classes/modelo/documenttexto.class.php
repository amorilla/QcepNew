<?php

class DocumentTexto
{
    private $id;
    private $title;
    private $user_id;
    private $created_at;



    function __construct($id, $title, $user_id, $created_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
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

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

 

    public function getCreated_at() {
    	return $this->created_at;
    }

    /**
    * @param $created_at
    */
    public function setCreated_at($created_at) {
    	$this->created_at = $created_at;
    }
}
