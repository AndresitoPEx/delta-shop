<?php
include_once __DIR__. '/../config/db.php';

class Product_model{
    public $id;
    private $codigo;
    private $nombre;
    private $modelo;
    private $id_categoria;
    private $color;
    private $precio;
    private $errores = array();

    function __construct($codigo, $nombre, $modelo, $id_categoria, $color, $precio){
       
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->modelo=$modelo;
        $this->id_categoria=$id_categoria;
        $this->color=$color;
        $this->precio = floatval($precio);
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getIdCategoria(){
        return $this->id_categoria;
    }
    public function getColor(){
        return $this->color;
    }
    public function getPrecio(){
        return $this->precio;
    }

    
    public function guardarProducto(){
        $conn = getConnection();
            if($conn==null){ 
                return null;
            }
            $sql="INSERT INTO productos (codigo, nombre, modelo, id_categoria, color, precio) VALUES ('{$this->codigo}','{$this->nombre}','{$this->modelo}','{$this->id_categoria}','{$this->color}','{$this->precio}')";
            if($conn->query($sql) === true){
                $conn->close();
                return $this;
            }
            $conn->close();
            return null;
        }

    public function updateProducto(){
            $conn = getConnection();
                if($conn==null){ 
                    return null;
                }
                $sql="UPDATE productos set codigo='{$this->codigo}', nombre='{$this->nombre}', modelo='{$this->modelo}', id_categoria='{$this->id_categoria}', color='{$this->color}', precio='{$this->precio}' WHERE id={$this->id}";
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
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        if($conn->query($sql)===true){
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    
    public function esValido(){
        $errores = array();
        if($this->codigo == null || strlen($this->codigo) <= 0){
            array_push($errores, "• Ingresar el codigo del producto.");
        }
        if($this->nombre == null || strlen($this->nombre) <=0){
            array_push($errores, "• Ingresar el nombre del producto.");
        }
        if($this->modelo == null || strlen($this->modelo) <=0){
            array_push($errores, "• Ingresar el modelo del producto.");
        }
        if($this->color == null || strlen($this->color) <=0){
            array_push($errores, "• Ingresar el color del producto.");
        }
        if ( $this->precio == null ||  $this->precio <= 0 ||  $this->precio >= 10000) {
            array_push($errores, "• El precio no es valido.");
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

    public function getProductos($id){
        $sql = "SELECT * FROM productos";
		if($conn->query($sql) === true){
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

   /*  public static function getLista(){
        $lista = [];
        $sql = "SELECT * FROM productos";
        $conn = getConnection();
        $resultado = $conn->query($sql);
        $conn->close();
        $index = 0;
        foreach($resultado as $i=>$val){
            $lista[$index]= $val;
            $index++;
        };
        $datos = [];
        for ($i=0; $i < count($lista); $i++) { 
            array_push($datos, new Product_model(
                                                $lista[$i]["codigo"],
                                                $lista[$i]["nombre"],
                                                $lista[$i]["modelo"],
                                                $lista[$i]["color"],
                                                $lista[$i]["precio"]));
        }
        return $datos;
    } */

    public static function getById($id){
      $conn=getConnection();
        if($conn==null){
            return null;
        }
        $t=null;
        $sql= "SELECT * FROM productos WHERE id=$id";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Product_model(
                                    $fila['codigo'],
                                    $fila['nombre'],
                                    $fila['modelo'],
                                    $fila['id_categoria'],
                                    $fila['color'],
                                    $fila['precio']);
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
        $sql= "SELECT * FROM productos";
        $resultado=$conn->query($sql);
        while($fila=mysqli_fetch_array($resultado)){
            $o = new Product_model(
                                    $fila['codigo'],
                                    $fila['nombre'],
                                    $fila['modelo'],
                                    $fila['id_categoria'],
                                    $fila['color'],
                                    $fila['precio']);
        $o->id=$fila['id'];
         array_push($lista,$o);
        }
        return $lista;
    }




}
    
?>