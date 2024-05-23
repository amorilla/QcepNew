<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

class DocumentController
{
    public function show()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["process"])) {
            $clients = [];
            $proces_id = $_GET["process"];
            $documentModel = new DocumentModel();
            $documents = $documentModel->getByProcesId($proces_id);
            $clientModel = new ClientModel();
            $procesM = new ProcesModel();
            $clients = $clientModel->getClientsByID($proces_id);
            $proces = $procesM->getById($proces_id);
            $puntoModel = new PuntoModel();

            $aModel = new AvaluacioModel();
            $avaluacions = $aModel->getTable($proces_id);

            $puntos = $puntoModel->getById($proces_id);
            DocumentVista::show($proces, $documents, $clients, $puntos,$avaluacions);
        }
    }


    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST)) {
            $nombre = $_POST['nom'];
            $link = $_POST["link"];
            $porces = (int)$_POST["proces"];

            $dModel = new DocumentModel();
            $dModel->create(new Document(null, $nombre, '', $link, $porces));
            header("Location: https://www.qceproba.com/?document/show&process=" . $_POST["proces"]);
        }
    }

    public function delete()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
            $dModel = new documentModel();
            $dModel->delete($_POST['doc_id']);
            header("Location: https://www.qceproba.com/?document/show&process=" . $_POST["proces_id"]);
        }
    }

    public function update()
    {
        $docId = $_POST["docId"];
        $nom = $_POST["updatedNom"];
        $link = $_POST["updatedLink"];
        $proces = $_POST["proces"];

        $doc = new Document($docId, $nom, '', $link, $proces);
        $dModel = new documentModel();
        $dModel->update($doc);
        header("Location: https://www.qceproba.com/?document/show&process=" . $proces);
    }

    public function generateHeader($org)
    {
        $html = "";
        foreach ($org as $inc) {
            $html = $html . "
            <div class=\"inc\">
                <a href=\"" . $inc->web . "\"><img class=\"logo\" src=\"" . $inc->logo . "\" alt=\"" . $inc->nom . "\"/></a>
                <h2>" . $inc->nom . "</h2>
            </div>
            <button class=\"logOut\"><a href=\"?home/show\">Log Out</a></button>";
        }
        return $html;
    }

    public function generateFooter($apartats)
    {
        $html = '';
        foreach ($apartats as $apartat) {
            $html = $html . "
            <div>
                <a href=\"" . $apartat->link . "\" target=\"_blank\"><img src=\"" . $apartat->icono . "\" alt=\"" . $apartat->nom . "\" /></a>
                <p>" . $apartat->nom . "</p>
            </div>";
        }

        return $html;
    }
}
