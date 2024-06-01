<?php
class ConfigController extends Controlador
{

   public function show()
   {
      $queIdioma = $this->queIdioma();
      if (isset($_SESSION["admin"]) && $_SESSION["admin"] === 1) {
         $confVista = new ConfigVista();
         $confVista->show($queIdioma);
      }else{
         $errorVista =new ErrorVista();
         $texto= new Exception('No tienes el permiso de CONFIGURAR LA PAGINA WEB');;
         $errorVista->show($texto);
      }


   }
}

?>