<?php
 session_start();
 if (!isset($_SESSION['login'])) {
     redireccionar('/home');
 } else {
     ?>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= RUTA_URL;?>/css/bootstrap.min.css" >
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css" />
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
        <!-- Barra Navegador  -->
        <ul class="nav-menu">
            <li>
            <a href="<?php echo RUTA_URL . '/admin' ?>">
                <i class="icon-home"></i> Inicio</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/usuario"><i class="icon-user"></i> Usuarios</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/personal"><i class="icon-male"></i> Personal</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/bienes"><i class="icon-laptop"></i> Bienes</a>
            </li>
            <li>
            <a href="<?= RUTA_URL; ?>/controles"><i class="icon-calendar"></i> Control E/S</a>
            </li>                      
        </ul>       
        <!-- Barra Navegador Login -->
        <ul>           
            <li>    
                Usuario:                               
                <?php
                    echo $_SESSION['login'].'<br>';  ?>   
                Rol:                               
                <?php
                    echo $_SESSION['rol']; ?>                
            </li>
           
            <li>                
                <a href="<?php echo RUTA_URL . '/Admin/cerrarSesion' ?>"
                    class="btn btn-default btn-flat"><i class="icon-signout"></i> Cerrar Sesión
                </a>              
            </li>                
        </ul> 

    </nav>

    
    <hr>
    <!-- Boton de Menu lateral-->
    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>
    
    <?php
 }
    ?>