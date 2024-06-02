<div class="container mt-4">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <!-- <h4 class="mb-sm-3 font-size-18">Project Overview</h4> -->
                <?php
                if ($_SESSION["admin"] === 1) {
                    echo " <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                        Delete
                    </button>";
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form for POST request -->
    <?php
      echo '<form id="deleteForm" action="'.$GLOBALS['CFG']->url.'/?proces/delete" method="POST" style="display:none;">'
    ?>
        <input type="hidden" name="process" value="<?= htmlspecialchars($proces->getId()) ?>">
    </form>

    <script>
        function confirmDelete() {
            // Submit the hidden form
            document.getElementById('deleteForm').submit();
        }
    </script>




    <!-- end page title -->

    <!-- start of proces introduction -->
    <div class="row">

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h1 class="fw-bold me-4">
                            <!-- <img src="img/forest.jpg" alt="" class="avatar-sm" style="width:60px;height:60px;"> -->
                            <?php echo $proces->getNom(); ?>
                        </h1>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15">
                                <!-- Skote Dashboard UI -->
                                <?php echo $proces->getTipus(); ?>
                            </h5>
                            <!-- <p class="text-muted">Separate existence is a myth. For science, music, sport, etc.</p> -->
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4">Objectiu Principal</h5>

                    <p class="text-muted"> <?php echo $proces->getObjectiu(); ?></p>

                </div>
            </div>

            <!-- Start Tabla de entrada y salida-->

            <?php

            $options = [
                4 => ['4.1', '4.2', '4.3', '4.4'],
                5 => ['5.1', '5.2', '5.3'],
                6 => ['6.1', '6.2', '6.3'],
                7 => ['7.1', '7.2', '7.3', '7.4', '7.5'],
                8 => ['8.1', '8.2', '8.3', '8.4', '8.5', '8.6', '8.7'],
                9 => ['9.1', '9.2', '9.3'],
                10 => ['10.1', '10.2', '10.3'],
            ];

            $marks = [];
            foreach ($puntos as $item) {
                $key = $item['primerNum'] . '.' . $item['segundaNum'];
                $marks[$key] = "<span style='color:red;font-size:30px'>&#10539;</span>";
            }
            ?>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3>Punts de la norma</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <?php
                                echo "<tr>";
                                foreach ($options as $key => $values) {
                                    foreach ($values as $value) {
                                        echo "<th>{$value}</th>";
                                    }
                                }
                                echo "</tr>";

                                echo "<tr>";
                                foreach ($options as $key => $values) {
                                    foreach ($values as $value) {
                                        echo "<td>";
                                        if (isset($marks[$value])) {
                                            echo $marks[$value];
                                        }
                                        echo "</td>";
                                    }
                                }
                                echo "</tr>";
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <!-- End Tabla de entrada y salida-->


            <!-- document table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- table -->
                            <?php
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-striped table-hover">';
                            echo '<thead class="">';
                            echo '<tr>';
                            echo '<th scope="col">Document</th>';
                            echo '<th scope="col">Link</th>';
                            if (isset($_SESSION['admin']) && $_SESSION["admin"] === 1) {
                                echo '<th scope="col">Action</th>';
                            }
                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<form action="?document/create" method="post">';
                                echo '<td>';
                                echo '<input type="hidden" name="proces" value="' . $_GET['process'] . '">';
                                echo '<input class="form-control" type="text" name="nom" placeholder="New Document">';
                                echo '</td>';
                                echo '<td>';
                                echo '<input class="form-control" type="text" name="link" placeholder="Document link">';
                                echo '</td>';
                                echo '<td>';
                                echo '<button type="submit" class="btn btn-success">Add</button>';
                                echo '</td>';
                                echo '</form>';
                                echo '</tr>';
                            }
                            foreach ($documents as $document) {
                                $docId = $document->getId();
                                echo '<tr>';
                                //echo '<td class="text-body">' . $document->getNom() . '</td>';
                                $link = $document->getLink();
                                $maxLength = 30;
                                $trimmedLink = strlen($link) > $maxLength ? substr($link, 0, $maxLength) . '...' : $link;
                                echo '<td><a href="' . $document->getLink() . '" target="_blank">' . $document->getNom() . '</a></td>';
                                if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
                                    echo '<td>';
                                    echo '<div class="btn-group">';
                                    echo '<a href="#" class="btn btn-outline-primary edit-document" data-bs-toggle="modal" data-bs-target="#updateModal' . $docId . '"><i class="fa-solid fa-pencil"></i></a>';
                                    echo '<a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal' . $docId . '"><i class="fa-solid fa-trash"></i></a>';
                                    echo '</div>';
                                    echo '</td>';
                                }
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>'; // end of .table-responsive
                            ?>

                            <!-- end table -->
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>

            <!-- document table -->

            <!-- document table -->
        </div>
        <!-- end of proces introduction -->

        <!-- proces user admin -->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Responsable del procés</h4><?php
                                                                    $usuari_id = $proces->getUsuari_id();
                                                                    $uModel = new UsuariModel();
                                                                    $autor = $uModel->getUserByID($usuari_id);
                                                                    ?>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-size-10 m-0"><?php echo $autor->getUsername(); ?></h5>
                                    </td>
                                    <td>Author</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-10 m-0"><?php echo $autor->getEmail(); ?></h5>
                                    </td>
                                    <td>Email</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-10 m-0"></h5>
                                    </td>
                                    <td>Creado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Clientes</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <?php
                                if (isset($clients)) {
                                    $grupInteresModel = new GrupInteresModel();
                                    foreach ($clients as $client) {
                                        $grup_id = $client->__get('grupInteres_id');
                                        $grupRegistrat = $grupInteresModel->getGrupByID($grup_id);
                                        echo "<tr><td><h5 class='font-size-10 m-0'>{$grupRegistrat->__get('nom')}</h5></td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- proces user admin -->
    </div>

    <!-- modals -->

    <?php
    foreach ($documents as $document) {
        $docId = $document->getId();
        echo '<div class="modal fade" id="deleteModal' . $docId . '" tabindex="-1"
                                             aria-labelledby="deleteModal_' . $docId . 'Label" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered modal-lg">
                                                 <div class="modal-content">
                                                     <form action="?document/delete " method="post">
                                                         <input type="hidden" name="doc_id" value="' . $docId . '" />
                                                         <input type="hidden" name="proces_id" value="' . $proces->getId() . '" />
                                                         <div class="modal-header">
                                                             <h5 class="modal-title" id="deleteModal_' . $docId . 'Label">Delete Document</h5>
                                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <p>Are you sure you want to delete this document?</p>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>';
    }

    ?>

    <!-- modals -->
    <!-- Update Document Modal -->
    <?php foreach ($documents as $document) : ?>
        <div class="modal fade" id="updateModal<?php echo $document->getId(); ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for updating document -->
                        <form action="?document/update" method="post">
                            <input type="hidden" name="docId" value="<?php echo $document->getId(); ?>">
                            <div class="mb-3">
                                <label for="updatedNom" class="form-label">Document Name</label>
                                <input type="text" class="form-control" id="updatedNom" name="updatedNom" value="<?php echo $document->getNom(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="updatedLink" class="form-label">Document Link</label>
                                <input type="text" class="form-control" id="updatedLink" name="updatedLink" value="<?php echo $document->getLink(); ?>" required>
                            </div>
                            <input type="hidden" name="proces" value=<?= $proces->getId() ?>>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php
    echo '<div class="row">
        <div class="card m-2">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tipus</th>
                            <th>Nivell</th>
                            <th>Valoració</th>
                            <th>Planificació</th>
                            <th>Accions</th>
                            <th>Estratègia</th>';

    if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
        echo '<th>Edit</th>';
    }

    echo '</tr>
                    </thead>
                    <tbody>';

    if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
        echo "<tr>";
        echo '<form action="'.$GLOBALS['CFG']->url.'/?avaluacio/create" method="post">';
        echo '<input type="hidden" name="proces_id" id="proces_id" value="' . $proces->getId() . '">';
        echo '<td><input class="form-control" type="text" name="tipus" placeholder="Tipus" required>';
        if (isset($error["tipus"])) {
            echo '<span class="text-danger">' . $error["tipus"] . '</span>';
        }
        echo "</td>";

        echo '<td>
            <select class="form-select" id="nivell" name="nivell">
                <option value="Baix">Baix</option>
                <option value="Mig">Mig</option>
                <option value="Alt">Alt</option>
            </select>
          </td>';

        echo '<td><input class="form-control" type="text" name="valoracio" placeholder="Valoracio" required>';
        if (isset($error["valoracio"])) {
            echo '<span class="text-danger">' . $error["valoracio"] . '</span>';
        }
        echo "</td>";

        echo '<td><input class="form-control" type="text" name="planificacio" placeholder="Planificacio" required>';
        echo '<input type="hidden" value="' . $proces->getId() . '">';
        if (isset($error["planificacio"])) {
            echo '<span class="text-danger">' . $error["planificacio"] . '</span>';
        }
        echo "</td>";

        echo '<td><input class="form-control" type="text" name="accions" placeholder="Accions" required>';
        if (isset($error["accions"])) {
            echo '<span class="text-danger">' . $error["accions"] . '</span>';
        }
        echo "</td>";

        echo '<td>
            <select class="form-select" id="estrategia" name="estrategia">
                <option value="Preventiva">Preventiva</option>
                <option value="De millora">De millora</option>
            </select>
          </td>';

        echo '<td><button type="submit" name="create" class="btn btn-success">Add</button></td>';
        echo "</form>";
        echo "</tr>";
    }

    foreach ($avaluacions as $avaluacio) {
        echo '<tr>';
        echo '<td>' . $avaluacio->__get('tipus') . '</td>';
        echo '<td>' . $avaluacio->__get('nivell') . '</td>';
        echo '<td>' . $avaluacio->__get('valoracio') . '</td>';
        echo '<td>' . $avaluacio->__get('planificacio') . '</td>';
        echo '<td>' . $avaluacio->__get('accions') . '</td>';
        echo '<td>' . $avaluacio->__get('estrategia') . '</td>';

        if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
            echo '<td>
                <div class="d-flex justify-content-start gap-1">
                    <a href="#" class="text-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteAvaluacioModal' . $avaluacio->__get('id') . '">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
              </td>';
        }

        echo '</tr>';
    }

    echo '</tbody>
        </table>
    </div>
    </div>
    </div>';
    ?>


    </tbody>
    </table>
</div>
</div>
</div>


<?php
foreach ($avaluacions as $avaluacio) {
    echo '<div class="modal fade" id="deleteAvaluacioModal' . $avaluacio->__get('id') . '" tabindex="-1" aria-labelledby="deleteAvaluacioModal' . $avaluacio->__get('id') . 'Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAvaluacioModal' . $avaluacio->__get('id') . 'Label">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="'.$GLOBALS['CFG']->url.'/?avaluacio/delete" method="POST">
                        <input type="hidden" name="id" value="' . $avaluacio->__get('id') . '">
                        <input type="hidden" name="proces_id" value="' . $proces->getId() . '">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
}
?>