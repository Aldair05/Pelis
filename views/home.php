<?php 

$ms_controller = new MovieSeriesController();
$ms = $ms_controller->get();

$template = '

        <div class="container">
            <div class="row">
                ';
                for ($n=0; $n <count($ms); $n++) { 
                    $template .='
                    <div class="col-md-3 col-sm-4 py-4">
                        <div class="card" >
                            <img src="'.$ms[$n]['poster'].'" alt="">
                            <div class="card-body text-center">
                                <h5 class="card-title">'. $ms[$n]['title'] .'</h5>
                            </div>
                        </div>
                    </div>
                    ';
                }
                $template .='
            </div>
        </div>
        ';
print($template);




    
//     $template = '
//     <div class="container">
//         <div class="row justify-content-center">
//             <div class="col-md-12 caja-info" >
//                 <h2>Hola %s Bienvenido</h2>
//                 <h3>Tus peliculas y series favoritas</h3>
//                 <p>Tu email es %s</p>
//                 <p>Tu Cumpleaños es %s</p>
//                 <p>El rol que tienes es %s</p>
//             </div>
//         </div>
//     </div>
//     ';
//     printf(
//         $template, 
//         $_SESSION['name'],
//         $_SESSION['email'],
//         $_SESSION['birthday'],
//         $_SESSION['role']);
// }



?>