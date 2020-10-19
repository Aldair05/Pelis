<?php 

class StatusModel extends Model{
    // public $status_id;
    // public $status;

    // public function __construct(){
    //     $this->db_name = 'mexflix';
    // }


    public  function set( $status_data = array() ){
        foreach ($status_data as $key => $value) {
            //variable de variable la convierte a una variable dinamica
            $$key = $value;
        }
        $this->query = "REPLACE INTO status (status_id, status) VALUES($status_id, '$status')";
        $this->set_query();
    }


    public  function get($status_id = ''){

        $sql = ($status_id != '') 
            ? "SELECT * FROM status WHERE status_id = $status_id" 
            : "SELECT * FROM status";
        
        $this->query = $sql; 
        $this->get_query();
        // var_dump($this->rows);


        $num_rows = count($this->rows);
        // echo $num_rows;

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;

    }

    public  function del($status_id = ''){
        // foreach ($status_data as $key => $value) {
        //     $$key = $value;
        // }
        $this->query = "DELETE FROM status WHERE status_id = $status_id";
        $this->set_query();
    }


}

?>