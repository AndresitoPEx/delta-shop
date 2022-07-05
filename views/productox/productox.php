<?php

include_once __DIR__ . '../../../model/productox_model.php';
$ordenar = (isset($_GET["sort"]) and !empty($_GET["sort"])) ? $_GET["sort"] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/materialize.min.css">
  <title>PRODUCTOX</title>
</head>

<body class="grey lighten-3">
  <nav class="nav-extended ">
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
        <li class="tab"><a style="font-size:20px" class="active" href="../../views/productox/productox.php"><b>PRODUCTOX</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/clientes/clientes.php"><b>Clientes</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/usuarios/usuarios.php"><b>Usuarios</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/pedidos/pedidos.php"><b>Pedidos</a></b></li>
        <li class="tab"><a style="font-size:20px" href="../../views/categoria/categoria.php"><b>Categorias</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
      </ul>
    </div>
  </nav>
  <div class="container">

    <h2>ProductoX</h2>
    <h5>ORDENAR: </h5>
    <div class="row">
      <a href="./productox.php?sort=precio" class="waves-effect waves-light btn  black darken-1">POR PRECIO</a>
      <a href="./productox.php?sort=color" class="waves-effect waves-light btn  black darken-1">POR COLOR</a>
      <a href="./productox.php?sort=talla" class="waves-effect waves-light btn  black darken-1">POR TALLA</a>
      <a href="./productox.php?sort=composition" class="waves-effect waves-light btn  black darken-1">POR COMPOSICION</a>
      <a href="./productox.php?sort=codigobarra" class="waves-effect waves-light btn  black darken-1">POR CODIGO DE BARRA</a>
      <a href="./productox.php?sort=name" class="waves-effect waves-light btn  black darken-1">POR NOMBRE</a>

    </div>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr class="table-primary">

            <th>ID</th>
            <th>Name</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Composition</th>
            <th>Color</th>
            <th>Talla</th>
            <th>CodigoBarra</th>

          </tr>
        </thead>
        <tbody>
          <?php

          $lista = Productox_model::getAll($ordenar);
          for ($i = 0; count($lista) > $i; $i++) {
          ?>
            <div>
              <tr>

                <td class=""><?php echo $lista[$i]->getID() ?></td>
                <td class=""><?php echo $lista[$i]->getName() ?></td>
                <td class=""><?php echo $lista[$i]->getCategoria() ?></td>
                <td class=""><?php echo $lista[$i]->getPrecio() ?></td>
                <td class=""><?php echo $lista[$i]->getComposition() ?></td>
                <td class=""><?php echo $lista[$i]->getColor() ?></td>
                <td class=""><?php echo $lista[$i]->getTalla() ?></td>
                <td class=""><?php echo $lista[$i]->getCodigoBarra() ?></td>


              </tr>
            </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>