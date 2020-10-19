<?php
$status_controller = new StatusController();

if($_POST['r'] == 'status-delete' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

    $status = $status_controller->get($_POST['status_id']);

    if (empty($status)) {
        $template = '
        <div class="container text-center">
            <p class="alert-warning">No existe el status_id %s <p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("estatus");

            }
        </script>
    ';
    printf($template,$_POST['status_id']);
    
    }else{
        $status_template = '
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12">
                        <form method="POST">
                           <div>
                                <p>Estas seguro de eliminar el estatus %s</p>
                           </div>
                           <div>
                            <input class="btn btn-warning" type="submit" value="SI">
                            <input type="button" class="btn btn-primary" value="No" onclick="history.back()">
                            <input type="hidden" name="status_id" value="%s">
                            <input type="hidden" name="r" value="status-delete">
                            <input type="hidden" name="crud" value="del">
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $status_template,
                $status[0]['status'],
                $status[0]['status_id']
        );
    }
    

}else if($_POST['r'] == 'status-delete' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'del'){
    //Programar la insercion
    
    $status = $status_controller->del($_POST['status_id']);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se elimino el status %s<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("estatus");

            }
        </script>

    ';

    printf($template,$_POST['status_id']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}