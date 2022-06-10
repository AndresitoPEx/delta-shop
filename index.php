<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>mvc</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<nav class="nav-extended">
	<div class="nav-wrapper black">

		<a href="/dtg_mvc/index.php" class="brand-logo"><img src="assets/img/delta.png" width="250" style="margin-left:55px;"></a>
		<ul id="nav-mobile" class="right ">
			<li><a href="sass.html">Login</a></li>
			<li><a href="badges.html">Registro</a></li>
			<li><a href="collapsible.html">Carrito</a></li>
		</ul>
	</div>
	<div id="nav-mobile" class="nav-content amber darken-3">
		<ul class="tabs tabs-transparent">
			<li class="tab"><a style="font-size:20px" href="./views/productos/producto.php"><b>Productos</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/clientes/clientes.php"><b>Clientes</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/usuarios/usuarios.php"><b>Usuarios</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/pedidos/pedidos.php"><b>Pedidos</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/categoria/categoria.php"><b>Categorias</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
			<li class="tab"><a style="font-size:20px" href="./views/productox/productox.php"><b>Productox</b></a></li>
		</ul>
	</div>
</nav>


<body class="grey lighten-3">
	<div class="slider">
		<ul class="slides">
			<li>
				<img src="./assets/img/2.jpg">
			</li>
			<li>
				<img src="./assets/img/3.jpg">
			</li>
			<li>
				<img src="./assets/img/4.jpg">
			</li>
			<li>
				<img src="./assets/img/1.jpg">
			</li>
			<li>
				<img src="./assets/img/5.jpg">
			</li>
		</ul>
	</div>
	<br>
	<div class="row">
		<div class="grid-example col s12 center"><span class="flow-text">PRODUCTOS MAS VENDIDOS</span></div>
	</div>
	<div class="row">

		<div class="col s4 center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a9.jpg" width=400px></a>

		</div>
		<div class="col s4  center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a5.jpg" width=400px></a>

		</div>
		<div class="col s4  center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a3.jpg" width=400px></a>

		</div>
		<div class="col s4  center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a6.jpg" width=400px></a>

		</div>
		<div class="col s4  center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a7.jpg" width=400px></a>

		</div>
		<div class="col s4  center">
			<a href=""><img class="hoverable waves-effect waves-light black darken-1" src="./assets/img/a8.jpg" width=400px></a>

		</div>

	</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
	var options = {
		height: 700,
	};
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.slider');
		var instances = M.Slider.init(elems, options);
	});
</script>
<footer class="page-footer black">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2014 Copyright Text
			<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
	</div>
</footer>

</html>