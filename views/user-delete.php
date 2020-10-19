<?php
$users_controller = new UsersController();

if($_POST['r'] == 'user-delete' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

    $user = $users_controller->get($_POST['user']);

    if (empty($user)) {
        $template = '
        <div class="container text-center">
            <p class="alert-warning">No existe el usuario %s <p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("usuarios");

            }
        </script>
    ';
    printf($template,$_POST['user']);
    
    }else{
        $user_template = '
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12">
                        <form method="POST">
                           <div>
                                <p>Estas seguro de eliminar el usuario %s</p>
                           </div>
                           <div>
                            <input class="btn btn-warning" type="submit" value="SI">
                            <input type="button" class="btn btn-primary" value="No" onclick="history.back()">
                            <input type="hidden" name="user" value="%s">
                            <input type="hidden" name="r" value="user-delete">
                            <input type="hidden" name="crud" value="del">
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $user_template,
                $user[0]['user'],
                $user[0]['user']
        );
    }
    

}else if($_POST['r'] == 'user-delete' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'del'){
    //Programar la insercion
    
    $user = $users_controller->del($_POST['user']);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se elimino el usuario %s<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("usuarios");

            }
        </script>

    ';

    printf($template,$_POST['user']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}