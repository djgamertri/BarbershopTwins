<?php
    ob_start(); 

    include_once "../../models/Usuario.php";
    $funcion = new Usuario();
    $res = $funcion -> ConsultaUsuarios();
?>

<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap');

    :root{
        --color_p: #009E67;
        --color_d: #1D2231;
        --color_grey: #8390A2;
    }
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        list-style-type: none;
        font-family: 'Poppins', sans-serif;
    }
   
    main{
        margin-top: 85px;
        padding: 2rem 1.5rem;
        background: #f1f5f9;
        min-height: calc(100vh - 90px);
    }
    
    h1{
        text-align: center;
        margin-bottom: 10px;
    }
    table{
        border-collapse: collapse; 
        font-size: 16px;
        width: 100%;
    }
    table th{
        text-align: left;
        padding: 10pt;
        background: #fff;
        color: black;
        border-bottom: 1px solid rgb(184, 182, 182);
    }
    table tr:nth-child(odd){
        background: #dfdddd;
    }
    table tr{
        background: #fff;
    }
    table td{
        padding: 20px;
        color: black;
    }
    
    </style>
</head>

<h1>Usuarios</h1>
<div class="table">
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
        </tr>
        <?php 
        if(!empty($res)){
            for ($i=0; $i < count($res); $i++) {                       
        ?>
        <tr>
            <td><?php echo $res[$i]["id"]?></td>
            <td><?php echo $res[$i]["nombre"]?></td>
            <td><?php echo $res[$i]["correo"]?></td>
            <td><?php echo $res[$i]["rol"]?></td>

        <?php
            }
        }
        ?>
            </td>
        </tr>
    </table>
</div>

<?php
    error_reporting(0);

    require_once '../dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    $dompdf = new DOMPDF();

    $dompdf->load_html(utf8_decode(ob_get_clean()));

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();
    
    $nombre = "usuario.pdf";
    
    $dompdf->stream($nombre);
?>