<section class="modal_editar_servicio">
    <div class="contenedor_modal">
        <a href="#" id="modal_editar_servicio" class="modal_close">X</a>
        <form class="form" action="../controller/Actualizar_servicio.php" method="POST" autocomplete="off">
            <h1>Servicio</h1>
            <input type="hidden" id="Id_servicio" required="[A-Za-z0-9_-]" name="id" value="" >
            <input type="text" id="nombre" required="[A-Za-z0-9_-]" name="nombre" value="" placeholder="Nombre">
            <input type="text" id="descripcion"  name="descripcion" value="" placeholder="descripcion">
            <input type="number" id="precio" required="[A-Za-z0-9_-]" max="999999" name="precio" value="" placeholder="Precio">
            <input type="submit" name="" value="Actualizar">
            <?php 
            if(!empty($_GET["Estado"])){
                echo "<h1><span>Actualizado</span></h1>";
            }        
            ?>
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>