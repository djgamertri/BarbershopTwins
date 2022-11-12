<?php
    ob_start(); 

    include_once "../../models/Reserva.php";
    $funcion = new Reserva();
    $res = $funcion -> ConsultaReservas();
?>

<head>
    <meta charset="UTF-8">
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

<h1>Reservas</h1>
<div class="table">
    <table>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Auxiliar</th>
            <th>Servicio</th>
            <th>Fecha Reserva</th>
            <th>Hora Reserva</th>
        </tr>
        <?php 
        if(!empty($res)){
            for ($i=0; $i < count($res); $i++) {                       
        ?>
        <tr>
            <td> <?php echo $res[$i]["id"]?> </td>
            <td> <?php echo $res[$i]["nombre"]?> </td>
            <?php
            $aux = $funcion -> ConsultaAuxiliar($res[$i]["id"]);
            ?> 
            <td><?php echo $aux[0]["nombre"] ?></td>
            <td> <?php echo $res[$i]["nombre_s"]?> </td>
            <td> <?php echo $res[$i]["Fecha"]?> </td>
            <td> <?php if($res[$i]["Hora"] < 12){echo (int)(substr($res[$i]["Hora"], 0, 2))." AM";}else{echo (int)(substr($res[$i]["Hora"], 0, 2))." PM";}?> </td>
        </tr>
        <?php 
        }}
        ?>
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
    
    $nombre = "reservas.pdf";
    
    $dompdf->stream($nombre);
?>