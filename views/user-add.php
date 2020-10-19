<?php

if($_POST['r'] == 'user-add' && $_SESSION['role'] == 'admin' && !isset($_POST['crud'])){
    print('
        <div class="container text-center py-5">
            <form class="" method="POST">
                <div>
                    <p>
                        <input type="text" name="user" placeholder="Usuario" required>
                    </p>
                    <p>
                        <input type="email" name="email" placeholder="Correo" required>
                    </p>
                    <p>
                        <input type="text" name="name" placeholder="Nombre" required>
                    </p>
                    <p>
                        <input type="text" name="birthday" placeholder="Cumpleaños" required>
                    </p>
                    <p>
                        <input type="password" name="pass" placeholder="Contraseña" required>
                    </p>
                    <p>
                        <input type="radio" name="role" id="admin" value="admin"><label for="admin">Administrador</label>
                    </p>
                    <p>
                        <input  type="radio" name="role" id="noadmin" value="user"><label for="noadmin">Usuario</label>
                    </p>
                </div>
                <div class="py-2">
                    <input class= "btn btn-primary" type="submit" value="Agregar">
                    <input type="hidden" name="r" value="user-add">
                    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        </div>
    ');
}else if($_POST['r'] == 'user-add' && $_SESSION['role'] == 'admin' && $_POST['crud'] == 'set'){
    //Programar la insercion
    $user_controller = new UsersController();
    
    $new_user = array(
        'user' => $_POST['user'],
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'birthday' => $_POST['birthday'],
        'pass' => $_POST['pass'],
        'role' => $_POST['role']
    );

    $users = $user_controller->set($new_user);

    $template = ('
        <div class="container text-center">
            <p class="alert-success">El usuario %s se agrego correctamente<p>
        </div>
        <script>
            window.onload = function (){
                reloadPage("usuarios");
            }
        </script>

    ');

    printf($template,$_POST['user']);
}else{
    //Para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}