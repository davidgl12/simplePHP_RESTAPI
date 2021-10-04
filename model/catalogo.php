<?php
class Catalogo{
    /*protected $pdo;
    
   protected function conectar($nombreTabla){
       try{
           $conectar = $this->pdo = new PDO("mysql:local=localhost;dbname={$nombreTabla}","root","");
           return $conectar;
       }catch(Exception $e){
           echo "Error al conectarse a Base de Datos, \nerror: " . $e->getMessage();
       }
   }       
    public function getNames(){
        return $this ->$pdo->query("SET NAMES", "utf8");
    }*/

    protected $conn;
    protected $dataArr = array();

    function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'catalogo');

        if ($this->conn->connect_error) {
            die("Falló la conexión: " . $this->conn->connect_error);
          }
    }

    function __destruct(){
        $this->conn->close();
    }

    function ejecutarQuery($sql){
        //$sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) { //fetch_assoc() pone los resultados de la row en un arreglo asociativo
            array_push($this->dataArr, $row);
            //$this->dataArr = $row;
            //return $row;
            }
            return $this->dataArr;
        } else {
            echo "0 results";
        }
    }
    
}
?>