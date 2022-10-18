<section class="modal_editar">
    <div class="contenedor_modal">
        <a href="#" id="close_modal_e" class="modal_close">X</a>
        <br>
        <form class="form" action="../controller/c3.php" method="POST" autocomplete="off" >
        <h1>Editar Usuario</h1>
        <input type="hidden" id="id_user" name="id" value="">
        <input type="text" id="name" required name="username" placeholder="Username" value="" >
        <input type="email" id="email" required name="email" placeholder="Email" value=""> 
        <input type="password" id="pass" required name="password" placeholder="Password" value=""> 

        <?php
        $consulta_r = "SELECT * FROM roles";
        $res_r = mysqli_query($conex, $consulta_r);

        $filas_r = mysqli_num_rows($res_r);
        ?>

        <select name="Rol" id="rol" class="N1">

        <?php
            echo $option;
            if($filas_r > 0){
                while ($rol = mysqli_fetch_array($res_r)){
        ?>
            <option value="<?php echo $rol["id"];?>"> <?php echo $rol["rol"] ?> </option>
        <?php
                }
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