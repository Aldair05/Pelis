<?php
$ms_controller = new MovieSeriesController();

if($_POST['r'] == 'movieserie-delete' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

    $ms = $ms_controller->get($_POST['imdb_id']);
    
    if (empty($ms)) {
        $template = '
        <div class="container text-center">
            <p class="alert-warning">No existe la pelicula-serie %s <p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("movieseries");

            }
        </script>
    ';
    printf($template,$_POST['title']);
    
    }else{
        $user_template = '
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12">
                        <form method="POST">
                           <div>
                                <p>Estas seguro de eliminar la peliucla-serie %s</p>
                           </div>
                           <div>
                            <input class="btn btn-warning" type="submit" value="SI">
                            <input type="button" class="btn btn-primary" value="No" onclick="history.back()">
                            <input type="hidden" name="imdb_id" value="%s">
                            <input type="hidden" name="r" value="movieserie-delete">
                            <input type="hidden" name="crud" value="del">
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $user_template,
                $ms[0]['title'],
                $ms[0]['imdb_id']
        );
    }
    

}else if($_POST['r'] == 'movieserie-delete' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'del'){
    //Programar la insercion
    
    $ms = $ms_controller->del($_POST['imdb_id']);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se elimino la pelicula-serie %s<p>
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