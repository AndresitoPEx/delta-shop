<?php
$errores = $_GET['errores'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
</head>
<br><br><br>
<body class="container grey lighting-3 center">

    <div class="card-panel">
        <table style="border:5px;">
            <tr>
                <td class="center">
                    <img src="../../assets/img/sad.png" width="300px">
                </td>
            </tr>
            <td class="center">
                <h5>ERROR</h5>
                <?php echo $errores;?>
                <a href="/dtg_mvc/views/categoria/categoria_nuevo.php" class="card-panel hoverable waves-effect waves-light btn  black darken-1">VOLVER</a>
            </td>

        </table>
    </div>



</body>

</html>