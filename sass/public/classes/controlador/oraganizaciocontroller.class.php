<?php
class OraganizacioController extends Controlador
{
    public function show()
    {
        $queIdioma = $this->queIdioma();
        if ($_SESSION["admin"] === 1) {
            $organizacioVista = new OrganizacioVista();
            $organizacioaModel = new OraganizacioModel();

            $orgObj = $organizacioaModel->read();
            $html = $this->updateHtml($orgObj);

            $organizacioVista->show($queIdioma, $html, '', '');
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('No tienes el permiso de CONFIGURAR LA PAGINA WEB');
            $errorVista->show($texto);
        }
    }



    public function updatedatos()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['logo'])) {
            $nom = $this->sanitize($_POST["nom"]);
            $email = $this->sanitize($_POST["email"]);
            $web = $this->sanitize($_POST["web"]);

            // Define target directory and file path
            $targetDir = "img/";
            $targetFile = $targetDir . "logo.png";

            // Check if file was uploaded without errors
            if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
                // Check if target file already exists, if yes, delete it
                if (file_exists($targetFile)) {
                    unlink($targetFile);
                }

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
                    // File uploaded successfully, now create the Organizacio object
                    $portada = new Organizacio($nom, $email, $web, $targetFile);
                    $protadaModel = new OraganizacioModel();
                    $result = $protadaModel->update($portada);
                    header("Location: https://www.qceproba.com/");
                } else {
                    // Error while uploading file
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                // No file uploaded or error occurred during upload
                echo "No file uploaded or error occurred during upload.";
            }
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('ERROR');
            $errorVista->show($texto);
        }
    }


    public function updateHtml($obj)
    {
        $html = "
    <form action='?oraganizacio/updatedatos' method='post' enctype='multipart/form-data' class='mt-4'>
        <div class='row'>";
        if ($_SESSION["admin"] === 1) {
            foreach ($obj as $key => $value) {
                foreach ($value as $k => $var) {
                    if ($k == "logo") {
                        $html .= "<div class='col-md-12 mb-3'>
                                <label for='logo' class='form-label'>Sube el LOGO que quieres:</label>
                                <input type='file' name='logo' id='logo' class='form-control' accept='.png, .jpg'>
                            </div>";
                    } else {
                        if ($k === "id") {
                            $html .= "<input type='hidden' id='{$k}' name='{$k}' value='{$var}'>";
                        } else {
                            $html .= "<div class='col-md-12 mb-3'>
                                    <label for='{$k}' class='form-label'>{$k}:</label>
                                    <input type='text' id='{$k}' name='{$k}' value='{$var}' class='form-control'>
                                </div>";
                        }
                    }
                }
            }
        }
        $html .= "</div>
        <div class='mt-3'>
            <input type='submit' value='MODIFICAR' class='btn btn-primary'>
            <a href='https://www.qceproba.com/?config/show' class='btn btn-secondary'>Volver</a>
        </div>
    </form>";
        return $html;
    }
}
