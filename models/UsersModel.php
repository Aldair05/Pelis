<?php 

class UsersModel extends Model{

    public  function set( $user_data = array() ){
        foreach ($user_data as $key => $value) {
            //variable de variable la convierte a una variable dinamica
            $$key = $value;
        }
        $this->query = "REPLACE INTO users(user,email,name,birthday,pass,role) VALUES('$user','$email','$name','$birthday',MD5('$pass'),'$role')";
        $this->set_query();
    }


    public  function get($user = ''){

        $this->query = ($user != '') 
            ? "SELECT * FROM users WHERE user = '$user'"  
            : "SELECT * FROM users";
        
         
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

    public  function del($user = ''){
        // foreach ($user_data as $key => $value) {
        //     $$key = $value;
        // }
        $this->query = "DELETE FROM users WHERE user = '$user'";
        $this->set_query();
    }

    public function validate_user($user,$pass){

        $this->query = "SELECT * FROM users WHERE user = '$user' AND pass = MD5('$pass')";
        $this->get_query();


        // $num_rows = count($this->rows);

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }

        return $data;
    }
}

?>