<?php


class AvaluacioController
{
    public function create()
    {


        $aModel = new AvaluacioModel();
        $avaluacio = new Avaluacio();
        $avaluacio->__set('tipus', $_POST['tipus']);
        $avaluacio->__set('nivell', $_POST['nivell']);
        $avaluacio->__set('valoracio', $_POST['valoracio']);
        $avaluacio->__set('planificacio', $_POST['planificacio']);
        $avaluacio->__set('accions', $_POST['accions']);
        $avaluacio->__set('estrategia', $_POST['estrategia']);
        $avaluacio->__set('proces_id', $_POST['proces_id']);

        $aModel->create($avaluacio);
        header("Location: ".$GLOBALS['CFG']->url."/?document/show&process=" . $_POST["proces_id"]);
    }

    public function delete()
    {
        $aModel = new AvaluacioModel();
        $aModel->deleteByID($_POST['id']);
        header("Location: ".$GLOBALS['CFG']->url."/?document/show&process=" . $_POST["proces_id"]);
    }
}
