<?php
include_once __DIR__. '/../config/db.php';


class Detalle_model{
    public $id;
    private $pedidos_id;
    private $productos_id;
    private $precio;
    private $cantidad;
    private $estado;
 
    private $errores = array();

    function __construct($pedidos_id, $productos_id, $precio, $cantidad, $estado){
        $this->pedidos_id=$pedidos_id;
        $this->productos_id=$productos_id;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
        $this->estado=$estado;
        
    }

    public function getPedidoId(){
        return $this->pedidos_id;
    }
    public function getProductoId(){
        return $this->productos_id;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function guardarDetalle(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="INSERT INTO detalle_pedidos (pedidos_id, productos_id, precio, cantidad, estado) VALUES ('{$this->pedidos_id}','{$this->productos_id}','{$this->precio}','{$this->cantidad}','{$this->estado}')";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
        }


    public function updateDetalle(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="UPDATE detalle_pedidos set pedidos_id='{$this->pedidos_id}', productos_id='{$this->productos_id}', precio='{$this->precio}', cantidad='{$this->cantidad}', estado='{$this->estado}' WHERE id={$this->id}";
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
        $sql = "DELETE FROM detalle_pedidos WHERE id={$this->id}";
        if($conn->query($sql)===true){
            $conn->close();
            return $this;
         }
        $conn->close();
        return null;
    }

    public function esValido(){
        $errores = array();
        if($this->pedidos_id == null || strlen($this->pedidos_id) <= 0){
            array_push($errores, "• Ingresar el id del pedido.");
        }
        if($this->productos_id == null || strlen($this->productos_id) <=0){
            array_push($errores, "• Ingresar el id del producto");
        }
        if ( $this->precio == null ||  $this->precio <= 0 ||  $this->precio >= 1000) {
            array_push($errores, "• El precio no es valido.");
        }
        if($this->cantidad == null || strlen($this->cantidad) <=0){
            array_push($errores, "• Ingresar la cantidad necesaria");
        }
        if($this->estado == null || strlen($this->estado) <=0){
            array_push($errores, "• Ingresar el estado.");
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
          $sql= "SELECT * FROM detalle_pedidos WHERE id=$id";
          $resultado=$conn->query($sql);
          while($fila=mysqli_fetch_array($resultado)){
              $o = new Detalle_model(
                                      $fila['pedidos_id'],
                                      $fila['productos_id'],
                                      $fila['precio'],
                                      $fila['cantidad'],
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
        $sql= "SELECT * FROM detalle_pedidos";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Detalle_model(
                                    $fila['pedidos_id'],
                                    $fila['productos_id'],
                                    $fila['precio'],
                                    $fila['cantidad'],
                                    $fila['estado']);
        $o->id=$fila['id'];
         array_push($lista,$o);
        }
        return $lista;
    }

}
?>