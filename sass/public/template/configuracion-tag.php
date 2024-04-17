<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-5">
                <h1 class="text-center mb-4">Configuración</h1>
                <ul class="list-group">
                    <?php if ($_SESSION["admin"] === 1) : ?>
                        <li class="list-group-item"><a href="?portada/show" class="text-decoration-none">Portada</a></li>
                        <li class="list-group-item"><a href="?oraganizacio/show" class="text-decoration-none">Organización</a></li>
                        <li class="list-group-item"><a href="?user/config" class="text-decoration-none">Configuración Usuario</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none">Configuración Grupos</a></li>
                    <?php endif; ?>
                    <svg class="bi" width="16" height="16" fill="currentColor">
                        <use xlink:href="#people-fill" />
                    </svg>

                </ul>
            </div>
        </div>
    </div>
</div>