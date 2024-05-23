<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-5">
                <h1 class="text-center mb-4">Configuración</h1>
                <ul class="list-group">
                    <?php if ($_SESSION["admin"] === 1) {
                        echo $html;
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>