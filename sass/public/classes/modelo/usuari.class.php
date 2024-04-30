<?php

class Usuari
{
    private $id;
    private $email;
    private $username;
    private $admin;
    private $grupo;




    function __construct($email, $username, $admin, $grupo = [])
    {
        $this->email = $email;
        $this->username = $username;
        $this->admin = (int)$admin;
        $this->grupo = $grupo;
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

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param $grupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
    }
}
