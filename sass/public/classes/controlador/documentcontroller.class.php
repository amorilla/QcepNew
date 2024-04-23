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

    // public function generateMain($procesos, $documents)
    // {
    //     $html = "";

    //     if (isset($procesos) && count($procesos) !== 0) {
    //         foreach ($procesos as $proces) {
    //             $html .= "<div class=\"proces1\">";
    //             $html .= "<a href=\"?logged/connected\">BACK</a>";
    //             $html .= "<h2>" . $proces->__get('nom') . "</h2>";
    //             $html .= "<h3>Objectiu</h3>";
    //             $html .= "<p class=\"text\">" . $proces->__get('objectiu') . "</p>";

    //             $usuari_id = $proces->__get('usuari_id');
    //             $usuari = new Usuari($usuari_id, null, null, null);
    //             $autor = $usuari->getUsernameByID($usuari_id);

    //             $html .= "<p><b>Author:</b>" . $autor->getUsername() . "</p>";
    //             $html .= "<p><b>Email:</b>" . $autor->getEmail() . "</p>";

    //             $html .= "</div>";

    //             if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                 $html .= "<p class='new'><a href='#'>+ NEW</a></p>";
    //             }

    //             if (isset($documents) && count($documents) !== 0) {
    //                 $html .= "<div>";
    //                 $html .= "<table><thead>";
    //                 $html .= "<tr>";
    //                 $html .= "<th>nom</th>";
    //                 $html .= "<th>link</th>";

    //                 if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                     $html .= "<th></th><th></th>";
    //                 }

    //                 $html .= "</tr></thead><tbody>";

    //                 if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                     $html .= "<tr>";
    //                     $html .= "<form action='?document/create' method='post'>";
    //                     $html .= "<td>";
    //                     $html .= "<input type='text' name='nom' placeholder='New Document'>";
    //                     $html .= "</td>";
    //                     $html .= "<td>";
    //                     $html .= "<input type='text' name='link' placeholder='Document link'>";
    //                     $html .= "</td>";
    //                     $html .= "<td colspan='2'>";
    //                     $html .= "<button class='btnAdd' type='submit'>Add</button>";
    //                     $html .= "</td>";
    //                     $html .= "</form>";
    //                     $html .= "</tr>";
    //                 }

    //                 foreach ($documents as $document) {

    //                     $html .= "<tr>";
    //                     $html .= "<td>" . $document->__get('nom') . "</td>";
    //                     $html .= "<td><a href=\"\">" . $document->__get('link') . "</a></td>";

    //                     if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                         $html .= "<td><button class='edit'>Edit</button></td><td><button class='delete'>Delete</button></td>";
    //                     }

    //                     $html .= "</tr>";
    //                 }

    //                 $html .= "</tbody></table>";
    //                 $html .= "</div>";
    //             }
    //         }
    //     }

    // }



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