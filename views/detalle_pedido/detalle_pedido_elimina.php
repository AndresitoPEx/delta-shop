<?php
include_once __DIR__. '../../../model/detalle_pedido_model.php';

$detalle = Detalle_model::getById($_GET['id']);
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
  <a href="/dtg_mvc/index.php" class="brand-logo"><img class="responsive-img"  src="../../assets/img/delta.png" width="250" style="margin-left:55px;"></a>
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
        <li class="tab"><a style="font-size:20px" href="../../views/clientes/clientes.php"><b>Clientes</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/usuarios/usuarios.php"><b>Usuarios</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/pedidos/pedidos.php"><b>Pedidos</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/categoria/categoria.php"><b>Categorias</b></a></li>
        <li class="tab"><a style="font-size:20px" class="active" href="../../views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
      </ul>
    </div>
  </nav>
    <div class="container">

        <h2>Estas seguro de eliminar los datos: </h2>

            <div class="form-group">
                <label for="pedidos_id">ID PEDIDO:   </label>               
                <label class="form-control"><?php echo $detalle->getPedidoId() ?></label>
            </div>

            <div class="form-group">
                <label for="productos_id">ID PRODUCTO:  </label>
                <label  class="form-control"><?php echo $detalle->getProductoId() ?></label>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <label  class="form-control"><?php echo $detalle->getPrecio() ?></label>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <label  class="form-control"><?php echo $detalle->getCantidad() ?></label>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <label  class="form-control"><?php echo $detalle->getEstado() ?></label>
            </div>


                <hr>
                <td><a class="waves-effect waves-light btn  red darken-1" href='../../controller/detalle_controller.php?action=delete&id=<?php echo $detalle->id?>'>Eliminar</a></td>
                <td><a class="waves-effect waves-light btn  green darken-1" href='/dtg_mvc/views/detalle_pedido/detalle_pedido.php'>Cancelar</a></td>
</body>

</html>