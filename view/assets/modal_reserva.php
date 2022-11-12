<section class="modal_reserva">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_reserva" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/Eliminar_reserva.php" method="POST" autocomplete="off">
        <h1>Eliminar reserva</h1>
        <h2 class="confirm">¿Estás seguro de querer eliminar la reserva de este usuario?</h2>
        <p class="parrafo" >Usuario: <span class="span" id="user_servicio"></span></p>
        <p class="parrafo" >servicio: <span class="span" id="nombre_servicio"></span> </p>
        <input type="hidden" name="id" id="id_servicio" value="">
        <input type="submit" value="Aceptar">
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>