<?php

if($_POST['r'] == 'status-add' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){
    print('
        <div class="container text-center py-5">
            <form class="" method="POST">
                <div>
                    <input type="text" name="status" placeholder="Status" required>
                </div>
                <div class="py-2">
                    <input class= "btn btn-primary" type="submit" value="Agregar">
                    <input type="hidden" name="r" value="status-add">
                    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
    ');
}else if($_POST['r'] == 'status-add' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    $status_controller = new StatusController();
    
    $new_status = array(
        'status_id' => 0,
        'status' => $_POST['status']
    );

    $status = $status_controller->set($new_status);

    $template = ('
        <div class="container text-center">
            <p class="alert-success">El status %s se agrego correctamente<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("estatus");

            }
        </script>

    ');

    printf($template,$_POST['status']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}