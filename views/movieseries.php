<?php 

print('<h1 class="text-center py-4"> GESTION DE PELICULAS Y SERIES </h1>');

$ms_controller = new MovieSeriesController();

$ms = $ms_controller->get();


if(empty($ms)){
    print('
        <div class="container">
            <p class="danger">No existen Peliculas y Series</p>
        </div>
    ');
}else{

    $template_ms = '
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Imdb</th>
                        <th>Titulo</th>
                        <th>Estreno</th>
                        <th>Generos</th>
                        <th>Estatus</th>
                        <th>Categoria</th>
                        <th colspan="3" class="text-center">
                            <form method="POST">
                                <input type="hidden" name="r" value="movieserie-add">
                                <input class="btn btn-primary" type="submit" value="agregar">
                            </form>
                        </th>
                    </tr>';
        for ($n=0; $n <count($ms) ; $n++) { 
            $template_ms .='
                    <tr>
                        <td>'. $ms[$n]['imdb_id'].'</td> 
                        <td>'. $ms[$n]['title'] .'</td>
                        <td>'. $ms[$n]['premiere'].'</td>
                        <td>'. $ms[$n]['genres'].'</td>
                        <td>'. $ms[$n]['status'].'</td>
                        <td>'. $ms[$n]['category'].'</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="movieserie-show">
                                <input type="hidden" name="imdb_id" value="'.$ms[$n]['imdb_id'].'">
                                <input type="submit" class="btn btn-secondary" value="Show" >
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="movieserie-edit">
                                <input type="hidden" name="imdb_id" value="'. $ms[$n]['imdb_id'] .'">
                                <input class="btn btn-success" type="submit" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="movieserie-delete">
                                <input type="hidden" name="imdb_id" value="'. $ms[$n]['imdb_id'] .'">
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
            ';
        }

    $template_ms .= '
                </thead>
            </table>
        </div>
    ';

    print($template_ms);

}