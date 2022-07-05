<?php
include_once __DIR__. '/../config/db.php';

class Cliente_model{
    public $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $telefono;
    private $direccion;
    private $comentario;
    private $errores = array();

    function __construct($nombres, $apellidos, $correo, $telefono, $direccion, $comentario){
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
        $this->comentario=$comentario;
    }

    public function getNombres(){
        return $this->nombres;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getComentario(){
        return $this->comentario;
    }

    public function guardarCliente(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="INSERT INTO clientes (nombres, apellidos, correo, telefono, direccion, comentario) VALUES ('{$this->nombres}','{$this->apellidos}','{$this->correo}','{$this->telefono}','{$this->direccion}','{$this->comentario}')";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
        }


    public function updateCliente(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="UPDATE clientes set nombres='{$this->nombres}', apellidos='{$this->apellidos}', correo='{$this->correo}', telefono='{$this->telefono}', direccion='{$this->direccion}', comentario='{$this->comentario}' WHERE id={$this->id}";
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
        $sql = "DELETE FROM clientes WHERE id={$this->id}";
        if($conn->query($sql)===true){
            $conn->close();
            return $this;
         }
        $conn->close();
        return null;
    }

    public function esValido(){
        $errores = array();
        if($this->nombres == null || strlen($this->nombres) <= 0){
            array_push($errores, "• Ingresar el nombre del cliente.");
        }
        if($this->apellidos == null || strlen($this->apellidos) <=0){
            array_push($errores, "• Ingresar los apellidos del cliente.");
        }
        if($this->correo == null || strlen($this->correo) <=0){
            array_push($errores, "• Ingresar el correo del cliente.");
        }
        if($this->telefono == null || strlen($this->telefono) <=0){
            array_push($errores, "• Ingresar el telefono del cliente.");
        }
        if($this->direccion == null || strlen($this->direccion) <= 0) {
            array_push($errores, "• Ingresar la direccion.");
        }
        if($this->comentario == null || strlen($this->comentario) <= 0) {
            array_push($errores, "• Ingresar un comentario.");
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
          $sql= "SELECT * FROM clientes WHERE id=$id";
          $resultado=$conn->query($sql);
          while($fila=mysqli_fetch_array($resultado)){
              $o = new Cliente_model(
                                      $fila['nombres'],
                                      $fila['apellidos'],
                                      $fila['correo'],
                                      $fila['telefono'],
                                      $fila['direccion'],
                                      $fila['comentario']);
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
        $sql= "SELECT * FROM clientes";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Cliente_model(
                                    $fila['nombres'],
                                    $fila['apellidos'],
                                    $fila['correo'],
                                    $fila['telefono'],
                                    $fila['direccion'],
                                    $fila['comentario']);
        $o->id=$fila['id'];
         array_push($lista,$o);
        }
        return $lista;
    }

}

?>