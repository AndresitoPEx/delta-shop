<?php
    include_once __DIR__. '../../model/categoria_model.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $categoria = new Categoria_model(
            
            $_POST["nombre"]
        );
        if ($categoria->esValido()){
            if(isset($_POST['id'])){
                $categoria->id=$_POST['id'];
                $resultado = $categoria->updateCategoria();
            }else{
                $resultado = $categoria->guardarCategoria();
            }
            
                if($resultado == null){
                    echo "Lo sentimos, no se pudo registrar la categoria";
                }
                else{
                    echo "Registro exitoso.";
                    header("Location: /dtg_mvc/views/categoria/categoria.php");
                }
        }else{
            // echo "Encontramos los siguientes errores: ";
            header("Location: /dtg_mvc/views/errores/validacion_categoria.php?errores={$categoria->getErroresHtml()}");
        }

    }else{
        if(isset($_GET['action']) && $_GET['action']=='delete'){
            $categoria = Categoria_model::getById($_GET['id']);
            $categoria->delete();
            header("Location: /dtg_mvc/views/categoria/categoria.php");
        }
    } 
    
   

?>