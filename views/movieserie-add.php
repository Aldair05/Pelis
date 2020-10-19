<?php

if($_POST['r'] == 'movieserie-add' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){
    print('
        <div class="container text-center py-5">
            <form class="" method="POST">
                <div>
                    <p>
                        <input type="text" name="imdb_id" placeholder="Imdb" required>
                    </p>
                    <p>
                        <input type="text" name="title" placeholder="Titulo" required>
                    </p>
                    <p>
                        <textarea name="plot" cols="22" rows="10" placeholder="Descripción"></textarea>
                    </p>
                    <p>
                        <input type="text" name="genres" placeholder="Genero" required>
                    </p>
                    <p>
                        <input type="text" name="authors" placeholder="Autor" required>
                    </p>
                    <p>
                        <input type="text" name="acthors" placeholder="Actores" required>
                    </p>
                    <p>
                        <input type="text" name="country" placeholder="Pais" required>
                    </p>
                    <p>
                        <input type:"number" name="premiere" placeholder="Estreno" required>
                    </p>
                    <p>
                        <input type="text" name="poster" placeholder="Poster" required>
                    </p>
                    <p>
                        <input type="text" name="trailer" placeholder="Trailer" required>
                    </p>
                    <p>
                        <input type="number" name="raiting" placeholder="Raiting" required>
                    </p>
                    <p>
                        <input type="text" name="status" placeholder="Estatus" required>
                    </p>
                    <p>
                        <input type="text" name="category" placeholder="Categoria" required>
                    </p>
                    
                </div>
                <div class="py-2">
                    <input class= "btn btn-primary" type="submit" value="Agregar">
                    <input type="hidden" name="r" value="movieserie-add">
                    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
    ');
}else if($_POST['r'] == 'movieserie-add' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    $ms_controller = new MovieSeriesController();
    
    $new_ms = array(
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

    $ms = $ms_controller->set($new_ms);
    $template = ('
        <div class="container text-center">
            <p class="alert-success">La peliucla-serie %s se agrego correctamente<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("movieseries");
            }
        </script>

    ');

    printf($template,$_POST['title']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}