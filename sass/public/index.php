<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once './glogin/vendor/autoload.php';
include 'classes/config/Autoloader.php';
spl_autoload_register("Autoloader::load");
EmpresaDatos::sessionDatos();


// $cModel = new GrupInteresModel();
// $datos = $cModel->getGrupByName("Claustre");


// var_dump($datos);


try {
    $cFront = new FrontController();
    $cFront->dispatch();
} catch (Exception $e) {
    $vError = new ErrorVista();
    $vError->show($e);
}

// $newUser = new Usuari("AAAAAAA@gmail.com", "AAAAA", 1);
// $userModel = new UsuariModel;
// $creado = $userModel->create($newUser);

// $procModel = new ProcesModel();
// var_dump($procModel->read());
/*
$userModel = new UsuariModel();
$result = $userModel->read();
var_dump(count($result));
*/
