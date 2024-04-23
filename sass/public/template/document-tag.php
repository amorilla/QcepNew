<main class="proces">
    <!-- <?php
    // echo $main; //is in classes/controller/doccontroller/generateMain ?> -->

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-3 font-size-18">Project Overview</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start of proces introduction -->
        <div class="row">

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="fw-bold me-4">
                                <!-- <img src="img/forest.jpg" alt="" class="avatar-sm" style="width:60px;height:60px;"> -->
                                <?php echo $proces->__get('nom'); ?>
                            </h1>

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15">
                                    <!-- Skote Dashboard UI -->
                                    <?php echo $proces->__get('tipus'); ?>
                                </h5>
                                <p class="text-muted">Separate existence is a myth. For science, music, sport, etc.</p>
                            </div>
                        </div>

                        <h5 class="font-size-15 mt-4">Project Details :</h5>

                        <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical
                            Cambridge friend of mine told me what Occidental is. The European languages are members of
                            the same family. Their separate existence is a myth. For science, music, sport, etc,</p>

                        <div class="text-muted mt-4">
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it would be
                                necessary</p>
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is a myth.</p>
                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages coalesce</p>
                        </div>

                        <div class="row task-dates">
                            <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date
                                    </h5>
                                    <p class="text-muted mb-0">08 Sept, 2019</p>
                                </div>
                            </div>

                            <div class="col-sm-4 col-6">
                                <div class="mt-4">
                                    <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due
                                        Date</h5>
                                    <p class="text-muted mb-0">12 Oct, 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- document table -->
                <div class="card">
                    <div class="card-body">
                        <!-- table -->
                        <?php

                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                            echo "<p class='new'><a href='#'>+ NEW</a></p>";
                        }

                        if (isset($documents) && count($documents) !== 0) {
                            echo '<table class="table">
                                <thead>
                                    <tr class="table-danger">
                                        <th scope="col">Document</th>
                                        <th scope="col">Link</th>';

                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                echo '<th scope="col">Action</th>';
                            }

                            echo '</tr></head><tbody>';

                            if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                                $html .= "<tr>";
                                $html .= "<form action='?document/create' method='post'>";
                                $html .= "<td>";
                                $html .= "<input type='text' name='nom' placeholder='New Document'>";
                                $html .= "</td>";
                                $html .= "<td>";
                                $html .= "<input type='text' name='link' placeholder='Document link'>";
                                $html .= "</td>";
                                $html .= "<td colspan='2'>";
                                $html .= "<button class='btnAdd' type='submit'>Add</button>";
                                $html .= "</td>";
                                $html .= "</form>";
                                $html .= "</tr>";
                            }

                            foreach ($documents as $document){
                                echo '<tr><td class="text-body">'.$document->__get('nom').'</td>';
                                $html .= '<td><a href="#">' . $document->__get('link') . '</a></td>';

                                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                                    echo '<td>
                                    <div class="d-flex gap-1">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="text-success">
                                            <i class="bi bi-pencil font-size-18"></i>
                                        </a>
                                        <a href="#removeItemModal" data-bs-toggle="modal" class="text-danger">
                                            <i class="bi bi-trash font-size-18"></i>
                                        </a>
                                    </div>
                                    </td>';
                                }

                                echo '</tr>';
                            }

                            echo '</tbody></table>';

                        }

                        ?>
                        <!-- end table -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- document table -->
            </div>
            <!-- end of proces introduction -->

            <!-- proces user admin -->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Owner Member</h4>

                        <?php
                            $usuari_id = $proces->__get('usuari_id');
                            $usuari = new Usuari($usuari_id, null, null, null);
                            $autor = $usuari->getUsernameByID($usuari_id);
                        ?>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0">
                                                <?php echo $autor->getUsername(); ?>
                                            </h5>
                                        </td>
                                        <td>Author</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0">
                                                <?php echo $autor->getEmail(); ?>
                                            </h5>
                                        </td>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 m-0">
                                                <?php echo "data"; ?>
                                            </h5>
                                        </td>
                                        <td>Updated</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proces user admin -->
        </div>

        <!-- modals -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form autocomplete="off" class="needs-validation createorder-form" id="createorder-form"
                        novalidate="">

                        <!-- modal body -->
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" class="form-control" value="12">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Document Name</label>
                                        <input type="text" id="nom" name="nom" class="form-control"
                                            placeholder="Document name">
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Document Link</label>
                                        <input type="text" id="link" name="link" class="form-control"
                                            placeholder="Document link">
                                        <div class="invalid-feedback">Please enter amount.</div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- end modal body -->

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <!-- end modal footer -->

                    </form>

                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>

        <!-- modals -->

</main>