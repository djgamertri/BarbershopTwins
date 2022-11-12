<section class="modal_delete_service">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_service" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/Eliminar_servicio.php" method="POST" autocomplete="off">
            <h1>Eliminar servicio</h1>
            <h2 class="confirm" >¿Estás seguro de querer eliminar este servicio?</h2>
            <p class="parrafo" >nombre: <span class="span" id="nombre_d"></span> </p>
            <p class="parrafo" >desecripcion: <span class="span" id="descripcion_d"></span> </p>
            <p class="parrafo" >precio: <span class="span" id="precio_d"></span> </p>
            <input type="hidden" name="id_servicio" id="id_d" value="">
            <input type="submit" value="Aceptar">
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>