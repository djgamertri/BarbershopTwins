<section class="modal_editar">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_e" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/Actualizar_usuario.php" method="POST" autocomplete="off" >
        <h1>Editar Usuario</h1>
        <input type="hidden" id="id_user" name="id" value="">
        <input type="text" id="name" required name="username" placeholder="Username" value="" >
        <input type="email" id="email" required name="email" placeholder="Email" value=""> 

        <?php

        include_once "../controller/Roles.php";

        $roles = $funcion -> ConsultaRoles();
        
        ?>

        <select name="Rol" id="rol" class="N1">

        <?php
            for ($i=0; $i < count($roles); $i++) { 
        ?>
            <option value="<?php echo $roles[$i]["id"];?>"> <?php echo $roles[$i]["rol"] ?> </option>
        <?php
                
            }
        ?>
        </select>
        <input type="submit" name="" value=Actualizar>
        </form>
        <div id="warnings_r">
            <p id="mensaje_r"></p>
        </div>
    </div>
</section>