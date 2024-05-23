<?php
class PortadaController extends Controlador
{
    public function show()
    {
        $queIdioma = $this->queIdioma();
        if ($_SESSION["admin"] === 1) {
            $protadaVista = new PortadaVista();
            $protadaModel = new PortadaModel();
            $result = $protadaModel->read();
            $html = $this->readHtml($result);
            $protadaVista->show($queIdioma, $html, '', '');
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('No tienes el permiso de CONFIGURAR LA PAGINA WEB');
            $errorVista->show($texto);
        }
    }
    public function addShow()
    {
        $queIdioma = $this->queIdioma();
        if ($_SESSION["admin"] === 1) {
            $protadaVista = new PortadaVista();
            $html = $this->addHtml();
            $protadaVista->show($queIdioma, $html, '', '');
        }
    }
    public function showupdate()
    {
        $queIdioma = $this->queIdioma();
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['uid'])) {
            $id = $_GET["uid"];
            $protadaVista = new PortadaVista();
            $protadaModel = new PortadaModel();
            $result = $protadaModel->read($id);
            if ($result == null) {
                $errorVista = new ErrorVista();
                $texto = new Exception('No existe la portada que quieres modificar');
                $errorVista->show($texto);
            } else {
                $html = $this->configShow($result);
                $protadaVista->show($queIdioma, $html, '', '');
            }
        }
    }

    public function add()
    {
        $queIdioma = $this->queIdioma();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['nom']) && isset($_POST['descripcio']) && isset($_POST['enllac'])) {
            $id = (int)$this->sanitize($_POST["id"]);
            $nom = $_POST["nom"];
            $icono = $this->sanitize($_FILES["icono"]["name"]);
            $descripcio = $this->sanitize($_POST["descripcio"]);
            $enllac = $this->sanitize($_POST["enllac"]);
            if ($_FILES['icono']['error'] === 0) {
                $fileInputName = 'icono';
                $uploadDirectory = './img/portada/';
                $icono = $this->saveUploadedFile($fileInputName, $uploadDirectory);
            }
            $portada = new Portada($id, $nom, $icono, $descripcio, $enllac);
            $protadaVista = new PortadaVista();
            $protadaModel = new PortadaModel();
            $result = $protadaModel->create($portada);
            header("Location: https://www.qceproba.com/?portada/show");
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('No existe la portada que quieres modificar');
            $errorVista->show($texto);
        }
    }

    public function update()
    {
        $queIdioma = $this->queIdioma();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $id = $this->sanitize($_POST["id"]);
            $nom = $this->sanitize($_POST["nom"]);
            $icono = $this->sanitize($_FILES["icono"]["name"]);
            $descripcio = $this->sanitize($_POST["descripcio"]);
            $enllac = $this->sanitize($_POST["link"]);

            $icono = null;
            // Ejecutar el metodo para guardar el imagen, y hacer un return la ruta de donde se guarda
            if ($_FILES['icono']['error'] === 0) {
                $fileInputName = 'icono';
                $uploadDirectory = './img/portada/';
                $icono = $this->saveUploadedFile($fileInputName, $uploadDirectory);
            }
            $portada = new Portada($id, $nom, $icono, $descripcio, $enllac);
            $protadaVista = new PortadaVista();
            $protadaModel = new PortadaModel();
            $result = $protadaModel->update($portada);
            if ($result) {
                $show = $protadaModel->read($id);
                $html = $this->configShow($show);
                $protadaVista->show($queIdioma, $html, 'Update Correcto');
            } else {
            }
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('No existe la portada que quieres modificar');
            $errorVista->show($texto);
        }
    }

    public function delete()
    {
        $queIdioma = $this->queIdioma();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $id = $_POST["id"];
            $protadaVista = new PortadaVista();
            $protadaModel = new PortadaModel();
            $result = $protadaModel->delete($id);
            if ($result == null) {
                $errorVista = new ErrorVista();
                $texto = new Exception('No existe la portada que quieres modificar');
                $errorVista->show($texto);
            } else {
                $result = $protadaModel->read();
                $html = $this->readHtml($result);
                $protadaVista->show($queIdioma, $html, '', '');
            }
        }
    }

    public function addHtml()
    {
        $html = "<div class='container mt-5'>";
        $html .= "<form action='?portada/add' method='post' enctype='multipart/form-data'>";

        if ($_SESSION["admin"] === 1) {
            $protadaModel = new PortadaModel();
            $maxId = $protadaModel->maxId() + 1;

            $html .= "<div class='mb-3'>";
            $html .= "<label class='form-label'>El ID que añades es: {$maxId}</label>";
            $html .= "</div>";
            $html .= "<input type='hidden' id='id' name='id' value='{$maxId}'>";

            $html .= "<div class='mb-3'>";
            $html .= "<label class='form-label'>Pon el Nombre que quieres:</label>";
            $html .= "<input id='nom' name='nom' class='form-control'>";
            $html .= "</div>";

            $html .= "<div class='mb-3'>";
            $html .= "<label class='form-label' for='icono'>Sube el imagen que quieres:</label>";
            $html .= "<input type='file' name='icono' id='icono' class='form-control' accept='.png, .jpg'>";
            $html .= "</div>";

            $html .= "<div class='mb-3'>";
            $html .= "<label class='form-label'>Pon el descripcion:</label>";
            $html .= "<input id='descripcio' name='descripcio' class='form-control'>";
            $html .= "</div>";

            $html .= "<div class='mb-3'>";
            $html .= "<label class='form-label'>Pon el enlace:</label>";
            $html .= "<input id='enllac' name='enllac' class='form-control'>";
            $html .= "</div>";

            $html .= "<button type='submit' class='btn btn-primary'>AÑADIR</button>";
            $html .= "<a href='https://www.qceproba.com/?portada/show' class='btn btn-secondary ms-2'>Volver</a>";
        }

        $html .= "</form>";
        $html .= "</div>";

        return $html;
    }



    public function readHtml($obj)
    {
        $html = "<div class='container mt-5'>";
        $html .= "<a href='?portada/addShow' class='btn btn-primary mb-3'>ADD</a>";

        foreach ($obj as $value) {
            $html .= "<table class='table table-bordered'>";
            foreach ($value as $k => $var) {
                if ($k == "icono") {
                    $html .= "<tr>";
                    $html .= "<th>{$k}</th>";
                    $html .= "<td><img width='32' height='32' src='{$var}'/></td>";
                    $html .= "</tr>";
                } else if ($k !== "id") {
                    $html .= "<tr>";
                    $html .= "<th>{$k}</th>";
                    $html .= "<td>{$var}</td>";
                    $html .= "</tr>";
                }
            }

            $html .= "<tr>";
            $html .= "<td colspan='2'>";
            $html .= "<a href='?portada/showupdate&uid={$value["id"]}' class='btn btn-secondary me-2'>Update</a>";

            // Agregar modal de confirmación de eliminación
            $html .= '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="' . $value["id"] . '">DELETE</button>';

            $html .= "</td>";
            $html .= "</tr>";

            $html .= "</table>";
        }

        $html .= "</div>";

        // Modal de confirmación de eliminación
        $html .= '
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item?
                    </div>
                    <div class="modal-footer">
                        <form action="https://www.qceproba.com/?portada/delete" method="POST">
                            <input type="hidden" id="deleteItemId" name="id" value =' . $value['id'] . '">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';

        return $html;
    }






    public function configShow($portada)
    {
        $html = "<div class='container mt-5'>";
        $html .= "<form action='?portada/update' method='post' enctype='multipart/form-data'>";

        if ($_SESSION["admin"] === 1) {
            foreach ($portada as $key => $value) {
                if ($key == "icono") {
                    $html .= "<div class='mb-3'>";
                    $html .= "<label class='form-label' for='icono'>Sube el imagen que quieres:</label>";
                    $html .= "<input type='file' name='icono' id='icono' class='form-control' accept='.png, .jpg'>";
                    $html .= "</div>";
                } else if ($key !== "id") {
                    $html .= "<div class='mb-3'>";
                    $html .= "<label class='form-label'>{$key}:</label>";
                    $html .= "<input type='text' id='{$key}' name='{$key}' value='{$value}' class='form-control'>";
                    $html .= "</div>";
                } else {
                    $html .= "<input type='hidden' name='id' value='{$value}'>";
                    $html .= "<label class='form-label'>{$key}:{$value} <span class='text-muted'>El ID no se puede cambiar</span></label>";
                }
            }
        }

        $html .= "</br><button type='submit' class='btn btn-primary'>MODIFICAR</button>";
        $html .= "<a href='https://www.qceproba.com/?portada/show' class='btn btn-secondary ms-2'>Volver</a>";
        $html .= "</form>";
        $html .= "</div>";

        return $html;
    }


    public function saveUploadedFile($fileInputName, $uploadDirectory)
    {
        // Cosegir los datos de los imagenes
        $fileName = $_FILES[$fileInputName]['name'];
        $fileTmpName = $_FILES[$fileInputName]['tmp_name'];
        $fileError = $_FILES[$fileInputName]['error'];

        // Comprobar si hemos usbido un imagen o no
        if ($fileError === 0) {
            // Cuntar la ruta y el nombre del imagen
            $savePath = $uploadDirectory . $fileName;

            // Si existe el fichero pues eliminamos el fichero de anters
            if (file_exists($savePath)) {
                unlink($savePath);
            }

            // Mover el imagen que hemos pedido
            if (move_uploaded_file($fileTmpName, $savePath)) {
                // Retorna la ruta absoluta
                return $savePath;
            } else {
                // Mover el imagen mal
                echo "File upload failed: " . $_FILES[$fileInputName]['error'];
                return false;
            }
        } else {
            // Si sale un error en subir el imagen
            return false;
        }
    }
}
