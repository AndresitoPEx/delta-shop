<?php
include_once __DIR__ . '../../../model/cliente_model.php';

$cliente = Cliente_model::getById($_GET['id']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <script src="assets/js/materialize.min.js"></script>
</head>

<body class="grey lighten-3">
    <nav class="nav-extended">
        <div class="nav-wrapper black">
            <!-- <a href='https://.pngtree.com/so/Linda'>Linda png de .pngtree.com/</a> -->
            <a href="/dtg_mvc/index.php" class="brand-logo"><img class="responsive-img" src="../../assets/img/delta.png" width="250" style="margin-left:55px;"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Iniciar Sesion</a></li>
                <li><a href="badges.html">Carrito</a></li>
                <li><a href="collapsible.html">Notificaciones</a></li>
            </ul>
        </div>
        <div class="nav-content amber darken-3">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a style="font-size:20px" href="../../views/productos/producto.php"><b>Productos</b></a></li>
                <li class="tab"><a style="font-size:20px" class="active" href="../../views/clientes/clientes.php"><b>Clientes</b></a></li>
                <li class="tab"><a style="font-size:20px" href="../../views/usuarios/usuarios.php"><b>Usuarios</b></a></li>
                <li class="tab"><a style="font-size:20px" href="../../views/pedidos/pedidos.php"><b>Pedidos</b></a></li>
                <li class="tab"><a style="font-size:20px" href="../../views/categoria/categoria.php"><b>Categorias</b></a></li>
                <li class="tab"><a style="font-size:20px" href="../../views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
            </ul>
        </div>
    </nav>
    <div class="container">

        <h2>Estas seguro de eliminar este Cliente: </h2>

        <div class="form-group">
            <label for="nombres">Nombres: </label>
            <label class="form-control"><?php echo $cliente->getNombres() ?></label>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos: </label>
            <label class="form-control"><?php echo $cliente->getApellidos() ?></label>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <label class="form-control"><?php echo $cliente->getCorreo() ?></label>
        </div>

        <div class="form-group">
            <label for="telefono">Telefono</label>
            <label class="form-control"><?php echo $cliente->getTelefono() ?></label>
        </div>

        <div class="form-group">
            <label for="direccion">Direccion</label>
            <label class="form-control"><?php echo $cliente->getDireccion() ?></label>
        </div>

        <div class="form-group">
            <label for="comentario">Comentario</label>
            <label class="form-control"><?php echo $cliente->getComentario() ?></label>
        </div>

        <hr>
        <td><a class="waves-effect waves-light btn  red darken-1" href='../../controller/cliente_controller.php?action=delete&id=<?php echo $cliente->id ?>'>Eliminar</a></td>
        <td><a class="waves-effect waves-light btn  green darken-1" href='/dtg_mvc/views/clientes/clientes.php'>Cancelar</a></td>
</body>

</html>