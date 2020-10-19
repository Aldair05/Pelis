<?php 

class MovieSeriesModel extends Model{


    public function set($ms_data = array()){
        
        foreach ($ms_data as $key => $value) {
            $$key = $value;
        }

        $plot = str_replace("'","\'", $plot);

        $this->query = "REPLACE INTO movieseries SET imdb_id = '$imdb_id', title = '$title', plot = '$plot', genres = '$genres', authors = '$authors' , acthors = '$acthors', country = '$country', premiere = '$premiere', poster = '$poster', trailer = '$trailer', raiting = $raiting, status = $status, category = '$category'";
        
        $this->set_query();
        
        
    }

    public function get($ms = ''){

        $this->query = ($ms != '')
           ? "SELECT ms.imdb_id, ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer,  ms.raiting, ms.raiting, ms.category,s.status
           FROM  movieseries as ms
           INNER JOIN status as s 
           ON ms.status = s.status_id WHERE ms.imdb_id = '$ms'":
           "SELECT  ms.imdb_id, ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer, ms.raiting, ms.raiting, ms.category,s.status
             FROM  movieseries as ms
             INNER JOIN status as s 
             ON ms.status = s.status_id"; 
   
        $this->get_query();

        $num_rows = count($this->rows);

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }

        return $data;
    }

    public function del($imdb_id = ''){
        $this->query = "DELETE FROM movieseries WHERE imdb_id = '$imdb_id'";
        $this->set_query();
    }


}


?>