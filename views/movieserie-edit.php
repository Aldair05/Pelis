<?php
$ms_controller = new MovieSeriesController();

if($_POST['r'] == 'movieserie-edit' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

    $ms = $ms_controller->get($_POST['imdb_id']);

    if (empty($ms)) {
        $template = '
        <div class="container text-center">
            <p class="alert-warning">No existe el imdb_id %s <p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("estatus");

            }
        </script>
    ';
    printf($template,$_POST['imdb_id']);
    
    }else{
        $ms_template = '
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12">
                        <form method="POST">
                            <div>
                                <input type="text" value="%s" placeholder="imdb_id" disabled required>
                                <input type="hidden" name="imdb_id" value="%s">
                            </div>
                            <div class="py-3">
                                <p>
                                    <input type="text" name="title"  value="%s" placeholder="Titulo" required>
                                </p>
                                <p>
                                    <textarea name="plot" value="%s" cols="22" rows="10" placeholder="Descripción"></textarea>
                                </p>
                                <p>
                                    <input type="text" name="genres" value="%s" placeholder="Genero" required>
                                </p>
                                <p>
                                    <input type="text" name="authors" value="%s" placeholder="Autor" required>
                                </p>
                                <p>
                                    <input type="text" name="acthors" value="%s" placeholder="Actores" required>
                                </p>
                                <p>
                                    <input type="text" name="country" value="%s" placeholder="Pais" required>
                                </p>
                                <p>
                                    <input type:"number" name="premiere" value="%s" placeholder="Estreno" required>
                                </p>
                                <p>
                                    <input type="text" name="poster" value="%s" placeholder="Poster" required>
                                </p>
                                <p>
                                    <input type="text" name="trailer" value="%s" placeholder="Trailer" required>
                                </p>
                                <p>
                                    <input type="number" name="raiting" value="%s" placeholder="Raiting" required>
                                </p>
                                <p>
                                    <input type="text" name="status" value="%s" placeholder="Estatus" required>
                                </p>
                                <p>
                                    <input type="text" name="category" value="%s" placeholder="Categoria" required>
                                </p>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Actualizar" >
                                <input type="hidden" name="r" value="movieserie-edit">
                                <input type="hidden" name="crud" value="set">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $ms_template,
                $ms[0]['imdb_id'],
                $ms[0]['imdb_id'],
                $ms[0]['title'],
                $ms[0]['plot'],
                $ms[0]['genres'],
                $ms[0]['authors'],
                $ms[0]['acthors'],
                $ms[0]['country'],
                $ms[0]['premiere'],
                $ms[0]['poster'],
                $ms[0]['trailer'],
                $ms[0]['raiting'],
                $ms[0]['status'],
                $ms[0]['category']
        );
    }
    

}else if($_POST['r'] == 'movieserie-edit' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    
    $save_ms = array(
        'imdb_id' => $_POST['imdb_id'],
        'title' => $_POST['title'],
        'plot' => $_POST['plot'],
        'genres' => $_POST['genres'],
        'authors' => $_POST['authors'],
        'acthors' => $_POST['acthors'],
        'country' => $_POST['country'],
        'premiere' => $_POST['premiere'],
        'poster' => $_POST['poster'],
        'trailer' => $_POST['trailer'],
        'raiting' => $_POST['raiting'],
        'status' => $_POST['status'],
        'category' => $_POST['category']
    );

    $ms = $ms_controller->set($save_ms);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se actualizo el status %s<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("movieseries");

            }
        </script>

    ';

    printf($template,$_POST['title']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}