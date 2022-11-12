<section class="modal_register_service">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_register_service" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/Registrar_servicio.php" method="POST" autocomplete="off" onsubmit="return validar_registro();">
            <h1>Registrar Servicio</h1>
            <input type="hidden" id="Id_servicio" required="[A-Za-z0-9_-]" minlength="5" name="id" value="" >
            <input type="text" id="nombre" required="[A-Za-z0-9_-]" name="nombre" minlength="5" value="" placeholder="Nombre">
            <input type="text" id="descripcion"  name="descripcion" value="" minlength="5" placeholder="descripcion">
            <input type="number" id="precio" required="[A-Za-z0-9_-]" min="1000" max="999999" name="precio" value="" placeholder="Precio">
            <input type="submit" id="boton_r" name="" value=Register>
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>