<?php
class DocumentVista extends Vista
{
    public static function show($proces, $documents, $clients, $puntos, $avaluacions)
    {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/documentos-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }
}
