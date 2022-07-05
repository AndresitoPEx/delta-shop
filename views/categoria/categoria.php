<?php

include_once __DIR__. '../../../model/categoria_model.php';
/* include_once __DIR__. '../../../controller/product_controller.php'; */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <title>Categoria</title>
</head>
<body class="grey lighten-3">
<nav class="nav-extended black">
    <div class="nav-wrapper">
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
        <li class="tab"><a style="font-size:20px" href="../../views/clientes/clientes.php"><b>Clientes</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/usuarios/usuarios.php"><b>Usuarios</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/pedidos/pedidos.php"><b>Pedidos</b></a></li>
        <li class="tab"><a style="font-size:20px" class="active" href="../../views/categoria/categoria.php"><b>Categorias</b></a></li>
        <li class="tab"><a style="font-size:20px" href="../../views/detalle_pedido/detalle_pedido.php"><b>Detalles</b></a></li>
      </ul>
    </div>
  </nav>
    <div class="container">
    
    <h2>Categorias</h2>
    <div class="row">
    <div class="col s12 m6 50"><a href="/dtg_mvc/views/categoria/categoria_nuevo.php" class ="waves-effect waves-light btn  orange darken-1">AGREGAR</a></div>
    <div class="col s3 offset-s3"><a href="/dtg_mvc/index.php" class ="waves-effect waves-light btn  black darken-1" >INICIO</a></div>
    </div>
    <br/>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="table-primary">
                       
                        <th>Nombre</th>
                        
                        <th>Editar</th>
                        <th>Eliminar</th>
                </tr>  
            </thead>
            <tbody>
                <?php 
                
                $lista =Categoria_model::getAll();
                for($i=0;count($lista)>$i;$i++){              
                ?>
                <div> 
                <tr>
                    
                    <td class=""><?php echo $lista[$i]->getNombre() ?></td>
                    
                    <td><a class="waves-effect waves-light btn  light blue darken-1" href='/dtg_mvc/views/categoria/categoria_modifica.php?id=<?php echo $lista[$i]->id ?>'>Editar</a></td> 
                    <td><a class="waves-effect waves-light btn  red darken-1" href='/dtg_mvc/views/categoria/categoria_elimina.php?id=<?php echo $lista[$i]->id ?>'>Eliminar</a></td> 
                                                        
                </tr> 
                </div>
                <?php  } ?>
            </tbody>
        </table>
    </div>
                </div>
</body>
</html>