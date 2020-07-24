<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLJSFT | Proyecto Formativo</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./public/css/styles.css">
    
</head>

			
<body>
    <!-- Barra de Navigacion -->
    <nav class="nav-main">
        <!-- Brand -->
        <img src="img/logo.svg" alt="Logo" class="nav-brand">
        <!-- Barra Navegador - Parte Izquierda -->
        <ul class="nav-menu">
            <li>
            <a href="<?php echo RUTA_URL . '/index' ?>">Inicio</a>
            </li>
           
            <li>
            <a class="dropdown-item" data-toggle="modal" data-target="#login">Ingresar al sistema</a>
            </li>
        </ul>
        <!-- Barra Navegador - Parte Derecha -->
        <ul class="nav-menu-right">
            <li>
            <a href="#">
                <i class="fas fa-search"></i>
            </a>
            </li>
        </ul>
    </nav>

    <!-- Boton de Menu lateral-->
    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>
