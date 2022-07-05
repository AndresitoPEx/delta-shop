<?php

include_once __DIR__ . '../../../model/cliente_model.php';
/* include_once __DIR__. '../../../controller/product_controller.php'; */

$view = 'lista';
if (isset($_GET['view'])) {
  $view = $_GET['view'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/materialize.min.css">
  <title>Clientes</title>
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

    <h2>Clientes</h2>
    <div class="row">
      <div class="col s12 m6 50"><a href="/dtg_mvc/views/clientes/clientes_nuevo.php" class="waves-effect waves-light btn  orange darken-1">AGREGAR</a></div>
      <div class="col s3 offset-s3"><a href="/dtg_mvc/index.php" class="waves-effect waves-light btn  black darken-1">INICIO</a></div>
    </div>
    <br/>
    <br/>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr class="table-primary">

            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Comentario</th>
            <?php if ($view == 'lista') { ?>
              <th>Editar</th>
              <th>Eliminar</th>
            <?php } elseif ($view == "search") { ?>
              <th>SELECCIONAR</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php

          $lista = Cliente_model::getAll();
          for ($i = 0; count($lista) > $i; $i++) {
          ?>
            <div>
              <tr>

                <td class=""><?php echo $lista[$i]->getNombres() ?></td>
                <td class=""><?php echo $lista[$i]->getApellidos() ?></td>
                <td class=""><?php echo $lista[$i]->getCorreo() ?></td>
                <td class=""><?php echo $lista[$i]->getTelefono() ?></td>
                <td class=""><?php echo $lista[$i]->getDireccion() ?></td>
                <td class=""><?php echo $lista[$i]->getComentario() ?></td>
                <?php if ($view == 'lista') { ?>
                  <td><a class="waves-effect waves-light btn  light blue darken-1" href='/dtg_mvc/views/clientes/clientes_modifica.php?id=<?php echo $lista[$i]->id ?>'>Editar</a></td>
                  <td><a class="waves-effect waves-light btn  red darken-1" href='/dtg_mvc/views/clientes/cliente_elimina.php?id=<?php echo $lista[$i]->id ?>'>Eliminar</a></td>

                <?php } elseif ($view == "search") { ?>
                  <td><a class="waves-effect waves-light btn  red darken-1" href='/dtg_mvc/views/pedidos/pedido_nuevo.php?id_cliente=<?php echo $lista[$i]->id ?>'>Seleccionar</a></td>
                <?php } ?>
              </tr>
            </div>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>