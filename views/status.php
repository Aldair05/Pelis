<?php 

print('<h1 class="text-center py-4"> GESTION DE STATUS </h1>');

$status_controller = new StatusController();

$status = $status_controller->get();


if(empty($status)){
    print('
        <div class="container">
            <p class="danger">No hay Status</p>
        </div>
    ');
}else{

    $template_status = '
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Status</th>
                        <th colspan="2">
                            <form method="POST">
                                <input type="hidden" name="r" value="status-add">
                                <input class="btn btn-primary" type="submit" value="agregar">
                            </form>
                        </th>
                    </tr>';
        for ($n=0; $n <count($status) ; $n++) { 
            $template_status .='
                    <tr>
                        <td>'. $status[$n]['status_id'] .'</td>
                        <td>'. $status[$n]['status'] .'</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="status-edit">
                                <input type="hidden" name="status_id" value="'. $status[$n]['status_id'] .'">
                                <input class="btn btn-success" type="submit" value="editar">
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="status-delete">
                                <input type="hidden" name="status_id" value="'. $status[$n]['status_id'] .'">
                                <input class="btn btn-danger" type="submit" value="eliminar">
                            </form>
                        </td>
                    </tr>
            ';
        }

    $template_status .= '
                </thead>
            </table>
        </div>
    ';

    print($template_status);

}