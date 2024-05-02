<?php
class ProcesController extends Controlador
{
    public function show()
    {
        $fitxerDeTraduct = $this->queIdioma();
        if ($_SESSION["user_info"]) {
            $procesVista = new ProcesVista();
            $procesModel = new ProcesModel();
            $proceData = $procesModel->read();

            $html = $this->showHtml($proceData);
            $procesVista->show($fitxerDeTraduct, $html);
        }
    }
    public function addshow()
    {
        $fitxerDeTraduct = $this->queIdioma();
        if ($_SESSION["admin"] === 1) {
            $procesVista = new ProcesVista();
            $procesModel = new ProcesModel();
            $proceData = new Proces(null, null, null, null);

            $html = $this->addHtml($proceData);
            $procesVista->show($fitxerDeTraduct, $html);
        }
    }
    public function eliminarProces()
    {
    }


    public function showHtml($obj)
    {
        if ($_SESSION["admin"] === 1) {
            $html = "<a href='?proces/addshow' class='btn btn-primary mb-3'>Añadir</a>";
        }
        $html = "<div id='sortable-list' class='row'>";
        foreach ($obj as $value) {
            $html .= "<div class='col-md-4 mb-3'>
                    <a href='?document/show&process={$value->id}' class='text-decoration-none'>
                        <div data-id='{$value->nom}' class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$value->nom}</h5>
                                <p class='card-text'>{$value->objectiu}</p>
                            </div>
                        </div>
                    </a>
                </div>";
        }
        $html .= "</div>";
        return $html;
    }

    public function addHtml($obj)
    {
        $user = $_SESSION["user_info"]["email"];
        $html = "<form action='?proces/add' class='needs-validation' novalidate><div class='container'>";
        $html .= "<div class='mb-3'>";
        $html .= "<label for='usuari' class='form-label'>Creador:</label>";
        $html .= "<input type='text' class='form-control' value='{$user}' disabled>";
        $html .= "</div>";
        $html .= "<div class='mb-3'>";
        $html .= "<label for='name' class='form-label'>Nombre:</label>";
        $html .= "<input type='text' class='form-control' name='name' id='name' required>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un nombre válido.</div>";
        $html .= "</div>";
        $html .= "<div class='mb-3'>";
        $html .= "<label for='tipo' class='form-label'>Tipo:</label>";
        $html .= "<input type='text' class='form-control' name='tipo' id='tipo' required>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un tipo válido.</div>";
        $html .= "</div>";
        $html .= "<div class='mb-3'>";
        $html .= "<label for='objetivo' class='form-label'>Objetivo:</label>";
        $html .= "<textarea class='form-control' name='objetivo' id='objetivo' rows='4' required></textarea>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un objetivo válido.</div>";
        $html .= "</div>";
        $html .= "<button type='submit' class='btn btn-primary'>Crear proceso</button>";
        $html .= "<a href='https://www.qceproba.com/?proces/show' class='btn btn-secondary ms-2'>Volver</a>";
        $html .= "</div></form>";

        echo $html;
        return $html;
    }
}
