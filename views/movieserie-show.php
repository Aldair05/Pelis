<?php 

if($_POST['r'] == 'movieserie-show' && isset($_POST['imdb_id'])){
    $ms_controller = new MovieSeriesController();
    $ms = $ms_controller->get($_POST['imdb_id']);

    if(empty($ms)){
        printf('
            <div class="container text-center">
                <p>Error al cargar la informacion de la movieserie $s </p>
            </div>
        
        ',$_POST['imdb_id']);
    }else{
        $ms_template = '
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center py-4">
                           <div class="row fondo">
                                <div class="col-md-4">
                                     <span class="title">%s</span>
                                </div>
                                <div class="col-md-3">
                                    <p class="raiting">Raiting: <span>%s</span></p>
                                </div>
                           </div>
                           <div class="row fondo">
                                <div class="col-md-4">
                                    <p class="genres">Genres: <span>%s</span></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="premiere">Premiere: <span>%s</span></p>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6 py-3">
                                    <img src="%s" alt="">
                                </div>
                                <div class="col-md-6 trailer py-5">
                                    
                                    <iframe width="560" height="315" src="%s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-12 py-3">
                                    <p class="subtitle">Description: <span>%s</span></p>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <p class="subtitle">Status: <span>%s</span></p>
                                    <p class="subtitle">Authors: <span>%s</span></p>
                                    <p class="subtitle">Acthors: <span>%s</span></p>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
        ';

        $trailer = str_replace('watch?v=','embed/',$ms[0]['trailer']);

        printf($ms_template,
                $ms[0]['title'],
                $ms[0]['raiting'],
                $ms[0]['genres'],
                $ms[0]['premiere'],
                $ms[0]['poster'],
                $trailer,
                $ms[0]['plot'],
                $ms[0]['status'],   
                $ms[0]['authors'],
                $ms[0]['acthors']
            );
    }

}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error404');
}


