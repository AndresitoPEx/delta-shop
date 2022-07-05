<?php
    include_once __DIR__. '../../model/product_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $producto = new Product_model(
            
            $_POST["codigo"],
            $_POST["nombre"],
            $_POST["modelo"],
            $_POST["id_categoria"],
            $_POST["color"],
            $_POST["precio"]
        );
        if ($producto->esValido()){
            if(isset($_POST['id'])){
                $producto->id=$_POST['id'];
                $resultado = $producto->updateProducto();
            }else{
                $resultado = $producto->guardarProducto();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar el producto";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/productos/producto.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            // echo $producto->getErroresHtml();
            header("Location: /dtg_mvc/views/errores/validacion_producto.php?errores={$producto->getErroresHtml()}");
        }

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $producto = Product_model::getById($_GET['id']);
            $producto->delete();
            header("Location: /dtg_mvc/views/productos/producto.php");
        }
    } 
    
   

?>