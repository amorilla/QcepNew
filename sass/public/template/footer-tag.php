</main>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted">©2024 - Grup Qcep 2nDAW</span>
    </div>

    <ul class="nav col-md-4 align-items-center list-unstyled d-flex">

        <?php
        $protadaVista = new PortadaVista();
        $protadaModel = new PortadaModel();
        $result = $protadaModel->read();
        $html = '';

        foreach ($result as $key => $value) {
            $descr = htmlentities($value["descripcio"]);
            $html .= "<li class='ms-3'><a href='{$value["link"]}' target='_blank'><img class='bi' width='24' height='24' src='{$value["icono"]}' title='{$descr}'></a></li>";
        }
        echo $html;

        ?>
    </ul>

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>