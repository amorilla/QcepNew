<?php

class HomeController extends Controlador
{
    public function __construct()
    {
    }
    public  function show()
    {


        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['lang'])) {
            $queIdioma = $this->sanitize($_GET['lang']);
            $idiomaActive = [
                "es",
                "cn",
                "en"
            ];
            if (in_array($queIdioma, $idiomaActive)) {
                $tiempo = time() + (86400 * 30);
                setcookie("lang", $queIdioma, $tiempo, "/"); // La cookie expira en 30 días
            }
            $idioma = $_GET['lang'];
        } elseif (isset($_COOKIE['lang'])) {
            $idioma = $_COOKIE['lang'];
        } else {
            $idioma = 'es'; // Idioma por defecto
        }
        $oModel = new OraganizacioModel();
        $oDatos = $oModel->read();
        $_SESSION["logo"] = $oDatos;
        $dtModel = new DocumentTextoModel();
        $docDatos = $dtModel->read();
        $sModel = new SectionsModel();
        $sDatos = $sModel->read();

        $fitxerDeTraduccions = "languages/{$idioma}_Texto.php";
        // Cargar el idioma
        HomeVista::show($idioma, $fitxerDeTraduccions, $oDatos, $docDatos, $sDatos);
    }
}
