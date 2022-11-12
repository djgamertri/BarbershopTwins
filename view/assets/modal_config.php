<section class="modal_config">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_config" class="modal_close">X</a>
        <form class="form" action="../controller/Actualizar_perfil.php" method="POST" autocomplete="off">
            <h1>Perfil</h1>
            <img src="<?php echo $_SESSION["imagen"]?>" alt="barbershop logo" class="logo_User">
            <input type="hidden" required="[A-Za-z0-9_-]" name="id" value="<?php echo $_SESSION["id"] ?>" >
            <input type="text" required="[A-Za-z0-9_-]" name="username" minlength="5" value="<?php echo $_SESSION["nombre"] ?>" placeholder="Nombre">
            <input type="email" required="[A-Za-z0-9_-]" name="email" value="<?php echo $_SESSION["correo"] ?>" placeholder="Email">
            <input type="password" required="[A-Za-z0-9_-]" name="password" minlength="5" value="" placeholder="Password">
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