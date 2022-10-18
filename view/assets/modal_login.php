<section class="modal_login">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_l" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/c2.php" method="POST" autocomplete="off" onsubmit="return validar();">
            <h1>Login</h1>
            <input type="email" required name="email" id="email" placeholder="Email">
            <input type="password" required name="password" id="pass" placeholder="Password">
            <input type="submit" name="" id="boton" value="Login">
        </form>
        <div id="warnings">
            <p id="mensaje"></p>
        </div>
    </div>
</section>