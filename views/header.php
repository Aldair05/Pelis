<?php 

print('
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/font-awesome.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;1,400&family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
    ');


if($_SESSION['ok']){   
    print('
    <header>
        <div class="ancho">
            <nav class="navegacion-principal">
                <ul>
                    <li><a href="./">Inicio</a></li>
                    <li><a href="movieseries">MovieSeries</a></li>
                    <li><a href="usuarios">usuarios</a></li>
                    <li><a href="estatus">status</a></li>
                    <li><a href="salir">salir</a></li>
                </ul>
            </nav>
        </div>
    </header>
        ');
}    

?>

