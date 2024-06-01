<?php

class DocumentTextController extends Controlador
{
    public function showall()
    {
        if ($_SESSION["admin"] === 1) {
            $dModel = new DocumentTextoModel();
            $sDatos = $dModel->read();
            $dVista = new DocumenttextVista();
            $dVista->showAll($sDatos);
        } else {
            throw new Exception("No tienes el permiso de añadir un nuevo documento!!!");
        }
    }
    public function show()
    {
        $docId =  $_GET['id'];
        $docModel = new DocumentTextoModel();
        $document = $docModel->getById($docId);

        if ($document != null) {
            $sModel = new SectionsModel();
            $sDatos = $sModel->getByIdDocument($docId);
            $dVista = new DocumenttextVista();
            $dVista->show($document, $sDatos);
        } else {
            throw new Exception("No existe este documento !!!");
        }
    }

    public function showAdd()
    {
        if ($_SESSION["admin"] === 1) {
            $dModel = new DocumentTextoModel();
            $sDatos = $dModel->read();
            $dVista = new DocumenttextVista();
            $dVista->showAdd();
        } else {
            throw new Exception("No tienes el permiso de añadir un nuevo documento!!!");
        }
    }

    public function showUpdate()
    {
        if ($_SESSION["admin"] === 1 && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $dId = $_GET['doc'];
            $dModel = new DocumentTextoModel();
            $documento = $dModel->getById($dId);
            $sModel = new SectionsModel();
            $sDatos = $sModel->getByIdDocument($dId);

            $dVista = new DocumenttextVista();
            $dVista->showUpdate($documento, $sDatos);
        } else {
            throw new Exception("No tienes el permiso para modificar los documentos");
        }
    }

    public function add()
    {
        try {
            // 输出 $_POST 和 $_FILES 以进行调试
            var_dump($_POST);
            // var_dump($_FILES);
            // 检查管理员权限和请求方法
            if ($_SESSION["admin"] === 1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $user_id = 7;

                $documentModel = new DocumentTextoModel();
                $document_id = $documentModel->create($title, $user_id);

                // 检查必要的表单数据是否存在
                $numImg = 0;
                if (!empty($_POST['section_type']) && !empty($_FILES['sections']) && !empty($_POST['sections'])) {
                    $sectionsModel = new SectionsModel();
                    $section_types = $_POST['section_type'];
                    $sections_data = $_POST['sections'];

                    $numText = 0;
                    $numImg = 0;
                    $index = 0;
                    foreach ($section_types as $tipo) {
                        if ($tipo == 'image') {
                            $target_dir = "./img/Documentos/";
                            $target_file = $target_dir . basename($_FILES["sections"]["name"][$numImg]);
                            if (move_uploaded_file($_FILES["sections"]["tmp_name"][$numImg], $target_file)) {
                                // 图片上传成功，创建相应的数据库记录
                                $sectionData = [
                                    'document_id' => $document_id,
                                    'type' => 'image',
                                    'content' => '',
                                    'image_url' => $target_file,
                                    'position' => $index
                                ];
                                $numImg++;
                                $sectionsModel->create($sectionData);
                            } else {
                                // 图片上传失败，抛出异常
                                throw new Exception("ERROR: Image upload failed");
                            }
                        } else {
                            $sectionData = [
                                'document_id' => $document_id,
                                'type' => 'text',
                                'content' => $_POST['sections'][$numText],
                                'image_url' => '',
                                'position' => $index
                            ];
                            $numText++;
                            $sectionsModel->create($sectionData);
                        }
                    }
                }
                // 重定向到文档显示页面
                header("Location: ".$GLOBALS['CFG']->url."/?documenttext/showall");
            } else {
                throw new Exception("No tienes el permiso para modificar los documentos");
            }
        } catch (Exception $e) {
            // 捕获异常并抛出一个新的异常消息
            throw new Exception("Ha pasado un error:" . $e->getMessage());
        }
    }

    public function delete()
    {
        if ($_SESSION["admin"] === 1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $dId = $_POST['document_id'];
            $sModel = new SectionsModel();
            $sModel->deleteAllByDocument($dId);
            $dModel = new DocumentTextoModel();
            $dModel->delete($dId);
            header("Location: ".$GLOBALS['CFG']->url."/?documenttext/showall");
        } else {
            throw new Exception("No tienes el permiso para modificar los documentos");
        }
    }

    public function update()
    {
        $dId = (int)$_POST['idDoc'];

        try {
            if ($_SESSION["admin"] === 1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $user_id = 7;

                $documentModel = new DocumentTextoModel();
                $documentModel->update($dId, $title, $user_id);

                // 删除所有与该文档关联的sections
                $sModel = new SectionsModel();
                $sModel->deleteAllByDocument($dId);

                // 检查必要的表单数据是否存在
                if (!empty($_POST['section_type']) && !empty($_POST['sections'])) {
                    $sectionsModel = new SectionsModel();
                    $section_types = $_POST['section_type'];
                    $sections_data = $_POST['sections'];

                    $numText = 0;
                    $numImg = 0;
                    $index = 0;

                    foreach ($section_types as $tipo) {
                        if ($tipo == 'image') {
                            $target_dir = "./img/Documentos/";
                            $target_file = $target_dir . basename($_FILES["sections"]["name"][$numImg]);
                            if (move_uploaded_file($_FILES["sections"]["tmp_name"][$numImg], $target_file)) {
                                $sectionData = [
                                    'document_id' => $dId,
                                    'type' => 'image',
                                    'content' => '',
                                    'image_url' => $target_file,
                                    'position' => $index
                                ];
                                $numImg++;
                                $sectionsModel->create($sectionData);
                            } else {
                                throw new Exception("ERROR: Image upload failed");
                            }
                        } else {
                            $sectionData = [
                                'document_id' => $dId,
                                'type' => 'text',
                                'content' => $_POST['sections'][$numText],
                                'image_url' => '',
                                'position' => $index
                            ];
                            $numText++;
                            $sectionsModel->create($sectionData);
                        }
                        $index++;
                    }
                }
                // 重定向到文档显示页面
                header("Location: ".$GLOBALS['CFG']->url."/?documenttext/showall");
            } else {
                throw new Exception("No tienes el permiso para modificar los documentos");
            }
        } catch (Exception $e) {
            // 捕获异常并抛出一个新的异常消息
            echo "Ha pasado un error: " . $e->getMessage();
        }
    }
}
