<?php

 include_once __DIR__. '../../../model/pedido_model.php';
//include_once __DIR__. '../../../controller/product_controller.php'; 
include_once __DIR__. '../../../model/cliente_model.php';
$id_cliente=0;
$cliente_objeto=null;
if(isset($_GET['id_cliente'])){
    $id_cliente=$_GET['id_cliente'];

  $cliente_objeto= Cliente_model::getById($id_cliente);
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <title>Nuevo Pedido</title>
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
        <li class="tab"><a style="font-size:20px" class="active" href="../../views/pedidos/pedidos.php"><b>Pedidos</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/categoria/categoria.php"><b>Categorias</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
      </ul>
    </div>
  </nav>
<div class="container">
		<h2>Agregar Nuevo Pedido</h2>

		<form id="nuevo" name="nuevo" method="POST" action="../../controller/pedido_controller.php" autocomplete="off">

			<div class="form-group">
				<label for="cliente_id">Cliente</label>
        <br>
        <a href="/dtg_mvc/views/clientes/clientes.php?view=search" class="waves-effect waves-light btn-small">Buscar</a>
				<?php if($cliente_objeto != null){?>
        <input value="<?php echo $cliente_objeto->getNombres(); ?>" type="text" class="form-control" id="cliente_id" name="cliente_id" />
        <?php }?>
        <input value="<?php echo $id_cliente ?>" type="hidden" class="form-control" id="cliente_id" name="cliente_id" />
			</div>

			<div class="form-group">
				<label for="total">Total</label>
				<input type="number" class="form-control" id="total" name="total" />
			</div>

			<div class="form-group">
				<label for="fecha">Fecha de Entrega</label>
				<input type="date" class="form-control" id="fecha" name="fecha" />
			</div>

            <div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" class="form-control" id="estado" name="estado" />
			</div>

			<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
			<td><a class="waves-effect waves-light btn  green darken-1" href='/dtg_mvc/views/pedidos/pedidos.php'>Cancelar</a></td>
		</form>
	</div>

</body>
</html>