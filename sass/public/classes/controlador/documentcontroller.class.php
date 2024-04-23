<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class DocumentController extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    public function documents()
    {

        $procesos = [];
        $documents = [];

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {

            $proces_id = $_GET["proces"];

            $proces = new Proces(null, $proces_id, null, null, null);
            $procesModel = new ProcesModel();
            $proces = $procesModel->read($proces);

            if (count($proces) > 0) {
                $pid = $proces->__get('id');
                $document = new Document(null, null, null, null, $pid);
                $documentModel = new DocumentModel();
                $documents = $documentModel->getDocumentByProcesNom($document);
            }
        }

        DocumentVista::show($proces, $documents);
    }

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // $nom = $this->sanitize($_POST["nom"]);
            // $link = $this->sanitize($_POST["link"]);


        }
    }

}