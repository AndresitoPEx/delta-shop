<?php
    include_once __DIR__. '../../model/cliente_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cliente = new Cliente_model(
            
            $_POST["nombres"],
            $_POST["apellidos"],
            $_POST["correo"],
            $_POST["telefono"],
            $_POST["direccion"],
            $_POST["comentario"]
        );
        if ($cliente->esValido()){
            if(isset($_POST['id'])){
                $cliente->id=$_POST['id'];
                $resultado = $cliente->updateCliente();
            }else{
                $resultado = $cliente->guardarCliente();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar al cliente";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/clientes/clientes.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            // echo $cliente->getErroresHtml();
            header("Location: /dtg_mvc/views/errores/validacion_cliente.php?errores={$cliente->getErroresHtml()}");
        }

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $cliente = Cliente_model::getById($_GET['id']);
            $cliente->delete();
            header("Location: /dtg_mvc/views/clientes/clientes.php");
        }
    } 
    
   

?>