<?php
class DocumenttextVista extends Vista
{
    public function showAll($sDatos)
    {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/alldocumenttext-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }
    public function show($document, $sDatos)
    {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/documenttext-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }

    public function showAdd()
    {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/adddocumenttext-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }
    public function showUpdate($documento, $sDatos)
    {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head-tag.php";
        echo "<body>";
        include "template/header-tag.php";
        include "template/updatedocumenttext-tag.php";
        include "template/footer-tag.php";
        echo "</body></html>";
    }
}
