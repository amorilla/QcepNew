<div class="container mt-4">
    <div class="text-center mb-4">
        <h3>Documentos</h3>
    </div>
    <div id="sortable-list" class="row">
        <div class="col-md-4 mb-3">
            <a href="?documenttext/showAdd" class="text-decoration-none">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100px;">
                        <h1 class="card-title">+</h1>
                    </div>
                </div>
            </a>
        </div>
        <?php foreach ($sDatos as $value) : ?>
            <div class="col-md-4 mb-3">
                <a href="?documenttext/showUpdate&doc=<?php echo $value->getId(); ?>" class="text-decoration-none">
                    <div data-id="<?php echo $value->getId(); ?>" class="card" style="height: 100px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value->getTitle(); ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>