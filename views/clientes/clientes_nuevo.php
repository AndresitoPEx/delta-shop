<?php

/* include_once __DIR__. '../../../model/product_model.php';
include_once __DIR__. '../../../controller/product_controller.php'; */

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../assets/css/materialize.min.css">
	<title>Nuevo Cliente</title>
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
		<h2>Agregar Nuevo Cliente</h2>

		<form id="nuevo" name="nuevo" method="POST" action="../../controller/cliente_controller.php" autocomplete="off">
			<div class="form-group">
				<label for="nombre">Nombres</label>
				<input type="text" class="form-control" id="nombres" name="nombres" />
			</div>

			<div class="form-group">
				<label for="apellido">Apellidos</label>
				<input type="text" class="form-control" id="apellidos" name="apellidos" />
			</div>

			<div class="form-group">
				<label for="correo">Correo</label>
				<input type="email" class="form-control" id="correo" name="correo" />
			</div>

			<div class="form-group">
				<label for="color">telefono</label>
				<input type="number" class="form-control" id="telefono" name="telefono" />
			</div>

			<div class="form-group">
				<label for="precio">Direccion</label>
				<input type="text" class="form-control" id="direccion" name="direccion" />
			</div>

			<div class="form-group">
				<label for="precio">Comentario</label>
				<input type="text" class="form-control" id="comentario" name="comentario" />
			</div>

			<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
			<td><a class="waves-effect waves-light btn  green darken-1" href='/dtg_mvc/views/clientes/clientes.php'>Cancelar</a></td>
		</form>
	</div>

</body>

</html>