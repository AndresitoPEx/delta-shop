<?php
include_once __DIR__. '../../../model/detalle_pedido_model.php';
$detalle = Detalle_model::getById($_GET['id']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modificar</title>
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <script src="assets/js/materialize.min.js"></script>
</head>

<body class="grey lighten-3">
<nav class="nav-extended">
    <div class="nav-wrapper black ">
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

        <h2>Editar Datos</h2>
        
                

        <form id="nuevo" name="nuevo" method="POST" action="../../controller/detalle_controller.php" autocomplete="off">

            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />

            <div class="form-group">
                <label for="pedidos_id">ID pedidos</label>
                <input type="number" class="form-control" id="pedidos_id" name="pedidos_id" value="<?php echo $detalle->getPedidoId() ?>" />
            </div>

            <div class="form-group">
                <label for="productos_id">ID productos</label>
                <input type="number" class="form-control" id="productos_id" name="productos_id" value="<?php echo $detalle->getProductoId() ?>" />
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $detalle->getPrecio() ?>" />
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $detalle->getCantidad() ?>" />
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $detalle->getEstado() ?>" />
            </div>

                
            <button id="guardar" name="guardar" type="submit" class="waves-effect waves-light btn  pink darken-1">Actualizar</button>

        </form>
</body>

</html>