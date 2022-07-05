<?php
    include_once __DIR__. '../../model/pedido_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pedido = new Pedido_model(
           
            $_POST["cliente_id"],
            $_POST["total"],
            $_POST["fecha"],
            $_POST["estado"]
        );
        if ($pedido->esValido()){
            if(isset($_POST['id'])){
                $pedido->id=$_POST['id'];
                $resultado = $pedido->updatePedido();
            }else{
                $resultado = $pedido->guardarPedido();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar el pedido";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/pedidos/pedidos.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            // echo $pedido->getErroresHtml();
            header("Location: /dtg_mvc/views/errores/validacion_pedido.php?errores={$pedido->getErroresHtml()}");
        }

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $pedido = Pedido_model::getById($_GET['id']);
            $pedido->delete();
            header("Location: /dtg_mvc/views/pedidos/pedidos.php");
        }
    } 
    
   

?>