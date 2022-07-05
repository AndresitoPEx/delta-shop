<?php
include_once __DIR__. '/../config/db.php';

class Pedido_model{
    public $id;
    
    private $cliente_id;
    private $total;
    private $fecha;
    private $estado;
    private $errores = array();

    function __construct( $cliente_id, $total, $fecha, $estado){
       
        
        $this->cliente_id=$cliente_id;
        $this->total=floatval($total);
        $this->fecha=$fecha;
        $this->estado = $estado; 
        
        
    }
    
   
    public function getClienteId(){
        return $this->cliente_id;
    }
    public function getTotal(){
        return $this->total;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getEstado(){
        return $this->estado;
    }
    
    

    
    public function guardarPedido(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="INSERT INTO pedidos ( cliente_id, total, fecha, estado) VALUES ('{$this->cliente_id}','{$this->total}','{$this->fecha}','{$this->estado}')";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
        }

    public function updatePedido(){
            $conn = getConnection();
                if($conn==null){ 
                    return null;
                }
                $sql="UPDATE pedidos set  cliente_id='{$this->cliente_id}', total='{$this->total}', fecha='{$this->fecha}', estado='{$this->estado}' WHERE id={$this->id}";
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
        $sql = "DELETE FROM pedidos WHERE id={$this->id}";
        if($conn->query($sql)===true){
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    

    public function esValido(){
        $errores = array();
        if($this->cliente_id == null || strlen($this->cliente_id) <=0){
            array_push($errores, "• Asignar el id del cliente.");
        }
        if ( $this->total == null ||  $this->total <= 0 ||  $this->total >= 10000) {
            array_push($errores, "• Asignar el total.");
        }
        if($this->estado == null || strlen($this->estado) <=0){
            array_push($errores, "• Ingresar estado.");
        }
        if($this->fecha == null || strlen($this->fecha) <=0){
            array_push($errores, "• Ingresar fecha.");
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
        $sql= "SELECT * FROM pedidos WHERE id=$id";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Pedido_model(  
                                    $fila['cliente_id'],
                                    $fila['total'],
                                    $fila['fecha'],
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
        $sql= "SELECT * FROM pedidos";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Pedido_model(  
                                    $fila['cliente_id'],
                                    $fila['total'],
                                    $fila['fecha'],
                                    $fila['estado']);
        $o->id=$fila['id'];
         array_push($lista,$o);
        }
        return $lista;
    }




}
    
?>