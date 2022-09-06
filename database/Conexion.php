
 
<?php
class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $base_datos = "consultas";

    protected $conexion;



    public function conectar()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->base_datos", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexión realizada Satisfactoriamente";

            return $this->conexion;
        } catch (PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
            $this->conexion = null;
        }
    }


    public function cerrar()
    {
        $this->conexion->close();
    }

    public function seleccionar_tabla($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function eliminar_tabla($tabla,array $condicion)
    {
        $sql = "DELETE FROM $tabla WHERE ";
        $i = 0;
        foreach ($condicion as $key => $value) {
            if ($i == 0) {
                $sql .= "$key = '$value'";
            } else {
                $sql .= " AND $key = '$value'";
            }
            $i++;
        }
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }
  
}

$cn = new Conexion();

$cn -> conectar();

$perosna =($cn -> seleccionar_tabla("persona"));

while ($per=$perosna->fetchObject()  ) {
    echo $per->nombre;
}