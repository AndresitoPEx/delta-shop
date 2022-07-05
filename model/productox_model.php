<?php
include_once __DIR__ . '/../config/db.php';

class Productox_model
{
    public $id;
    private $name;
    private $categoria;
    private $precio;
    private $composition;
    private $color;
    private $talla;
    private $codigobarra;

    function __construct($id, $name, $categoria, $precio, $composition, $color, $talla, $codigobarra)
    {

        $this->id = $id;
        $this->name = $name;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->composition = $composition;
        $this->color = $color;
        $this->talla = $talla;
        $this->codigobarra = $codigobarra;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getComposition()
    {
        return $this->composition;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getTalla()
    {
        return $this->talla;
    }
    public function getCodigoBarra()
    {
        return $this->codigobarra;
    }


    public function guardarProducto()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $sql = "INSERT INTO productox (id, name, categoria, precio, composition, color, talla, codigobarra) VALUES ('{$this->id}','{$this->name}','{$this->categoria}','{$this->precio}','{$this->composition}','{$this->color}','{$this->talla}','{$this->codigobarra}')";
        if ($conn->query($sql) === true) {
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    public function updateProducto()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $sql = "UPDATE productox set name='{$this->name}', categoria='{$this->categoria}', precio='{$this->precio}', composition='{$this->composition}', color='{$this->color}', talla='{$this->talla}', codigobarra='{$this->codigobarra}' WHERE id={$this->id}";
        if ($conn->query($sql) === true) {
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }
    public function esValido()
    {
        $errores = array();
        if ($this->name == null || strlen($this->name) <= 0) {
            array_push($errores, "• Ingresar el name del producto.");
        }
        if ($this->categoria == null || strlen($this->categoria) <= 0) {
            array_push($errores, "• Ingresar la categoria del producto.");
        }
        if ($this->precio == null || strlen($this->precio) <= 0 ||  $this->precio >= 10000) {
            array_push($errores, "• Ingresar el precio del producto.");
        }
        if ($this->composition == null || strlen($this->composition) <= 0) {
            array_push($errores, "• Ingresar la composicion del producto.");
        }
        if ($this->color == null ||  $this->color <= 0) {
            array_push($errores, "• El color no es valido.");
        }
        if ($this->talla == null ||  $this->talla <= 0) {
            array_push($errores, "• La talla  no es valida.");
        }
        if ($this->codigobarra == null ||  $this->codigobarra <= 0) {
            array_push($errores, "• El color no es valido.");
        }
        $this->errores = $errores;
        return count($this->errores) > 0 ? false : true;
    }
    public function getErroresHtml()
    {
        $html = "<ul>";
        if (count($this->errores) > 0) {
            for ($i = 0; count($this->errores) > $i; $i++) {
                $html .= "<li>" . $this->errores[$i] . "</li>";
            }
        }
        return $html . "</ul>";
    }



    public function getProductos($id)
    {
        $sql = "SELECT * FROM productox";
        if ($conn->query($sql) === true) {
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    public static function getById($id)
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $t = null;
        $sql = "SELECT * FROM productox WHERE id=$id";
        $resultado = $conn->query($sql);
        while ($fila = mysqli_fetch_array($resultado)) {
            $o = new Productox_model(
                $fila['id'],
                $fila['name'],
                $fila['categoria'],
                $fila['precio'],
                $fila['composition'],
                $fila['color'],
                $fila['talla'],
                $fila['codigobarra']
            );
            $o->id = $fila['id'];
            $t = $o;
        }
        return $t;
    }


    public static function getAll($ordenar="")
    {
        $sql_ordenar=($ordenar!="") ? " ORDER BY $ordenar":"";
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $lista = array();
        $sql = "SELECT * FROM productox $sql_ordenar";
        $resultado = $conn->query($sql);
        while ($fila = mysqli_fetch_array($resultado)) {
            $o = new Productox_model(
                $fila['id'],
                $fila['name'],
                $fila['categoria'],
                $fila['precio'],
                $fila['composition'],
                $fila['color'],
                $fila['talla'],
                $fila['codigobarra']
            );
            $o->id = $fila['id'];
            array_push($lista, $o);
        }
        return $lista;
    }
}
