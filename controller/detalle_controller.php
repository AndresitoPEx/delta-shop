<?php
    include_once __DIR__. '../../model/detalle_pedido_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $detalle = new Detalle_model(
            
            $_POST["pedidos_id"],
            $_POST["productos_id"],
            $_POST["precio"],
            $_POST["cantidad"],
            $_POST["estado"]
            
        );
        if ($detalle->esValido()){
            if(isset($_POST['id'])){
                $detalle->id=$_POST['id'];
                $resultado = $detalle->updateDetalle();
            }else{
                $resultado = $detalle->guardarDetalle();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar los datos";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/detalle_pedido/detalle_pedido.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            // echo $cliente->getErroresHtml();
            header("Location: /dtg_mvc/views/errores/validacion_detalle.php?errores={$detalle->getErroresHtml()}");
        }   

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $detalle = Detalle_model::getById($_GET['id']);
            $detalle->delete();
            header("Location: /dtg_mvc/views/detalle_pedido/detalle_pedido.php");
        }
    } 
    
   

?>