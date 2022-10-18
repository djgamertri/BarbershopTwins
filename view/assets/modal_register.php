<section class="modal_register">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_r" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/c1.php" method="POST" autocomplete="off" onsubmit="return validar_registro();">
            <h1>Register</h1>
            <input type="text" required id="user_r" name="username" placeholder="Username" >
            <input type="email" required id="email_r" name="email" placeholder="Email"> 
            <input type="password" required id="pass_r" name="password" placeholder="Password">
            <input type="submit" id="boton_r" name="" value=Register>
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>