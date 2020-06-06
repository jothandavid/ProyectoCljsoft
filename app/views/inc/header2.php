<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLJSFT | Proyecto Formativo</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= RUTA_URL;?>/css/bootstrap.min.css" >
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= RUTA_URL;?>/css/styles.css">

		
</head>
    <!-- Barra de Navigacion -->
    <nav class="nav-main">
        <!-- Brand -->
        <img src="img/logo.svg" alt="Logo" class="nav-brand">  
        <!-- Barra Navegador Parte Izquierda -->
        <ul class="nav-menu">
            <li>
            <a href="<?php echo RUTA_URL . '/index' ?>">Inicio</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/usuario">Usuarios</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/personal"">Personal</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/bienes">Bienes</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/controles">Control E/S</a>
            </li>
        </ul>        
    </nav>

    <hr>
    <!-- Boton de Menu lateral-->
    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>
