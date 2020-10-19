<?php
$status_controller = new StatusController();

if($_POST['r'] == 'status-edit' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

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
                                <input type="text" value="%s" placeholder="status_id" disabled required>
                                <input type="hidden" name="status_id" value="%s">
                            </div>
                            <div class="py-3">
                                <input type="text" value="%s" name="status" placeholder="status" required>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Actualizar" >
                                <input type="hidden" name="r" value="status-edit">
                                <input type="hidden" name="crud" value="set">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $status_template,
                $status[0]['status_id'],
                $status[0]['status_id'],
                $status[0]['status'] 
        );
    }
    

}else if($_POST['r'] == 'status-edit' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    
    $save_status = array(
        'status_id' => $_POST['status_id'],
        'status' => $_POST['status']
    );

    $status = $status_controller->set($save_status);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se actualizo el status %s<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("estatus");

            }
        </script>

    ';

    printf($template,$_POST['status']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}