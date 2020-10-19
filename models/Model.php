<?php 

// Clase abstracta que nos permitira hacer la conexion a la base de datos
abstract class Model {
    //Atributos
     
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $db_name = 'mexflix';
    private static $charset = 'UTF-8';
    private $conn;
    protected  $query;
    protected $rows = array();


    //Metodos

    // abstract protected function create();
    abstract protected function set();
    abstract protected function get();
    abstract protected function del();

    private function db_open(){
        $this->conn = new mysqli(
                self::$db_host,
                self::$db_user,
                self::$db_pass,
                self::$db_name

        );

        $this->conn->set_charset(self::$charset);
    }

    private function db_close(){
        $this->conn->close();
    }


    // Ejecutar un query simple de tipo INSERT; UPDATE; DELETE
    protected function set_query(){
        $this->db_open();
        $this->conn->query($this->query);
        $this->db_close(); 
    }
    //traer resultados de una consulta  de tipo select 
    protected function get_query(){
         $this->db_open();
         $result = $this->conn->query($this->query);
         
         while( $this->rows[] = $result->fetch_assoc() );
         
         $result->close();
         $this->db_close();
         
         return array_pop($this->rows);
    }
 }




?>