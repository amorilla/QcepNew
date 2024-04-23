<?php

class DocumentVista{

    public static function show($proces, $documents){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/document-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }

}