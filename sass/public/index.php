<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
require_once './glogin/vendor/autoload.php';

include 'classes/config/Autoloader.php';
spl_autoload_register("Autoloader::load");
spl_autoload_register("Autoloader::newLoad");
spl_autoload_register("Autoloader::oldLoad");

EmpresaDatos::sessionDatos();
try {
    $cFront = new FrontController();
    $cFront->dispatch();
} catch (Exception $e) {
    $vError = new ErrorVista();
    $vError->show($e);
}

// $procModel = new ProcesModel();
// var_dump($procModel->read());
/*
$userModel = new UsuariModel();
$result = $userModel->read();
var_dump(count($result));
*/
