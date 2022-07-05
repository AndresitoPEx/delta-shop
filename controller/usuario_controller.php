<?php
    include_once __DIR__. '../../model/usuario_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = new Usuario_model(
            
            $_POST["nombre"],
            $_POST["clave"],
            $_POST["estado"]
        );
        if ($usuario->esValido()){
            if(isset($_POST['id'])){
                $usuario->id=$_POST['id'];
                $resultado = $usuario->updateUsuario();
            }else{
                $resultado = $usuario->guardarUsuario();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar al usuario";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/usuarios/usuarios.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            // echo $usuario->getErroresHtml();
            header("Location: /dtg_mvc/views/errores/validacion_usuario.php?errores={$usuario->getErroresHtml()}");
        }

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $usuario = Usuario_model::getById($_GET['id']);
            $usuario->delete();
            header("Location: /dtg_mvc/views/usuarios/usuarios.php");
        }
    } 
    
   

?>