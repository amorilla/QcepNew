<div id="pagina" class="iniciar mantent">
    <!--Section 2-->
    <div class="Menu">
        <h1>Configuracion</h1>
    </div>
    <!--Menu1-->

    <div class="Menu2 p40">

        <div class="bordermenu m30">

            <ul class="insertModel">
                <?php
                    if($_SESSION["admin"] === 1){
                        echo "<li><a href='?portada/show'>Portada</a></li>";
                        echo "<li><a href='?oraganizacio/show'>Organizacio</a></li>";
                        echo "<li><a href='?user/config'>Configuracion Usuario</a></li>";
                        echo "<li><a href=''>Configuracion Grupos</a></li>";
                    }
                ?>
            <ul>
        </div>
    </div>