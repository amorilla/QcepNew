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

    public function add()
    {
        $pNom = $_POST['name'];
        $pTipo = $_POST['tipo'];
        $pObjectivo = $_POST['objetivo'];
        $newProces = new Proces(null, $pNom, $pTipo, $pObjectivo, 7);
        $pModel = new ProcesModel();
        $pDatos = $pModel->create($newProces);

        $gModel = new GrupInteresModel();
        $cModel = new ClientModel();
        $eModel = new EntradaModel();
        $interesValues = json_decode($_POST['interesValues'], true);
        if ($interesValues !== null) {
            foreach ($interesValues as $interes) {
                $grupoName = '';
                foreach ($interes as $value) {
                    if (strpos($value, 'Grupo de Interes:') !== false) {
                        $grupoName = trim(str_replace('Grupo de Interes:', '', $value));
                        $gDatos = $gModel->getGrupByName($grupoName);
                    }
                    if (strpos($value, 'Entrada:') !== false) {
                        $entrada = trim(str_replace('Entrada:', '', $value));
                    }
                    if (strpos($value, 'Salida:') !== false) {
                        $salida = trim(str_replace('Salida:', '', $value));
                    }
                }

                if ($gDatos !== null) {
                    $nClient = new Client();
                    $nClient->setProces_id($pDatos);
                    $nClient->setSortida($salida);
                    $nClient->setGrupInteres_id($gDatos->getId());
                    $cModel->create($nClient);

                    //Salida
                    $nEntrada = new Entrada();
                    $nEntrada->setProces_id($pDatos);
                    $nEntrada->setEntrada($entrada);
                    $nEntrada->setGrupInteres_id($gDatos->getId());
                    $eModel->create($nEntrada);
                    var_dump($nClient);
                } else {
                    throw new Exception("ERROR: No existe el grupo" . $grupoName);
                }
            }
        }
        $pNormaValuesString = $_POST['pNormaValues'];
        $pNormaValuesArray = explode(',', $pNormaValuesString);
        $pModel = new PuntoModel();
        foreach ($pNormaValuesArray as $puntos) {
            $arrayPunto = explode('.', $puntos);
            var_dump($arrayPunto[0] . ' ' . $arrayPunto[1]);
            $pModel->create($pDatos, $arrayPunto[0], $arrayPunto[1]);
        }
        header("Location: ".$GLOBALS['CFG']->url."/?proces/show");
    }
    public function addshow()
    {
        $fitxerDeTraduct = $this->queIdioma();
        if ($_SESSION["admin"] === 1) {
            $procesVista = new ProcesVista();
            $procesModel = new ProcesModel();
            $proceData = new Proces(null, null, null, null, null);

            $gModel = new GrupInteresModel();
            $gDatos = $gModel->getTable();

            $html = $this->addHtml($proceData, $gDatos);
            $procesVista->showAdd($fitxerDeTraduct, $html);
        }
    }
    public function delete()
    {

        if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
            $cModel = new ClientModel();
            $cModel->delete((int)$_POST["process"]);

            $pModel = new EntradaModel();
            $pModel->delete((int)$_POST["process"]);

            $puntoM = new PuntoModel();
            $puntoM->deleteById((int)$_POST["process"]);

            $pModel = new ProcesModel();
            $pModel->deleteById((int)$_POST["process"]);

            header("Location: ".$GLOBALS['CFG']->url."/?proces/show");
        }
    }



    public function showHtml($obj)
    {

        $html = "<div id='sortable-list' class='row'>";
        foreach ($obj as $value) {
            $html .= "<div class='col-md-4 mb-3'>
                    <a href='?document/show&process={$value->getId()}' class='text-decoration-none'>
                        <div data-id='{$value->getNom()}' class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$value->getNom()}</h5>
                            </div>
                        </div>
                    </a>
                </div>";
        }
        $html .= "</div>";
        return $html;
    }

    public function addHtml($obj, $gDatos)
    {
        $user = $_SESSION["user_info"]["email"];
        $html = "<form action='?proces/add' method='post' class='needs-validation' novalidate><div class='container mt-4'>";

        // Creador
        $html .= "<div class='mb-3'>";
        $html .= "<label for='usuari' class='form-label'>Creador:</label>";
        $html .= "<input type='text' class='form-control' value='{$user}' disabled>";
        $html .= "</div>";

        // Nombre
        $html .= "<div class='mb-3'>";
        $html .= "<label for='name' class='form-label'>Nombre:</label>";
        $html .= "<input type='text' class='form-control' name='name' id='name' required>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un nombre válido.</div>";
        $html .= "</div>";

        // Tipo
        $html .= "<div class='mb-3'>";
        $html .= "<label for='tipo' class='form-label'>Tipo:</label>";
        $html .= "<input type='text' class='form-control' name='tipo' id='tipo' required>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un tipo válido.</div>";
        $html .= "</div>";

        // Objetivo
        $html .= "<div class='mb-3'>";
        $html .= "<label for='objetivo' class='form-label'>Objetivo:</label>";
        $html .= "<textarea class='form-control' name='objetivo' id='objetivo' rows='4' required></textarea>";
        $html .= "<div class='invalid-feedback'>Por favor, ingresa un objetivo válido.</div>";
        $html .= "</div>";

        // Añadir puntos de norma
        $html .= "<div class='mb-3'>";
        $html .= "<label for='puntoNorma' class='form-label'>Puntos de Norma:</label>";
        $html .= "<div class='input-group mb-3'>";
        $html .= "<select class='form-select' id='puntoNorma'>";
        $options = [
            4 => ['4.1', '4.2', '4.3', '4.4'],
            5 => ['5.1', '5.2', '5.3'],
            6 => ['6.1', '6.2', '6.3'],
            7 => ['7.1', '7.2', '7.3', '7.4', '7.5'],
            8 => ['8.1', '8.2', '8.3', '8.4', '8.5', '8.6', '8.7'],
            9 => ['9.1', '9.2', '9.3'],
            10 => ['10.1', '10.2', '10.3'],
        ];
        foreach ($options as $key => $values) {
            $html .= "<optgroup label='{$key}'>";
            foreach ($values as $value) {
                $html .= "<option value='{$value}'>{$value}</option>";
            }
            $html .= "</optgroup>";
        }
        $html .= "</select>";
        $html .= "<button type='button' class='btn btn-primary ms-2' id='addPuntoNormaBtn'>Add</button>";
        $html .= "</div>";

        // Mostrar puntos de norma añadidos
        $html .= "<ul id='pNormaList' class='list-group mb-3'></ul>";

        // Añadir Entrades y Salides
        $html .= "<div class='mb-3'>";
        $html .= "<label for='gInteres' class='form-label'>Grupo de Interes:</label>";
        $html .= "<select name='gInteres' id='gInteres' class='form-select mb-3'>";
        foreach ($gDatos as $grupo) {
            $html .= "<option value={$grupo->__get('id')}>{$grupo->__get('nom')}</option>";
        }
        $html .= "</select>";

        $html .= "<div class='mb-3'>";
        $html .= "<label for='entrada' class='form-label'>Entrada:</label>";
        $html .= "<input type='text' id='entrada' name='entrada' class='form-control'>";
        $html .= "</div>";

        $html .= "<div class='mb-3'>";
        $html .= "<label for='salida' class='form-label'>Salida:</label>";
        $html .= "<input type='text' id='salida' name='salida' class='form-control'>";
        $html .= "</div>";

        $html .= "<button type='button' class='btn btn-primary mb-3' id='addInteres'>Add</button></br>";

        // Mostrar Interesos añadidos
        $html .= "<label for='interesList' class='form-label'>Interesos añadidos:</label>";
        $html .= "<ul id='interesList' class='list-group mb-3'></ul>";

        $html .= "<input type='hidden' name='pNormaValues' id='pNormaValues'>";
        $html .= "<input type='hidden' name='interesValues' id='interesValues'>";

        $html .= "<button type='submit' class='btn btn-primary'>Crear proceso</button>";
        $html .= "<a href='".$GLOBALS['CFG']->url."/?proces/show' class='btn btn-secondary ms-2'>Volver</a>";

        $html .= "</div></form>";


        return $html;
    }
}
