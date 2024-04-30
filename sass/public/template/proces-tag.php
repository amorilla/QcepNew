<div class="container mt-4">
    <!--Section 2-->
    <div class="text-center mb-4">
        <h3>Proces</h3>
    </div>
    <!--Menu1-->

    <div class="Menu2 p-4">
        <div class="row align-items-center mb-3">
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" id="searchInput" class="form-control" style="max-width: 250px;" placeholder="Search...">
                </div>
            </div>
            <div class="col-auto">
                <?php if ($_SESSION["admin"] === 1) : ?>
                    <a href='?proces/addshow' class='btn btn-primary mb-3'>Añadir</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="m-3">
            <ul id="sortable-list" class="portada list-unstyled row">
                <?php echo $html; ?>
            </ul>
        </div>
    </div>
</div>