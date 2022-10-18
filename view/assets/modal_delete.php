<section class="modal_delete">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_d" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/c4.php" method="POST" autocomplete="off">
            <h1>Eliminar Usuario</h1>
            <h2 class="confirm" >¿Estás seguro de querer eliminar a este usuario?</h2>
            <p class="parrafo" >Usuario: <span class="span" id="user_d"></span> </p>
            <p class="parrafo" >Correo: <span class="span" id="email_d"></span> </p>
            <p class="parrafo" >Tipo de rol: <span class="span" id="rol_d"></span> </p>
            <input type="hidden" name="id" id="id_d" value="">
            <input type="submit" value="Aceptar">
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>