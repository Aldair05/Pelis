<?php 

print('<h1 class="text-center py-4"> GESTION DE USUARIOS </h1>');

$users_controller = new UsersController();

$users = $users_controller->get();


if(empty($users)){
    print('
        <div class="container">
            <p class="danger">No hay Usuarios</p>
        </div>
    ');
}else{

    $template_users = '
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Cumpleaños</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                        <th colspan="2">
                            <form method="POST">
                                <input type="hidden" name="r" value="user-add">
                                <input class="btn btn-primary" type="submit" value="agregar">
                            </form>
                        </th>
                    </tr>';
        for ($n=0; $n <count($users) ; $n++) { 
            $template_users .='
                    <tr>
                        <td>'. $users[$n]['user'] .'</td>
                        <td>'. $users[$n]['email'] .'</td>
                        <td>'. $users[$n]['name'] .'</td>
                        <td>'. $users[$n]['birthday'] .'</td>
                        <td>'. $users[$n]['pass'] .'</td>
                        <td>'. $users[$n]['role'] .'</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="user-edit">
                                <input type="hidden" name="user" value="'. $users[$n]['user'] .'">
                                <input class="btn btn-success" type="submit" value="editar">
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="user-delete">
                                <input type="hidden" name="user" value="'. $users[$n]['user'] .'">
                                <input class="btn btn-danger" type="submit" value="eliminar">
                            </form>
                        </td>
                    </tr>
            ';
        }

    $template_users .= '
                </thead>
            </table>
        </div>
    ';

    print($template_users);

}