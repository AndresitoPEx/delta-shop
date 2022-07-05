<?php
include_once __DIR__. '/../config/db.php';

class Usuario_model{
    public $id;
    private $nombre;
    private $clave;
    private $estado;
    private $errores = array();

    function __construct($nombre, $clave, $estado){
        $this->nombre=$nombre;
        $this->clave=$clave;
        $this->estado=$estado;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getClave(){
        return $this->clave;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function guardarUsuario(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="INSERT INTO usuarios (nombre, clave, estado) VALUES ('{$this->nombre}','{$this->clave}','{$this->estado}')";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
    }

    public function updateUsuario(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="UPDATE usuarios set nombre='{$this->nombre}', clave='{$this->clave}', estado='{$this->estado}' WHERE id={$this->id}";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
    }

    public function delete(){
        $conn=getConnection();
        if($conn==null){
            return null;
        }
        $sql = "DELETE FROM usuarios WHERE id={$this->id}";
        if($conn->query($sql)===true){
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    public function esValido(){
        $errores = array();
        if($this->nombre == null || strlen($this->nombre) <= 0){
            array_push($errores, "• Ingresar nombre del usuario.");
        }
        if($this->clave == null || strlen($this->clave) <=0){
            array_push($errores, "• Ingresar clave del usuario.");
        }
        if($this->estado == null || strlen($this->estado) <=0){
            array_push($errores, "• Ingresar estado del usuarios.");
        }
        $this->errores = $errores;
        return count($this->errores)> 0 ? false:true;
    }
    
    public function getErroresHtml(){
        $html="<ul>";
            if(count($this->errores) > 0){
                for($i = 0;count($this->errores)> $i; $i++){
                    $html .= "<li>".$this->errores[$i]."</li>";
                }
            }
            return $html."</ul>";
    }
    
    public static function getById($id){
        $conn=getConnection();
          if($conn==null){
              return null;
          }
          $t=null;
          $sql= "SELECT * FROM usuarios WHERE id=$id";
          $resultado=$conn->query($sql);
          while($fila=mysqli_fetch_array($resultado)){
              $o = new Usuario_model(
                                      $fila['nombre'],
                                      $fila['clave'],
                                      $fila['estado']);
          $o->id=$fila['id'];
          $t=$o;
          }
          return $t;
      }
      public static function getAll(){
        $conn=getConnection();
        if($conn==null){
            return null;
        }
        $lista = array();
        $sql= "SELECT * FROM usuarios";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Usuario_model(
                                    $fila['nombre'],
                                    $fila['clave'],
                                    $fila['estado']);
        $o->id=$fila['id'];
         array_push($lista,$o);
        }
        return $lista;
        
    }

}
?>