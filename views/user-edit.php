<?php
$users_controller = new UsersController();

if($_POST['r'] == 'user-edit' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){

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
        $role_admin = ($user[0]['role'] == 'admin') ? 'checked'  : '';
        $role_user  = ($user[0]['role'] == 'user')  ? 'checked'  : '';
        $user_template = '
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-12">
                        <form method="POST">
                            <div>
                            <p>
                                <input type="text" name="user" placeholder="Usuario" required>
                                <input type="hidden" name="user" value="%s">
                            </p>
                            <p>
                                <input type="email" name="email" placeholder="Correo" value="%s" required>
                            </p>
                            <p>
                                <input type="text" name="name" placeholder="Nombre" value="%s" required>
                            </p>
                            <p>
                                <input type="text" name="birthday" placeholder="Cumpleaños" value="%s" required>
                            </p>
                            <p>
                                <input type="password" name="pass" placeholder="Contraseña" value="" required>
                            </p>
                            <p>
                                <input type="radio" name="role" id="admin" value="admin" %s required ><label for="admin">Administrador</label>
                            </p>
                            <p>
                                <input  type="radio" name="role" id="noadmin" value="user" %s required><label for="noadmin">Usuario</label>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Actualizar" >
                                <input type="hidden" name="r" value="user-edit">
                                <input type="hidden" name="crud" value="set">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
        printf( $user_template,
                $user[0]['user'],
                $user[0]['email'],
                $user[0]['name'],
                $user[0]['birthday'],
                // $user[0]['pass'],
                $user[0]['role'],
                $role_admin,
                $role_user
        );
    }
    

}else if($_POST['r'] == 'user-edit' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    
    $save_user = array(
        'user' => $_POST['user'],
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'birthday' => $_POST['birthday'],
        'pass' => $_POST['pass'],
        'role' => $_POST['role'],
        
    );

    $user = $users_controller->set($save_user);

    $template = '
        <div class="container text-center">
            <p class="alert-success">Se actualizo el usuario %s<p>
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