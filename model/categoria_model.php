<?php
include_once __DIR__ . '/../config/db.php';

class Categoria_model
{
    public $id;
    private $nombre;

    private $errores = array();

    function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function guardarCategoria()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $sql = "INSERT INTO categorias (nombre) VALUES ('{$this->nombre}')";
        if ($conn->query($sql) === true) {
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }


    public function updateCategoria()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $sql = "UPDATE categorias set nombre='{$this->nombre}' WHERE id={$this->id}";
        if ($conn->query($sql) === true) {
            $conn->close();
            return $this;
        }
        $conn->close();
        return null;
    }

    public function delete()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $sql = "DELETE FROM categorias WHERE id={$this->id}";
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
        if ($this->nombre == null || strlen($this->nombre) <= 0) {
            array_push($errores, "• Ingresar el nombre de la categoria.");
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

    public static function getById($id)
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $t = null;
        $sql = "SELECT * FROM categorias WHERE id=$id";
        $resultado = $conn->query($sql);
        while ($fila = mysqli_fetch_array($resultado)) {
            $o = new Categoria_model(
                $fila['nombre']
            );
            $o->id = $fila['id'];
            $t = $o;
        }
        return $t;
    }

    public static function getAll()
    {
        $conn = getConnection();
        if ($conn == null) {
            return null;
        }
        $lista = array();
        $sql = "SELECT * FROM categorias";
        $resultado = $conn->query($sql);
        while ($fila = mysqli_fetch_array($resultado)) {
            $o = new Categoria_model(
                $fila['nombre']
            );
            $o->id = $fila['id'];
            array_push($lista, $o);
        }
        return $lista;
    }
}
